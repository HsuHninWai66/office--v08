<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Depart;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\newStaffNoti;
use Barryvdh\DomPDF\Facade\PDF;
use Spatie\ViewModels\Javascript;

class StaffInfo extends Controller
{
    protected $respondData;

    public function __construct()
    {
        $this->respondData = [];
    }

    public function index()
    {
        $this->respondData = [
            'staff' => Staff::latest()->get(),
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::latest()->get()
        ];

        return view('prod.staffInfo.list', $this->respondData);
    }

    public function showCreate()
    {

        $this->respondData = [
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::latest()->get(),
            'staffID' => Staff::latest()->get(),
        ];
        return view('prod.staffInfo.add', $this->respondData);
    }

    public function storeStaffData(Request $request)
    {

        $request->validate([
            'first_name' => 'required|unique:offi_staff_management',
            'last_name' => 'required|unique:offi_staff_management',
            'gender' => '',
            'birthdate' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => '',
            'dept' => 'required',
            'role' => 'required',
            'office_time' => 'required',
            'em_start_date' => 'required',
            'experience_yr' => 'required',
            'profile_img' => 'required',
            'sign' => '',
            'kbz_bank_acc' => '',
            'kbz_pay' => '',
            'aya_bank' => '',
            'yoma_bank' => '',
            'wave_money_number' => '',
            'remark' => '',
            'status' => 'required',
        ]);

        $staffData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'birthdate' => $request->get('birthdate'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'dept' => $request->get('dept'),
            'role' => $request->get('role'),
            'office_time' => $request->get('office_time'),
            'em_start_date' => $request->get('em_start_date'),
            'experience_yr' => $request->get('experience_yr'),
            'profile_img' => $request->get('profile_img'),
            'sign' => $request->get('sign'),
            'remark' => $request->get('remark'),
            'kbz_bank_acc' => $request->get('kbz_bank_acc'),
            'kbz_pay' => $request->get('kbz_pay'),
            'aya_bank' => $request->get('aya_bank'),
            'yoma_bank' => $request->get('yoma_bank'),
            'wave_money_number' => $request->get('wave_money_number'),
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

        $this->respondData = [
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::select('id', 'position')->orderby('position')->get(),
            'staffData' => $staffData,
            'staffs' => Staff::latest()->get(),
        ];

        // dd($staffData);
        return view('prod.staffInfo.confirm', $this->respondData);
    }

    public function confirm(Request $request)
    {

        $staffData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'birthdate' => $request->get('birthdate'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'dept' => $request->get('dept'),
            'role' => $request->get('role'),
            'office_time' => $request->get('office_time'),
            'em_start_date' => $request->get('em_start_date'),
            'experience_yr' => $request->get('experience_yr'),
            'sign' => $request->get('sign'),
            'remark' => $request->get('remark'),
            'kbz_bank_acc' => $request->get('kbz_bank_acc'),
            'kbz_pay' => $request->get('kbz_pay'),
            'aya_bank' => $request->get('aya_bank'),
            'yoma_bank' => $request->get('yoma_bank'),
            'wave_money_number' => $request->get('wave_money_number'),
            'status' => $request->get('status'),
            'profile_img' => $request->get('profile_img'),
        ];

        Staff::create($staffData);
        $admins = User::where('role', 'Manager')->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new newStaffNoti($staffData));
        }
        return redirect('staff/list')->with('success', 'Well Done! Staff successfully registered!');
    }

    public function showDetail($id)
    {
        $this->respondData = [
            'staffDetail' => Staff::where('id', $id)->first(),
        ];
        return view('prod.staffInfo.detail', $this->respondData);
    }

    public function edit($id)
    {
        $this->respondData = [
            'staffData' => Staff::where('id', $id)->first(),
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::select('id', 'position')->orderby('position')->get(),
        ];

        return view('prod.staffInfo.edit', $this->respondData);
    }

    public function editValidateStaff(Request $request, $id)
    {

        $staff = Staff::where('id', $id)->first();

        $staffData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'birthdate' => $request->get('birthdate'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'dept' => $request->get('dept'),
            'role' => $request->get('role'),
            'office_time' => $request->get('office_time'),
            'em_start_date' => $request->get('em_start_date'),
            'experience_yr' => $request->get('experience_yr'),
            'sign' => $request->get('sign'),
            'profile_img' => $request->file('profile_img'),
            'remark' => $request->get('remark'),
            'kbz_bank_acc' => $request->get('kbz_bank_acc'),
            'kbz_pay' => $request->get('kbz_pay'),
            'aya_bank' => $request->get('aya_bank'),
            'yoma_bank' => $request->get('yoma_bank'),
            'wave_money_number' => $request->get('wave_money_number'),
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
        } else {
            $staffData['profile_img'] = $staff->profile_img;
        }

        Staff::where('id', $id)->update($staffData);
        return redirect('/staff/list')->with('success', 'Well done! Staff infomation successfully updated!');
    }

    public function delete($id)
    {
        Staff::where('id', $id)->delete();
        return redirect('staff/list')->with('sucess', 'Well Done! Staff successfully deleted!');
    }

    public function exportStaff()
    {
        $this->respondData = [
            'staffData' => Staff::latest()->get(),
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::latest()->get()
        ];
        $pdf = PDF::loadView('export.staff-pdf', $this->respondData);
        return $pdf->stream();
    }
}
