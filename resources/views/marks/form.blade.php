@extends('layout')

@section('content')
    <h1>{{ isset($mark) ? 'Edit' : 'Add' }} Marks</h1>

    <form action="{{ isset($mark) ? route('marks.update', $mark) : route('marks.store') }}" method="POST">
        @csrf
        @if(isset($mark))
            @method('PUT')
        @endif

        <div>
            <label>Student</label>
            <select name="student_id">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ isset($mark) && $mark->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Term</label>
            <input type="text" name="term" value="{{ isset($mark) ? $mark->term : '' }}">
        </div>
        <div>
            <label>Subject</label>
            <select name="subject">
                <option value="maths" {{ isset($mark) && $mark->subject == 'maths' ? 'selected' : '' }}>Maths</option>
                <option value="science" {{ isset($mark) && $mark->subject == 'science' ? 'selected' : '' }}>Science</option>
                <option value="history" {{ isset($mark) && $mark->subject == 'history' ? 'selected' : '' }}>History</option>
            </select>
        </div>
        <div>
            <label>Marks</label>
            <input type="number" name="marks" value="{{ isset($mark) ? $mark->marks : '' }}">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
