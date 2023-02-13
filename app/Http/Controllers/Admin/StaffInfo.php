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
            'first_name' => 'required|unique:staff',
            'last_name' => 'required|unique:staff',
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

        $staffData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'dept' => $request->get('dept'),
            'role' => $request->get('role'),
            'office_time' => $request->get('office_time'),
            'em_start_date' => $request->get('em_start_date'),
            'experience_yr' => $request->get('experience_yr'),
            'sign' => $request->get('sign'),
            'remark' => $request->get('remark'),
            'profile_img' => $request->get('profile_img'),
            'status' => 1,
        ];

        // Profile Image Upload
        if ($request->hasfile('profile_img')) {
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/staff', $filename);

            $replacements = array('profile_img' => $filename);
            $staffData = array_replace($staffData, $replacements);
        }
        // dd($staffData);
        return view('prod.staffInfo.confirm', ['staffData' => $staffData]);
    }

    public function confirm(Request $request)
    {

        $staffData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'dept' => $request->get('dept'),
            'role' => $request->get('role'),
            'office_time' => $request->get('office_time'),
            'em_start_date' => $request->get('em_start_date'),
            'experience_yr' => $request->get('experience_yr'),
            'sign' => $request->get('sign'),
            'remark' => $request->get('remark'),
            'status' => $request->get('status'),
            'profile_img' => $request->get('profile_img'),
        ];
        Staff::create($staffData);
        return redirect('staff/list')->with('success', 'Well Done! Staff successfully registered!');
    }
}
