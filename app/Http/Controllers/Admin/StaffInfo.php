<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;

class StaffInfo extends Controller
{
    public function index()
    {
        return view('prod.staffInfo.list');
    }

    public function showCreate()
    {
        return view('prod.staffInfo.add');
    }

    public function storeStaffData(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:staff',
            'gender' => '',
            'dept' => 'required',
            'role' => 'required',
            'office_time' => 'required',
            'em_start_date' => 'required',
            'experience_yr' => 'required',
            'profile_img' => 'required',
            'sign' => '',
            'remark' => '',
            'status' => 'required',
        ]);

        $staff = new Staff;
        $staff->name = $request->get('name');
        $staff->gender = $request->get('gender');
        $staff->dept = $request->get('dept');
        $staff->role = $request->get('role');
        $staff->office_time = $request->get('office_time');
        $staff->em_start_date = $request->get('em_start_date');
        $staff->experience_yr = $request->get('experience_yr');
        $staff->sign = $request->get('sign');
        $staff->remark = $request->get('remark');
        $staff->status = 1;

        if ($request->hasfile('profile_img'))
        {
        $file = $request->file('profile_img');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/staff',$filename);
        $staff->profile_img = $filename;
        }

        // Staff::create($staff);
        // $staff->save();
        return view('prod.staffInfo.confirm', ['staffData' => $staff]);
        // return redirect('staff/list')->with('success','Staff successfully registered!');
    }

    public function confirm(Request $request)
    {
        return view('prod.staffInfo.confirm');
    }
}
