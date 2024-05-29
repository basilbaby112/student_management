@extends('layout')

@section('content')
<div class="container">
    <h3>{{ isset($student) ? 'Edit' : 'Add' }} Student</h3>

    <form class="row g-3" action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}" method="POST">
        @csrf
        @if(isset($student))
            @method('PUT')
        @endif

        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input class="form-control" type="text" name="name" value="{{ isset($student) ? $student->name : '' }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Age</label>
            <input class="form-control" type="number" name="age" value="{{ isset($student) ? $student->age : '' }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender">
                <option value="male" {{ isset($student) && $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ isset($student) && $student->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Teacher</label>
            <select class="form-select" name="teacher_id">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ isset($student) && $student->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
