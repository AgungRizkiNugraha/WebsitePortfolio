<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $projects = projects::count();

        return view('admin.dashboard', compact('projects'));
    }
}
