<?php

namespace App\Http\Controllers;

use App\Models\certificates;
use App\Models\experiences;
use App\Models\messages;
use App\Models\projects;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = projects::latest()->paginate(3);
        return view('home', compact('projects'));
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        $projects = projects::latest()->paginate(3);
        return view('home', compact('projects'));
    }

    // public function detail_projects($id)
    // {
    //       $detailproject = Projects::findOrFail($id);
    // return view('projects', compact('projects'));
    // }

    public function experiences()
    {
        $experiences = experiences::orderBy('start_date', 'desc')->get();
        $certificates = certificates::latest()->get();
        return view('experiences', compact('experiences', 'certificates'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|min:5',
        ]);

        messages::create($request->only('name', 'email', 'message'));

        return back()->with('success', 'Pesan kamu sudah terkirim. Terima kasih!');
    }
}
