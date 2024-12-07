@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Patient</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <!-- Form fields -->
        
        <!-- Name field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required />
        </div>

        <!-- Age field -->
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" class="form-control" required />
        </div>

        <!-- Gender field -->
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <!-- Address field -->
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" required />
        </div>

        <!-- Phone field -->
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" required />
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success"><i class='fas fa-plus'></i> Add Patient</button>

    </form>

</div>
@endsection