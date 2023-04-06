<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Depart as Department;

class Depart extends Controller
{
    protected $respondData;

    public function __construct()
    {
        $this->respondData = [];
    }

    public function index()
    {
        return view('prod.department.list');
    }

    public function showCreate(Request $request)
    {
        $departments = Department::latest()->get();

        return view('prod.department.add', compact('departments'));
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:depart',
        ]);

        $data = [
            'name' => $request->get('name'),
            'remark' => $request->get('remark'),
        ];

        Department::create($data);
        return redirect('department')->with('success', 'You have successfully registered!');
    }

    public function edit($id)
    {
        $this->respondData = [
            'departments' => Department::where('id', $id)->first(),
        ];

        return view('prod.department.edit', $this->respondData);
    }

    public function editValidate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'remark' => '',
        ]);

        $departData = [
            'name' => $request->get('name'),
            'remark' => $request->get('remark'),
        ];

        Department::where('id', $id)->update($departData);
        return redirect('department')->with('success', 'Well done! Department infomation successfully updated!');
    }

    public function delete($id)
    {
        Department::where('id', $id)->delete();
        return redirect('department')->with('sucess', 'Well Done! Department successfully deleted!');
    }
}
