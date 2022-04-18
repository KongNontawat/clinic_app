<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'alert']);
    }
    public function index()
    {
        $course_categories = DB::table('course_category')->get();
        $courses = Course::leftJoin('course_category', 'course_category.course_category_id', '=', 'courses.course_category_id')->get();
        return view('admin.course.course_list', compact(['courses','course_categories']));
    }
    public function edit(Request $req)
    {
        $course = Course::where('course_id',$req->course_id)->first();
        return response()->json($course);
    }

    public function store(Request $req)
    {
        // return dd($req);
        // Validation Main course
        $validator = Validator::make($req->all(), [
            'course_category_id' => 'required',
            'course_name' => 'required|min:0|max:255|string',
            'course_doctor_price' => 'nullable|min:0|numeric',
            'course_assistant_price' => 'nullable|min:0|numeric',
            'course_course_price' => 'required|min:0|numeric',
            'course_total_price' => 'required|min:0|numeric',
            'course_number_of_time' => 'nullable|min:0|max:300|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            $course = Course::create([
                'course_category_id' => $req->course_category_id,
                'course_name' => $req->course_name,
                'course_doctor_price' => $req->course_doctor_price,
                'course_assistant_price' => $req->course_assistant_price,
                'course_course_price' => $req->course_course_price,
                'course_total_price' => $req->course_total_price,
                'course_type' => $req->course_type,
                'course_number_of_time' => $req->course_number_of_time,
                'course_detail' => $req->course_detail,
                'course_status' => 1,
            ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Create Course  ID:' . $course->course_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.course', $course->course_id))->with('msg_success', 'Created course successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Create Course',
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Created course Failed!');
        }
    }

    public function update(Request $req)
    {
        // return dd($req);
        // Validation Main course
        $validator = Validator::make($req->all(), [
            'course_category_id' => 'required',
            'course_name' => 'required|min:0|max:255|string',
            'course_doctor_price' => 'nullable|min:0|numeric',
            'course_assistant_price' => 'nullable|min:0|numeric',
            'course_course_price' => 'required|min:0|numeric',
            'course_total_price' => 'required|min:0|numeric',
            'course_number_of_time' => 'nullable|min:0|max:300|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            // Create Main course
            $course = Course::where('course_id', $req->course_id)
                ->update([
                    'course_category_id' => $req->course_category_id,
                    'course_name' => $req->course_name,
                    'course_doctor_price' => $req->course_doctor_price,
                    'course_assistant_price' => $req->course_assistant_price,
                    'course_course_price' => $req->course_course_price,
                    'course_total_price' => $req->course_total_price,
                    'course_type' => $req->course_type,
                    'course_number_of_time' => $req->course_number_of_time,
                    'course_detail' => $req->course_detail,
                    'course_status' => $req->course_status,
                ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Course ID:' . $req->course_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Updated course successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Course ID:' . $req->course_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Updated course Failed!');
        }
    }

    public function delete(Request $req)
    {
        DB::beginTransaction();
        try {
            $course = Course::where('course_id', $req->course_id)->delete();

            //9. Create logs
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Delete course ID:' . $req->course_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_success', 'Deleted course successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Delete course ID:' . $req->course_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Deleted course Failed!');
        }
    }

    public function change_status($id)
    {
        DB::beginTransaction();
        try {
            $course = Course::where('course_id', $id)->first();
            if ($course->course_status == 0) {
                $status = 1;
            } elseif ($course->course_status == 1) {
                $status = 0;
            }

            Course::where('course_id', $id)->update(['course_status' => $status]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Status course ID:' . $id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Update Status course successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Status course ID:' . $id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Update Status course Failed!');
        }
    }
}
