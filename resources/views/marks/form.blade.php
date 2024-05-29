@extends('layout')

@section('content')
<div class="container">
    <h3>{{ isset($mark) ? 'Edit' : 'Add' }} Marks</h3>

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
            @php
                $terms =['one','two','three'];
            @endphp
            <select name="term" id="">
                <option value="">select</option>
                @foreach ($terms as $term)
                <option value="{{$term}}" {{isset($mark)&& $mark->term == $term ? 'selected' : ''}}>{{$term}}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="term" value="{{ isset($mark) ? $mark->term : '' }}"> --}}
        </div>
        <div>
            <label>Maths</label>
            <input type="number" name="maths" value="{{ isset($mark) ? $mark->maths : ''}}">
            <label>Science</label>
            <input type="number" name="science" value="{{ isset($mark) ? $mark->science : ''}}">
            <label>History</label>
            <input type="number" name="history" value="{{ isset($mark) ? $mark->history : ''}}">
            
        </div>
        <div>
            
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection
