@extends('layouts.app')

@section('styling')
<style>
    #first #one {
        position: absolute;
    }

    .card {
        border-color: black;
    }

    .card-header {
        border-color: black;
    }
</style>
@endsection
@section('content')

<section id="studentview" style="text-align: center; padding: 100px;">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-lg-4 col-md-4 col-sm-6 " style="margin:auto; float:none; ">
            <div class="card">
                <div class="card-body">
                    <h2>Periods : {{ sprintf("%02d", $teacher->period->count()) }} </h2>
                    <a href="{{ route('attendance.index') }}" style="text-decoration: none; "><button type="button" class="btn btn-lg  btn-outline-dark w-100  "> Check Attendance!!</button></a>
                </div>
            </div>
            <p class="invisible"></p>
        </div>

        <div class="row">
            <!-- <div class="col-lg-4"> -->
                @foreach ($teacher->period as $p)
                <div class="col-lg-4 ">
                    <div class="card">
                        <div class="card-header">
                            <h3>Period Info.</h3>
                        </div>
                        <div class="card-body">
                            <h2>{{ $p->name }} , {{$p->division}} </h2>
                            <a href="{{ route('teacher.attendance.create',$p->id) }}" style="text-decoration: none;"><button type="button" class="btn btn-lg  btn-outline-dark w-100  "> Add Attendance!!</button></a>
                        </div>
                    </div>
                </div>
                <p class="invisible"></p>
                @endforeach
            <!-- </div> -->
        </div>
    </div>
</section>
@endsection