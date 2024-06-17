@extends('students.master')
@section('content')

    <div class="card container">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Detail Student</b></div>
                <div class="col col-md-6"><a href="{{ route('students.index') }}" class="btn btn-primary btn-sm float-end">List of students</a></div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Name Student: </b></label>
                <div class="col-sm-10">
                    {{ $student->NameStudent }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Gender Student: </b></label>
                <div class="col-sm-10">
                    @if($student->GenderStudent == 0) Male @else Female @endif
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Name Student: </b></label>
                <div class="col-sm-10">
                    {{ $student->classroom->nameClass }}
                </div>
            </div>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection('content')

