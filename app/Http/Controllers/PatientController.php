<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string'
        ]);
    
        // Update patient details with validated data
        $patient->update($validatedData);
    
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}