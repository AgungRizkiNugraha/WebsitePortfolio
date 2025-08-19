<?php

namespace App\Http\Controllers;

use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = projects::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
 {
        $title = $request->get('title');
        $projects = new projects();
        $projects->title = $title;
        $projects->description = ($request->get('description'));
        if ($request->file('image')) {
            $file = $request->file('image')->store('files', 'public');
            $projects->image = $file;
        }
         $projects->link= ($request->get('link'));
        $projects->save();

        return redirect()->route('admin.projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $project = projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = projects::findOrFail($id);
        $project->title = $request->get('title');
        $project->description = ($request->get('description'));
      if ($request->file('image')) {
            if ($project->image && file_exists(storage_path('app/public/' . $project->image))) {
                Storage::delete('public/' . $project->image);
            }
            $file = $request->file('image')->store('files', 'public');
            $project->gambar = $file;
        }
         $project->link= ($request->get('link'));
        $project->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects = projects::where('id', $id)->first();
        Storage::delete('public/' . $projects->image);
        $projects->delete();
        return redirect()->route('admin.projects.index');
    }
}
