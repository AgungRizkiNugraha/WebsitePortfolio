<?php

namespace App\Http\Controllers;

use App\Models\certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $certificates = certificates::latest()->get();
        return view('admin.certifikat.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.certifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'year' => 'required|integer',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $certificates = new certificates();
        $certificates->title = $request->title;
        $certificates->issuer = $request->issuer;
        $certificates->year = $request->year;

        if ($request->file('file')) {
            $certificates->file = $request->file('file')->store('files', 'public');
        }

        $certificates->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $certificate = certificates::findOrFail($id);
        return view('admin.certifikat.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $certificates = certificates::findOrFail($id);
        if ($certificates->file) {
            Storage::disk('public')->delete($certificates->file);
        }
        $certificates->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
