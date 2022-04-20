<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MedicineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'alert']);
    }
    public function index()
    {
        $doctors = Doctor::where('doctor_status', '1')->get();
        $medicine_categories = DB::table('medicine_category')->get();
        $medicines = Medicine::leftJoin('medicine_category', 'medicine_category.medicine_category_id', '=', 'medicines.medicine_category_id')
        ->leftJoin('doctors', 'doctors.doctor_id', '=', 'medicines.medicine_licensed_doctor_id')
        ->get();
        return view('admin.medicine.medicine_list', compact(['medicines', 'medicine_categories','doctors']));
    }
    public function edit(Request $req)
    {
        $medicine = Medicine::where('medicine_id', $req->medicine_id)->first();
        return response()->json($medicine);
    }

    public function store(Request $req)
    {
        // return dd($req);
        // Validation Main medicine
        $validator = Validator::make($req->all(), [
            'medicine_category_id' => 'required',
            'medicine_type' => 'required',
            'medicine_name' => 'required|min:0|max:255|string',
            'medicine_price' => 'nullable|min:0|numeric',
            'medicine_stock' => 'nullable|min:0|numeric',
            'medicine_unit' => 'required|string',
            'medicine_licensed_doctor_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $medicine = Medicine::create([
                'medicine_category_id' => $req->medicine_category_id,
                'medicine_type' => $req->medicine_type,
                'medicine_name' => $req->medicine_name,
                'medicine_price' => $req->medicine_price,
                'medicine_stock' => $req->medicine_stock,
                'medicine_unit' => $req->medicine_unit,
                'medicine_how_to_use' => $req->medicine_how_to_use,
                'medicine_detail' => $req->medicine_detail,
                'medicine_licensed_doctor_id' => $req->medicine_licensed_doctor_id,
                'medicine_status' => 1,
            ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Create medicine  ID:' . $medicine->medicine_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect(route('admin.medicine', $medicine->medicine_id))->with('msg_success', 'Created medicine successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Create medicine',
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Created medicine Failed!');
        }
    }

    public function update(Request $req)
    {
        // return dd($req);
        // Validation Main medicine
        $validator = Validator::make($req->all(), [
            'medicine_category_id' => 'required',
            'medicine_type' => 'required',
            'medicine_name' => 'required|min:0|max:255|string',
            'medicine_price' => 'nullable|min:0|numeric',
            'medicine_stock' => 'nullable|min:0|numeric',
            'medicine_unit' => 'required|string',
            'medicine_licensed_doctor_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors()->getMessages())
                ->with('msg_error', $validator->errors()->all())
                ->withInput();
        }

        DB::beginTransaction();
        try {

            // Create Main medicine
            $medicine = Medicine::where('medicine_id', $req->medicine_id)
                ->update([
                    'medicine_category_id' => $req->medicine_category_id,
                    'medicine_type' => $req->medicine_type,
                    'medicine_name' => $req->medicine_name,
                    'medicine_price' => $req->medicine_price,
                    'medicine_stock' => $req->medicine_stock,
                    'medicine_unit' => $req->medicine_unit,
                    'medicine_how_to_use' => $req->medicine_how_to_use,
                    'medicine_detail' => $req->medicine_detail,
                    'medicine_licensed_doctor_id' => $req->medicine_licensed_doctor_id,
                    'medicine_status' => $req->medicine_status,
                ]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update medicine ID:' . $req->medicine_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Updated medicine successfully!');
        } catch (Exception  $e) {
            DB::rollback();
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update medicine ID:' . $req->medicine_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Updated medicine Failed!');
        }
    }

    public function delete(Request $req)
    {
        DB::beginTransaction();
        try {
            $medicine = Medicine::where('medicine_id', $req->medicine_id)->delete();

            //9. Create logs
            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Delete medicine ID:' . $req->medicine_id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_success', 'Deleted medicine successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Delete medicine ID:' . $req->medicine_id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Deleted medicine Failed!');
        }
    }

    public function change_status($id)
    {
        DB::beginTransaction();
        try {
            $medicine = Medicine::where('medicine_id', $id)->first();
            if ($medicine->medicine_status == 0) {
                $status = 1;
            } elseif ($medicine->medicine_status == 1) {
                $status = 0;
            }

            Medicine::where('medicine_id', $id)->update(['medicine_status' => $status]);

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Update Status medicine ID:' . $id,
                'logs_detail' => '-',
                'logs_status' => 'success'
            ]);

            DB::commit();
            return redirect()->back()->with('msg_success', 'Update Status medicine successfully!');
        } catch (Exception  $e) {
            DB::rollback();

            $logs_user = DB::table('logs_user')->insert([
                'user_id' => Auth::user()->user_id,
                'activity' => 'Fail! Update Status medicine ID:' . $id,
                'logs_detail' => 'something is wrong',
                'logs_status' => 'fail'
            ]);
            DB::commit();
            return redirect()->back()->with('msg_error', 'Update Status medicine Failed!');
        }
    }
}
