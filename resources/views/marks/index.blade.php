@extends('layout')

@section('content')
<div class="container">
    <h3>Marks</h3>
    <a href="{{ route('marks.create') }}">Add Marks</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Maths</th>
                <th>Science</th>
                <th>History</th>
                <th>Term</th>
                <th>Total Marks</th>
                <th>Created On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
                <tr>
                    <td>{{ $mark->student->id }}</td>
                    <td>{{ $mark->student->name }}</td>
                    <td>{{ $mark->maths }}</td>
                    <td>{{ $mark->science}}</td>
                    <td>{{ $mark->history }}</td>
                    <td>{{ $mark->term }}</td>
                    <td>{{($mark->maths)+($mark->science)+($mark->history)}}</td>
                    <td>{{ $mark->first()->created_at->format('M d, Y h:i A') }}</td>
                    <td>
                        <a href="{{ route('marks.edit', $mark) }}">Edit</a>
                        <form action="{{ route('marks.destroy', $mark) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
