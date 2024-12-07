@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to edit patient details -->
    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $patient->name) }}" class="form-control" required />
        </div>

        <!-- Age field -->
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" value="{{ old('age', $patient->age) }}" class="form-control" required />
        </div>

        <!-- Gender field -->
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Address field -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ old('address', $patient->address) }}" class="form-control" required />
        </div>

        <!-- Phone field -->
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="form-control" required />
        </div>

        <!-- Submit button -->
        <button type="submit" class='btn btn-primary'><i class='fas fa-edit'></i> Update Patient</button>

    </form>

</div>

@endsection