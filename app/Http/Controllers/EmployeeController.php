<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'alert']);
	}

	public function index()
	{
		$employees = Employee::all();
		return view('admin.employee.employee_list', compact('employees'));
	}

	public function view_detail($id)
	{
		$provinces = DB::table('provinces')->get(['id', 'name_th']);
		$employee = Employee::where('employees.employee_id', $id)
			->leftJoin('address_info', 'employees.address_id', '=', 'address_info.address_id')
			->leftJoin('provinces', 'provinces.id', '=', 'address_info.province_id')
			->leftJoin('amphures', 'amphures.id', '=', 'address_info.district_id')
			->leftJoin('districts', 'districts.id', '=', 'address_info.subdistrict_id')
			->first(['*', 'districts.name_th AS subdistrict_name', 'amphures.name_th AS district_name', 'provinces.name_th AS province_name']);

		return view('admin.employee.employee_detail', compact(['employee', 'provinces']));
	}

	public function create()
	{
		// Get Collection Address id
		$provinces = DB::table('provinces')->get(['id', 'name_th']);
		return view('admin.employee.employee_add', compact('provinces'));
	}

	public function store(Request $req)
	{
		// Validation Main employee
		$validator = Validator::make($req->all(), [
			'title' => 'required',
			'fname' => 'required|min:0|max:100|string',
			'lname' => 'required|min:0|max:255|string',
			'nname' => 'nullable|max:50',
			'sex' => 'required',
			'birthdate' => 'required|date|min:0|max:100',
			'age' => 'required|numeric|min:1|max:120',
			'email' => 'required|email|unique:doctors|max:255',
			'id_line' => 'nullable|max:100|unique:doctors',
			'phone' => 'required|max:13|min:9',
			'password' => 'required|min:6|max:20',
			'position' => 'nullable|string|max:255',
			'zip_code' => 'nullable|string|max:10',
			'country' => 'nullable|string|max:40',
			'image' => 'nullable|mimes:jpg,png,gif,jpeg',
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
				$employee_image = $req->file('image');
				$ext_image = strtolower($employee_image->getClientOriginalExtension());
				$image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;
			}

			$user = User::create([
				'name' => $req->title . ' ' . $req->fname . ' ' . $req->lname,
				'email' => $req->email,
				'role' => $req->role,
				'user_status' => 1,
				'user_image' => $image,
				'password' => bcrypt($req->password),
			]);

			$employee = employee::create([
				'user_id' => $user->user_id,
				'title' => $req->title,
				'fname' => $req->fname,
				'lname' => $req->lname,
				'nname' => $req->nname,
				'sex' => $req->sex,
				'birthdate' => $req->birthdate,
				'age' => $req->age,
				'email' => $req->email,
				'id_line' => $req->id_line,
				'phone' => $req->phone,
				'address_id' => $address_info,
				'position' => $req->position,
				'aboutme' => $req->aboutme,
				'image' => $image,
				'employee_status' => 1
			]);
			if ($req->file('image')) {
				// Upload Image
				$path = 'image/uploads/';
				$path2 = 'image/uploads/user/';
				$employee_image->move($path, $image);
				$employee_image->move($path2, $image);
			}
			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Create Account Employee ID:' . $employee->employee_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect(route('admin.employee'))->with('msg_success', 'Created Employee successfully!');
		} catch (Exception  $e) {
			DB::rollback();

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Create Account Employee',
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Created Employee Failed!');
		}
	}

	public function update(Request $req)
	{
		// return dd($req);
		$employee_id = $req->employee_id;

		// Validation Main employee
		$validator = Validator::make($req->all(), [
			'title' => 'required',
			'fname' => 'required|min:0|max:100|string',
			'lname' => 'required|min:0|max:255|string',
			'nname' => 'nullable|max:50',
			'sex' => 'required',
			'birthdate' => 'required|date|min:0|max:100',
			'age' => 'required|numeric|min:1|max:120',
			'email' => 'required|email|max:255|' . Rule::unique('employees')->ignore($req->employee_id, 'employee_id'),
			'id_line' => 'nullable|max:100|' . Rule::unique('employees')->ignore($req->employee_id, 'employee_id'),
			'phone' => 'required|max:13|min:9',
			'position' => 'nullable|string|max:255',
			'zip_code' => 'nullable|string|max:10',
			'country' => 'nullable|string|max:40',
			'image' => 'nullable|mimes:jpg,png,gif,jpeg',
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
				$employee_image = $req->file('image');
				$ext_image = strtolower($employee_image->getClientOriginalExtension());
				$image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;

				// Upload Image
				$path = 'image/uploads/';
				$employee_image->move($path, $image);
				if ($req->old_image !== 'default_profile.png' && $req->old_image != '' && $req->old_image != null) {
					unlink(public_path('image\\uploads\\' . $req->old_image));
				}
			} else {
				$image = $req->old_image;
			}

			// Create Main employee
			$employee = Employee::where('employee_id', $req->employee_id)
				->update([
					'title' => $req->title,
					'fname' => $req->fname,
					'lname' => $req->lname,
					'nname' => $req->nname,
					'sex' => $req->sex,
					'birthdate' => $req->birthdate,
					'age' => $req->age,
					'email' => $req->email,
					'id_line' => $req->id_line,
					'phone' => $req->phone,
					'position' => $req->position,
					'aboutme' => $req->aboutme,
					'image' => $image,
					'employee_status' =>  $req->employee_status
				]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Update Info Employee ID:' . $req->employee_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect(route('admin.employee.detail', $req->employee_id))->with('msg_success', 'Updated Employee successfully!');
		} catch (Exception  $e) {
			DB::rollback();

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Update Info Employee ID:' . $employee_id,
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Updated Employee Failed!');
		}
	}

	public function delete(Request $req)
	{
		DB::beginTransaction();
		try {
			$get_id = Employee::where('employee_id', $req->employee_id)->first(['user_id', 'address_id', 'image']);

			$address_info = DB::table('address_info')
				->where('address_id', $get_id->address_id)
				->delete();

			// Create Main employee
			$employee = Employee::where('employee_id', $req->employee_id)->delete();

			$user = User::where('user_id', $get_id->user_id)->delete();


			if ($get_id->image !== 'default_profile.png' && $get_id->image != '' && $get_id->image != null) {
				$remove = unlink(public_path('image\\uploads\\' . $get_id->image));
			}

			//9. Create logs
			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Delete Account Employee ID:' . $req->employee_id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);
			DB::commit();
			return redirect(route('admin.employee'))->with('msg_success', 'Deleted Employee successfully!');
		} catch (Exception  $e) {
			DB::rollback();

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Delete Account Employee ID:' . $req->employee_id,
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Deleted Employee Failed!');
		}
	}

	public function change_status($id)
	{
		DB::beginTransaction();
		try {
			$employee = Employee::where('employee_id', $id)->first();
			if ($employee->employee_status == 0) {
				$status = 1;
			} elseif ($employee->employee_status == 1) {
				$status = 0;
			}

			Employee::where('employee_id', $id)->update(['employee_status' => $status]);

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Update Status Employee ID:' . $id,
				'logs_detail' => '-',
				'logs_status' => 'success'
			]);

			DB::commit();
			return redirect()->back()->with('msg_success', 'Update Status Employee successfully!');
		} catch (Exception  $e) {
			DB::rollback();

			$logs_user = DB::table('logs_user')->insert([
				'user_id' => Auth::user()->user_id,
				'activity' => 'Fail! Update Status Employee ID:' . $id,
				'logs_detail' => 'something is wrong',
				'logs_status' => 'fail'
			]);
			DB::commit();
			return redirect()->back()->with('msg_error', 'Update Status Employee Failed!');
		}
	}
}
