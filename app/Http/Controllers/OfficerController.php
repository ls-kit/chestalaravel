<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;
use App\Models\Division;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::with('division')->get();
        return view('officers.index', compact('officers'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('officers.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name_designation' => 'required|string',
            'official_phone' => 'nullable|string',
            'residential_phone' => 'nullable|string',
            'mobile_email' => 'nullable|string',
        ]);
        Officer::create($data);
        return redirect()->route('officers.index')
                         ->with('success','Officer added');
    }

    public function edit(Officer $officer)
    {
        $divisions = Division::all();
        return view('officers.edit', compact('officer','divisions'));
    }

    public function update(Request $request, Officer $officer)
    {
        $data = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name_designation' => 'required|string',
            'official_phone' => 'nullable|string',
            'residential_phone' => 'nullable|string',
            'mobile_email' => 'nullable|string',
        ]);
        $officer->update($data);
        return redirect()->route('officers.index')
                         ->with('success','Officer updated');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return back()->with('success','Officer deleted');
    }
}

