<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $search = request('search');
        $divisions = Division::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'nullable|string',
            'number' => 'nullable|string',
            'website' => 'nullable|url',
            'phone' => 'nullable|string',
            'fax' => 'nullable|string',
            'email' => 'nullable|email',
        ]);
        Division::create($data);
        return redirect()->route('divisions.index')
                         ->with('success','Division added');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'nullable|string',
            'number' => 'nullable|string',
            'website' => 'nullable|url',
            'phone' => 'nullable|string',
            'fax' => 'nullable|string',
            'email' => 'nullable|email',
        ]);
        $division->update($data);
        return redirect()->route('divisions.index')
                         ->with('success','Division updated');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return back()->with('success','Division deleted');
    }
}

