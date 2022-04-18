<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'alert']);
    }
    public function index()
    {
        $users = User::all();
        return view('admin.user.user_list', compact('users'));
    }
    public function view_logs()
    {
        $logs = DB::table('logs_user')
            ->leftJoin('users', 'users.user_id', '=', 'logs_user.user_id')
            ->whereNotNull('users.user_id')
            ->orderBy('logs_user.logs_user_id', 'desc')
            ->get();
        return view('admin.user.user_logs', compact('logs'));
    }
    public function store(Request $req)
    {

        // Validation Main user
        $validator = Validator::make($req->all(), [
            'name' => 'required|min:0|max:255|string',
            'role' => 'required',
            'email' => "required|unique:users|email|max:255|",
            'password' => 'required|min:1|max:20',
            'user_image' => 'nullable|mimes:jpg,png,gif,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            // Image Process
            // Rename Image
            $image = 'default_profile.png';
            if ($req->file('user_image')) {
                $date = Carbon::now();
                $user_image = $req->file('user_image');
                $ext_image = strtolower($user_image->getClientOriginalExtension());
                $image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;
            }


            // return dd($req->file());

            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'role' => $req->role,
                'password' => bcrypt($req->password),
                'user_status' => 1,
                'user_image' => $image
            ]);
            // return dd($user);

            if ($req->file('user_image')) {
                // Upload Image
                $path = 'image/uploads/';
                $user_image->move($path, $image);
            }

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Create Account user ID:' . $user->user_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.user', $user->user_id))->with('msg_success', 'Created user successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Create Account user',
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Created user Failed!');
        }
    }

    public function update(Request $req)
    {

        // Validation Main user
        $validator = Validator::make($req->all(), [
            'name' => 'required|min:0|max:255|string',
            'role' => 'required',
            'email' => "required|email|max:255|" . Rule::unique('users')->ignore($req->user_id, 'user_id'),
            'user_image' => 'nullable|mimes:jpg,png,gif,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            // Image Process
            // Rename Image
            if ($req->file('user_image')) {
                $date = Carbon::now();
                $user_image = $req->file('user_image');
                $ext_image = strtolower($user_image->getClientOriginalExtension());
                $image = $date->toDateString() . '_' . md5(uniqid()) . '.' . $ext_image;

                // Upload Image
                $path = 'image/uploads/';
                $user_image->move($path, $image);
                // if ($req->old_image !== 'default_profile.png' && $req->old_image != '' && $req->old_image != null) {
                //     unlink(public_path('image\\uploads\\' . $req->old_image));
                // }
            } else {
                $image = $req->old_image;
            }

            // Create Main user
            $user = User::where('user_id', $req->user_id)
                ->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'role' => $req->role,
                    'user_status' => $req->user_status,
                    'user_image' => $image,
                ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Info user ID:' . $req->user_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.user'))->with('msg_success', 'Updated user successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Info user ID:' . $req->user_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Updated user Failed!');
        }
    }

    public function delete(Request $req)
    {
        DB::beginTransaction();
        try {
            $user = User::where('user_id', $req->user_id)->delete();


            // if ($req->user_image !== 'default_profile.png' && $req->user_image != '' && $req->user_image != null) {
            //     $remove = unlink(public_path('image\\uploads\\user\\' . $req->user_image));
            // }

            //9. Create logs
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Delete Account user ID:' . $req->user_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);
            DB::commit();
            return redirect(route('admin.user'))->with('msg_success', 'Deleted user successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Delete Account user ID:' . $req->user_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Deleted user Failed!');
        }
    }

    public function change_status($id)
    {
        DB::beginTransaction();
        try {
            $user = User::where('user_id', $id)->first();
            if ($user->user_status == 0) {
                $status = 1;
            } elseif ($user->user_status == 1) {
                $status = 0;
            }

            User::where('user_id', $id)->update(['user_status' => $status]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Status User ID:' . $id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Update Status User successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Status User ID:' . $id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Update Status User Failed!');
        }
    }
}
