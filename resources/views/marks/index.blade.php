@extends('layout')

@section('content')
<div class="container">
    <h3>Marks</h3>
    <a href="{{ route('marks.create') }}">Add Marks</a>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Term</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marks as $mark)
                <tr>
                    <td>{{ $mark->student->name }}</td>
                    <td>{{ $mark->term }}</td>
                    <td>{{ $mark->subject }}</td>
                    <td>{{ $mark->marks }}</td>
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
