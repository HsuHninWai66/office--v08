<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Depart;

class PositionController extends Controller
{
    protected $respondData;

    public function __construct()
    {
        $this->respondData = [];
    }

    public function showCreate(Request $request)
    {
        $this->respondData = [
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::latest()->get()
        ];
        return view('prod.position.add', $this->respondData);
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'position' => 'required|unique:position',
            'dept_id' => 'required',
        ]);

        $data = [
            'position' => $request->get('position'),
            'remark' => $request->get('remark'),
            'dept_id' => $request->get('dept_id')
        ];

        Position::create($data);
        return redirect('position')->with('success', 'You have successfully registered!');
    }

    public function edit($id)
    {
        $this->respondData = [
            'departments' => Depart::select('id', 'name')->orderby('name')->get(),
            'position' => Position::where('id', $id)->first(),
        ];

        return view('prod.position.edit', $this->respondData);
    }

    public function editValidate(Request $request, $id)
    {
        $request->validate([
            'position' => 'required',
            'dept_id' => 'required',
            'remark' => '',
        ]);

        $positionData = [
            'position' => $request->get('position'),
            'dept_id' => $request->get('dept_id'),
            'remark' => $request->get('remark'),
        ];

        Position::where('id', $id)->update($positionData);
        return redirect('position')->with('success', 'Well done! Position infomation successfully updated!');
    }
}
