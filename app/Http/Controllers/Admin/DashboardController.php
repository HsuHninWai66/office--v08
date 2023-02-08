<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        return view('prod.dashboard.staffIndex');
    }

    public function managerIndex()
    {
        return view('prod.dashboard.managerIndex');
    }
}
