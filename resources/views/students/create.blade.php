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
        <div class="card-header"><b>Add new student</b></div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post" >
                @csrf
                <div class="row mb-3">
                    <label class="col-md-2 col-label-form">Tên sinh viên</label>
                    <div class="col-md-10">
                        <input type="text" name="StudentName" class="form-control">
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
                                <option value="{{ $classroom->IdClass }}">{{ $classroom->nameClass }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
