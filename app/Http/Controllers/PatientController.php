<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PatientController extends Controller
{
	public function index()
	{
		// return Carbon::parse('2022-03-24 21:01:03')->format('d-m-Y H:i:s');
		$patients = Patient::leftJoin('patient_group', 'patient_group.patient_group_id', '=', 'patients.group_id')
			->get(['patient_id', 'opd_id', 'id_card', 'title', 'fname', 'lname', 'sex', 'birthdate', 'id_line', 'phone', 'patient_status', 'created_at', 'group_name']);
		// leftJoin('address_info','patients.address_id','=','address_info.address_id')
		// ->leftJoin('provinces','provinces.id','=','address_info.province_id')
		// ->leftJoin('amphures','amphures.id','=','address_info.district_id')
		// ->leftJoin('districts','districts.id','=','address_info.subdistrict_id')
		// ->get(['group_name','districts.name_th AS subdistrict_name','amphures.name_th AS district_name','provinces.name_th AS province_name']);
		return view('admin.patient.patient_list', compact('patients'));
	}

	public function view_detail(Patient $patient)
	{
		return view('admin.patient.patient_detail');
	}

	public function create()
	{
		// Get Collection Address id
		$provinces = DB::table('provinces')->get(['id','name_th']);
		return view('admin.patient.patient_add', compact('provinces'));
	}

	public function store(Request $req)
	{

		// return dd($req);
		// Validation Main Patient
		$validated_patient = $req->validate([
			'id_card' => 'required|max:17|min:13',
			'group_id' => 'required',
			'fname' => 'required',
			'lname' => 'required',
			'sex' => 'required',
			'birthdate' => 'required',
			'phone' => 'required'
		]);

		DB::beginTransaction();
		try {
			// Create Address info
			if ($req->address || $req->subdistrict_id || $req->district_id || $req->province_id || $req->zip_code || $req->country != null) {
				$address_info = DB::table('address_info')->insertGetId([
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
			$image = 'default_profile.png';
			if ($req->file('image')) {
				$date = Carbon::now();
				$patient_image = $req->file('image');
				$ext_image = strtolower($patient_image->getClientOriginalExtension());
				$image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;

				// Upload Image
				$path = 'image/uploads/patient/';
				$patient_image->move($path, $image);
			}

			// Create Main Patient
			$opd_id = IdGenerator::generate(['table' => 'patients', 'field' => 'opd_id', 'length' => 6, 'prefix' => 'HN']);
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
			if ($req->emc_address || $req->emc_subdistrict_id || $req->emc_district_id || $req->emc_province_id || $req->emc_zip_code || $req->emc_country != null) {
				$address_info_emc = DB::table('address_info')->insertGetId([
					'address' => $req->emc_address,
					'subdistrict_id' => $req->emc_subdistrict_id,
					'district_id' => $req->emc_district_id,
					'province_id' => $req->emc_province_id,
					'zip_code' => $req->emc_zip_code,
					'country' => $req->emc_country
				]);
			}else {
				$address_info_emc = null;
			}

			//8. Create Patient emc
			$patient_medical_info = DB::table('patient_emc')->insert([
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
				'activity' => 'Create New Account',
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect(route('admin.patient'));

		} catch (Exception  $e) {
			DB::rollback();
			return redirect()->back();
		}
	}

	public function edit(Patient $patient)
	{
		//
	}

	public function update(Request $request, Patient $patient)
	{
		//
	}

	public function destroy(Patient $patient)
	{
		//
	}

	public function get_district()
	{
		// Get Collection Address id
		$districts = DB::table('amphures')->get(['id','name_th']);
    return response()->json($districts);
	}
	public function get_subdistrict()
	{
		// Get Collection Address id
		$subdistricts = DB::table('districts')->get(['id','name_th']);
    return response()->json($subdistricts);
	}
}
