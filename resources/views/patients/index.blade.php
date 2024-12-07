@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Patients List</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Patient</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($patients->isEmpty())
        <div class="alert alert-info">No patients found.</div>
    @endif
</div>
@endsection