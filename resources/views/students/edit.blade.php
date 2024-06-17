
@extends('students.master')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card container">
        <div class="card-header"><b>Edit student</b></div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->IdStudent) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-md-2 col-label-form">Name Student</label>
                    <div class="col-md-10">
                        <input type="text" name="StudentName" class="form-control" value="{{ $student->NameStudent }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-2 col-label-form">Gender Student</label>
                    <div class="col-md-10">

                        <select name="StudentGender" class="form-control">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-2 col-label-form">Classroom</label>
                    <div class="col-md-10">
                        <select name="IDClassroom" id="IDClassroom" class="form-control">
                            @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->IdClass }}" @if($classroom->IdClass == $student->IDClass) selected @endif>{{ $classroom->nameClass }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" class="btn btn-success" value="Update">
                </div>
                <script>
                    document.getElementsByName('StudentGender')[0].value = "{{ $student->GenderStudent }}"
                </script>
            </form>
        </div>
    </div>
@endsection('content')
