<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All of students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center title">Data of Students</h2>
    <table class="table container">
        <thead>
        <tr>
            <th scope="col">Id Student</th>
            <th scope="col">Name Student</th>
            <th scope="col">Gender Student</th>
            <th scope="col">Class</th>
            <th scope="col">Thao tác</th>
            <th><a href="{{ route('students.create') }}" class="btn btn-success">New</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data_students as $student)
            <tr>
                <th>{{ $student->IdStudent }}</th>
                <td>{{ $student->NameStudent }}</td>
                <td>@if( $student->GenderStudent == 0 ) Male @else Female @endif</td>
                <td>{{ $student->classroom->nameClass }}</td>
                <td>
                    <form method="post" action="{{ route('students.destroy', $student->IdStudent) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('students.show', $student->IdStudent)}}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('students.edit', $student->IdStudent) }}" class="btn btn-warning">Edit</a>
                        <input type="submit" class="btn btn-danger btn-md" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>
