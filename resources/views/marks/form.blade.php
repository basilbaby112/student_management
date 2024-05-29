@extends('layout')

@section('content')
<div class="container">
    <h3>{{ isset($mark) ? 'Edit' : 'Add' }} Marks</h3>

    <form class="row g-3" action="{{ isset($mark) ? route('marks.update', $mark) : route('marks.store') }}" method="POST">
        @csrf
        @if(isset($mark))
            @method('PUT')
        @endif

        <div class="col-md-6">
            <label class="form-label">Student</label>
            <select class="form-select" name="student_id">
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ isset($mark) && $mark->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Term</label>
            @php
                $terms =['one','two','three'];
            @endphp
            <select class="form-select" name="term" id="">
                <option value="">select</option>
                @foreach ($terms as $term)
                <option value="{{$term}}" {{isset($mark)&& $mark->term == $term ? 'selected' : ''}}>{{$term}}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="term" value="{{ isset($mark) ? $mark->term : '' }}"> --}}
        </div>
        <div class="col-md-4">
            <label class="form-label">Maths</label>
            <input class="form-control" type="number" name="maths" value="{{ isset($mark) ? $mark->maths : ''}}"> 
        </div>
        <div class="col-md-4">
            <label class="form-label">Science</label>
            <input class="form-control" type="number" name="science" value="{{ isset($mark) ? $mark->science : ''}}">
        </div>
        <div class="col-md-4">
            <label class="form-label">History</label>
            <input class="form-control" type="number" name="history" value="{{ isset($mark) ? $mark->history : ''}}">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection
