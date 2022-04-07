<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PatientController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'alert']);
	}

	public function index()
	{
		$patients = Patient::leftJoin('patient_group', 'patient_group.patient_group_id', '=', 'patients.group_id')
			->get(['patient_id', 'opd_id', 'id_card', 'title', 'fname', 'lname', 'sex', 'birthdate', 'id_line', 'phone', 'address_id', 'patient_status', 'created_at', 'group_name']);
		return view('admin.patient.patient_list', compact('patients'));
	}

	public function view_detail($id)
	{
		$provinces = DB::table('provinces')->get(['id', 'name_th']);
		$patient_group = DB::table('patient_group')->get(['patient_group_id', 'group_name']);
		$patient_emc = DB::table('patient_emc')
			->where('patient_id', $id)
			->leftJoin('address_info', 'patient_emc.emc_address_id', '=', 'address_info.address_id')
			->leftJoin('provinces', 'provinces.id', '=', 'address_info.province_id')
			->leftJoin('amphures', 'amphures.id', '=', 'address_info.district_id')
			->leftJoin('districts', 'districts.id', '=', 'address_info.subdistrict_id')
			->first(['*', 'districts.name_th AS subdistrict_name', 'amphures.name_th AS district_name', 'provinces.name_th AS province_name']);

		$patient = Patient::where('patients.patient_id', $id)
			->leftJoin('patient_medical_info', 'patient_medical_info.patient_id', '=', 'patients.patient_id')
			->leftJoin('patient_group', 'patient_group.patient_group_id', '=', 'patients.group_id')
			->leftJoin('address_info', 'patients.address_id', '=', 'address_info.address_id')
			->leftJoin('provinces', 'provinces.id', '=', 'address_info.province_id')
			->leftJoin('amphures', 'amphures.id', '=', 'address_info.district_id')
			->leftJoin('districts', 'districts.id', '=', 'address_info.subdistrict_id')
			->first(['*', 'districts.name_th AS subdistrict_name', 'amphures.name_th AS district_name', 'provinces.name_th AS province_name']);

		$appointments = Appointment::where('appointments.patient_id', $id)
			->leftJoin('patients', 'patients.patient_id', '=', 'appointments.patient_id')
			->leftJoin('doctors', 'doctors.doctor_id', '=', 'appointments.doctor_id')
			->orderBy('appointments.appointment_id', 'desc')
			->get(['appointments.*', 'appointments.reason_for_appointment AS title', 'doctors.title AS doctor_title', 'doctors.fname AS doctor_fname', 'doctors.lname AS doctor_lname', 'patients.title AS patient_title', 'patients.fname AS patient_fname', 'patients.lname AS patient_lname']);

		$doctors = Doctor::where('doctor_status', '1')->get();

		return view('admin.patient.patient_detail', compact(['patient', 'provinces', 'patient_group', 'patient_emc', 'doctors', 'appointments']));
	}

	public function create()
	{
		// Get Collection Address id
		$provinces = DB::table('provinces')->get(['id', 'name_th']);
		$patient_group = DB::table('patient_group')->get(['patient_group_id', 'group_name']);
		return view('admin.patient.patient_add', compact(['provinces', 'patient_group']));
	}

	public function store(Request $req)
	{
		// return dd($req);
		// Validation Main Patient
		$validator = Validator::make($req->all(), [
			'id_card' => 'required|max:17|min:13',
			'group_id' => 'required',
			'fname' => 'required',
			'lname' => 'required',
			'sex' => 'required',
			'birthdate' => 'required',
			'age' => 'min:0|max:3',
			'phone' => 'required|max:13|min:9'
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator->errors()->getMessages())
				->with('msg_error', $validator->errors()->all())
				->withInput();
		}

		DB::beginTransaction();
		try {
			// Create Address info
			$address_info = DB::table('address_info')->insertGetId([
				'address' => $req->address,
				'subdistrict_id' => $req->subdistrict_id,
				'district_id' => $req->district_id,
				'province_id' => $req->province_id,
				'zip_code' => $req->zip_code,
				'country' => $req->country
			]);

			// Image Process
			// Rename Image
			$image = 'default_profile.png';
			if ($req->file('image')) {
				$date = Carbon::now();
				$patient_image = $req->file('image');
				$ext_image = strtolower($patient_image->getClientOriginalExtension());
				$image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;
			}

			// Create Main Patient
			$opd_id = IdGenerator::generate(['table' => 'patients', 'field' => 'opd_id', 'length' => 8, 'prefix' => 'HN']);
			$patient = Patient::create([
				'opd_id' => $opd_id,
				'id_card' => $req->id_card,
				'group_id' => $req->group_id,
				'title' => $req->title,
				'fname' => $req->fname,
				'lname' => $req->lname,
				'nname' => $req->nname,
				'sex' => $req->sex,
				'birthdate' => $req->birthdate,
				'age' => $req->age,
				'nationality' => $req->nationality,
				'race' => $req->race,
				'religion' => $req->religion,
				'email' => $req->email,
				'id_line' => $req->id_line,
				'phone' => $req->phone,
				'address_id' => $address_info,
				'occupation' => $req->occupation,
				'image' => $image,
				'patient_status' => 1
			]);
			if ($req->file('image')) {
				// Upload Image
				$path = 'image/uploads/';
				$patient_image->move($path, $image);
			}

			// Create patient_medical_info
			$patient_medical_info = DB::table('patient_medical_info')->insert([
				'patient_id' => $patient->patient_id,
				'height' => $req->height,
				'weight' => $req->weight,
				'blood_group' => $req->blood_group,
				'drug_allergies' => $req->drug_allergies,
				'food_allergies' => $req->food_allergies,
				'smoker' => $req->smoker,
				'drinks' => $req->drinks,
				'congenital_disease' => $req->congenital_disease,
				'diabetic' => $req->diabetic,
				'high_blood_pressure' => $req->high_blood_pressure,
				'bleed_tendency' => $req->bleed_tendency,
				'heart_disease' => $req->heart_disease,
				'female_pregnant' => $req->female_pregnant,
				'first_register_chanel' => $req->first_register_chanel,
				'surgery' => $req->surgery,
				'accident' => $req->accident,
				'high_risk_diseases' => $req->high_risk_diseases,
				'medical_history' => $req->medical_history,
				'current_medication' => $req->current_medication,
				'note' => $req->note,
				'inquirer_id' => $req->inquirer_id,
			]);

			// Validation  Patient Emc
			$address_info_emc = DB::table('address_info')->insertGetId([
				'address' => $req->emc_address,
				'subdistrict_id' => $req->emc_subdistrict_id,
				'district_id' => $req->emc_district_id,
				'province_id' => $req->emc_province_id,
				'zip_code' => $req->emc_zip_code,
				'country' => $req->emc_country
			]);

			//8. Create Patient emc
			$patient_emc = DB::table('patient_emc')->insert([
				'patient_id' => $patient->patient_id,
				'emc_relation' => $req->emc_relation,
				'emc_title' => $req->emc_title,
				'emc_fname' => $req->emc_fname,
				'emc_lname' => $req->emc_lname,
				'emc_address_id' => $address_info_emc,
				'emc_phone' => $req->emc_phone
			]);

			//9. Create logs
			$logs_patient = DB::table('logs_patient')->insert([
				'patient_id' => $patient->patient_id,
				'activity' => 'Create New Account ID:' . $patient->patient_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Create Account Patient ID:' . $patient->patient_id . ' OPD_ID:' . $patient->opd_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect(route('admin.patient.detail', $patient->patient_id))->with('msg_success', 'Created Patient successfully!');
		} catch (Exception  $e) {
			DB::rollback();
			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Create Account Patient',
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Created Patient Failed!');
		}
	}

	public function update(Request $req)
	{

		// Validation Main Patient
		$validator = Validator::make($req->all(), [
			'id_card' => 'required|max:17|min:13',
			'group_id' => 'required',
			'fname' => 'required',
			'lname' => 'required',
			'sex' => 'required',
			'birthdate' => 'required',
			'age' => 'min:0|max:3',
			'phone' => 'required|max:13|min:9'
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator->errors()->getMessages())
				->with('msg_error', $validator->errors()->all())
				->withInput();
		}

		DB::beginTransaction();
		try {
			// Create Address info
			if ($req->address || $req->subdistrict_id || $req->district_id || $req->province_id || $req->zip_code || $req->country != null) {
				$address_info = DB::table('address_info')
					->where('address_id', $req->address_id)
					->update([
						'address' => $req->address,
						'subdistrict_id' => $req->subdistrict_id,
						'district_id' => $req->district_id,
						'province_id' => $req->province_id,
						'zip_code' => $req->zip_code,
						'country' => $req->country
					]);
			}

			// Image Process
			// Rename Image
			if ($req->file('image')) {
				$date = Carbon::now();
				$patient_image = $req->file('image');
				$ext_image = strtolower($patient_image->getClientOriginalExtension());
				$image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;

				// Upload Image
				$path = 'image/uploads/';
				$patient_image->move($path, $image);
				if ($req->old_image !== 'default_profile.png' && $req->old_image != '' && $req->old_image != null) {
					unlink(public_path('image\\uploads\\' . $req->old_image));
				}
			} else {
				$image = $req->old_image;
			}

			// Create Main Patient
			$patient = Patient::where('patient_id', $req->patient_id)
				->update([
					'id_card' => $req->id_card,
					'group_id' => $req->group_id,
					'title' => $req->title,
					'fname' => $req->fname,
					'lname' => $req->lname,
					'nname' => $req->nname,
					'sex' => $req->sex,
					'birthdate' => $req->birthdate,
					'age' => $req->age,
					'nationality' => $req->nationality,
					'race' => $req->race,
					'religion' => $req->religion,
					'email' => $req->email,
					'id_line' => $req->id_line,
					'phone' => $req->phone,
					'occupation' => $req->occupation,
					'image' => $image,
					'patient_status' => $req->patient_status
				]);

			// Create patient_medical_info
			$patient_medical_info = DB::table('patient_medical_info')
				->where('patient_medical_info_id', $req->patient_medical_info_id)
				->update([
					'height' => $req->height,
					'weight' => $req->weight,
					'blood_group' => $req->blood_group,
					'drug_allergies' => $req->drug_allergies,
					'food_allergies' => $req->food_allergies,
					'smoker' => $req->smoker,
					'drinks' => $req->drinks,
					'congenital_disease' => $req->congenital_disease,
					'diabetic' => $req->diabetic,
					'high_blood_pressure' => $req->high_blood_pressure,
					'bleed_tendency' => $req->bleed_tendency,
					'heart_disease' => $req->heart_disease,
					'female_pregnant' => $req->female_pregnant,
					'first_register_chanel' => $req->first_register_chanel,
					'surgery' => $req->surgery,
					'accident' => $req->accident,
					'high_risk_diseases' => $req->high_risk_diseases,
					'medical_history' => $req->medical_history,
					'current_medication' => $req->current_medication,
					'note' => $req->note,
				]);

			// Validation  Patient Emc
			$address_info_emc = DB::table('address_info')
				->where('address_id', $req->emc_address_id)
				->update([
					'address' => $req->emc_address,
					'subdistrict_id' => $req->emc_subdistrict_id,
					'district_id' => $req->emc_district_id,
					'province_id' => $req->emc_province_id,
					'zip_code' => $req->emc_zip_code,
					'country' => $req->emc_country
				]);


			//8. Create Patient emc
			$patient_emc = DB::table('patient_emc')
				->where('patient_emc_id', $req->patient_emc_id)
				->update([
					'patient_id' => $req->patient_id,
					'emc_relation' => $req->emc_relation,
					'emc_title' => $req->emc_title,
					'emc_fname' => $req->emc_fname,
					'emc_lname' => $req->emc_lname,
					'emc_address_id' => $req->emc_address_id,
					'emc_phone' => $req->emc_phone
				]);

			//9. Create logs
			$logs_patient = DB::table('logs_patient')->insert([
				'patient_id' => $req->patient_id,
				'activity' => 'Update Info ID:' . $req->patient_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Update Info Patient ID:' . $req->patient_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect(route('admin.patient.detail', $req->patient_id))->with('msg_success', 'Updated Patient successfully!');
		} catch (Exception  $e) {
			DB::rollback();
			$logs_patient = DB::table('logs_patient')->insert([
				'patient_id' => $req->patient_id,
				'activity' => 'Fail! Update Info',
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Update Info Patient',
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Updated Patient Failed!');
		}
	}

	public function delete(Request $req)
	{
		DB::beginTransaction();
		try {
			$get_emc_address_id = DB::table('patient_emc', $req->patient_id)->first('emc_address_id');
			$get_id = Patient::where('patient_id', $req->patient_id)->first(['address_id', 'image']);

			$address_info = DB::table('address_info')
				->where('address_id', $get_id->address_id)
				->delete();

			// Create Main Patient
			$patient = Patient::where('patient_id', $req->patient_id)->delete();

			if ($get_id->image !== 'default_profile.png' && $get_id->image != '' && $get_id->image != null) {
				$remove = unlink(public_path('image\\uploads\\' . $get_id->image));
			}

			// Create patient_medical_info
			$patient_medical_info = DB::table('patient_medical_info')
				->where('patient_id', $req->patient_id)
				->get();

			// Validation  Patient Emc
			if ($get_emc_address_id->emc_address_id) {
				$address_info = DB::table('address_info')
					->where('address_id', $get_emc_address_id->emc_address_id)
					->delete();
			}

			//8. Create Patient emc
			$patient_emc = DB::table('patient_emc')
				->where('patient_id', $req->patient_id)
				->delete();
			//9. Create logs
			$logs_patient = DB::table('logs_patient')->insert([
				'patient_id' => $req->patient_id,
				'activity' => 'Delete Account ID:' . $req->patient_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Delete Account Patient ID:' . $req->patient_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);
			DB::commit();
			return redirect(route('admin.patient'))->with('msg_success', 'Deleted Patient successfully!');
		} catch (Exception  $e) {
			DB::rollback();
			$logs_patient = DB::table('logs_patient')->insert([
				'patient_id' => $req->patient_id,
				'activity' => 'Fail! Delete Account ID:' . $req->patient_id,
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Delete Account Patient ID:' . $req->patient_id,
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Deleted Patient Failed!');
		}
	}
}
