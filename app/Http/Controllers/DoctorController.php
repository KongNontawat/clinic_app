<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','alert']);
	}

    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.doctor_list', compact('doctors'));
    }

    public function view_detail($id)
    {
        $provinces = DB::table('provinces')->get(['id', 'name_th']);
        $doctor = Doctor::where('doctors.doctor_id', $id)
            ->leftJoin('address_info', 'doctors.address_id', '=', 'address_info.address_id')
            ->leftJoin('provinces', 'provinces.id', '=', 'address_info.province_id')
            ->leftJoin('amphures', 'amphures.id', '=', 'address_info.district_id')
            ->leftJoin('districts', 'districts.id', '=', 'address_info.subdistrict_id')
            ->first(['*', 'districts.name_th AS subdistrict_name', 'amphures.name_th AS district_name', 'provinces.name_th AS province_name']);

        return view('admin.doctor.doctor_detail', compact(['doctor', 'provinces']));
    }

    public function create()
    {
        // Get Collection Address id
        $provinces = DB::table('provinces')->get(['id', 'name_th']);
        return view('admin.doctor.doctor_add', compact('provinces'));
    }

    public function store(Request $req)
    {
        // return dd($req);
        // Validation Main doctor
        $validator = Validator::make($req->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'age' => 'min:0|max:3',
            'phone' => 'required|max:13|min:9',
            'email' => "required|unique:doctors|unique:users",
            'password' => 'required|min:0|max:20'
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator->errors()->getMessages())
				->with('msg_error',$validator->errors()->all())
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
                $doctor_image = $req->file('image');
                $ext_image = strtolower($doctor_image->getClientOriginalExtension());
                $image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;
            }

            $user = User::create([
                'name' => $req->title . ' ' . $req->fname . ' ' . $req->lname,
                'email' => $req->email,
                'role' => 'doctor',
                'user_status' => 1,
                'user_image' => $image,
                'password' => bcrypt($req->password),
            ]);

            $doctor = doctor::create([
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
                'specialize' => $req->specialize,
                'in_hospital' => $req->in_hospital,
                'aboutme' => $req->aboutme,
                'image' => $image,
                'doctor_status' => 1
            ]);
            if ($req->file('image')) {
                // Upload Image
                $path = 'image/uploads/doctor/';
                $path2 = 'image/uploads/user/';
                $doctor_image->move($path, $image);
                $doctor_image->move($path2, $image);
            }

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Create Account doctor ID:' . $doctor->doctor_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.doctor', $doctor->doctor_id))->with('msg_success','Created Doctor successfully!');
        } catch (Exception  $e) {
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Create Account doctor',
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            DB::rollback();
            return redirect()->back()->with('msg_error','Created Doctor Failed!');
        }
    }

    public function update(Request $req)
    {
        // return dd($req);
        $doctor_id = $req->doctor_id;

        $validator = Validator::make($req->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'age' => 'min:0|max:3',
            'phone' => 'required|max:13|min:9',
            'email' => "required"
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator->errors()->getMessages())
				->with('msg_error',$validator->errors()->all())
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
                $doctor_image = $req->file('image');
                $ext_image = strtolower($doctor_image->getClientOriginalExtension());
                $image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;

                // Upload Image
                $path = 'image/uploads/doctor/';
                $doctor_image->move($path, $image);
                if ($req->old_image !== 'default_profile.png' && $req->old_image != '' && $req->old_image != null) {
                    unlink(public_path('image\\uploads\\doctor\\' . $req->old_image));
                }
            } else {
                $image = $req->old_image;
            }

            // Create Main doctor
            $doctor = doctor::where('doctor_id', $req->doctor_id)
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
                    'specialize' => $req->specialize,
                    'in_hospital' => $req->in_hospital,
                    'aboutme' => $req->aboutme,
                    'image' => $image,
                    'doctor_status' =>  $req->doctor_status
                ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Info doctor ID:' . $req->doctor_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.doctor.detail', $req->doctor_id))->with('msg_success','Updated Doctor successfully!');
        } catch (Exception  $e) {

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Info doctor ID:' . $doctor_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            DB::rollback();
            return redirect()->back()->with('msg_error','Updated Doctor Failed!');
        }
    }

    public function delete(Request $req)
    {
        DB::beginTransaction();
        try {
            $get_id = doctor::where('doctor_id', $req->doctor_id)->first(['user_id','address_id', 'image']);

            $address_info = DB::table('address_info')
                ->where('address_id', $get_id->address_id)
                ->delete();

            // Create Main doctor
            $doctor = doctor::where('doctor_id', $req->doctor_id)->delete();

            $user = User::where('user_id', $get_id->user_id)->delete();


            if ($get_id->image !== 'default_profile.png' && $get_id->image != '' && $get_id->image != null) {
                $remove = unlink(public_path('image\\uploads\\doctor\\' . $get_id->image));
            }

            //9. Create logs
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Delete Account doctor ID:' . $req->doctor_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);
            DB::commit();
            return redirect(route('admin.doctor'))->with('msg_success','Deleted Doctor successfully!');
        } catch (Exception  $e) {

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Delete Account doctor ID:' . $req->doctor_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            DB::rollback();
            return redirect()->back()->with('msg_error','Deleted Doctor Failed!');
        }
    }
}
