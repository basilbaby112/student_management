@extends('layout')

@section('content')
<div class="container">
    <h3>{{ isset($student) ? 'Edit' : 'Add' }} Student</h3>

    <form action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}" method="POST">
        @csrf
        @if(isset($student))
            @method('PUT')
        @endif

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ isset($student) ? $student->name : '' }}">
        </div>
        <div>
            <label>Age</label>
            <input type="number" name="age" value="{{ isset($student) ? $student->age : '' }}">
        </div>
        <div>
            <label>Gender</label>
            <select name="gender">
                <option value="male" {{ isset($student) && $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ isset($student) && $student->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div>
            <label>Teacher</label>
            <select name="teacher_id">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ isset($student) && $student->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
