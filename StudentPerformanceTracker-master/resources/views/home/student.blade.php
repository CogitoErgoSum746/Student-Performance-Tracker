@extends('layouts.app')

@section('content')
<style>

</style>
<section id="studentview" style="text-align: center; padding: 100px;">
    <div class="row">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card">
                <div class="card-header">
                    <h3>Attendance</h3>
                </div>
                <div class="card-body">
                    <h2>View Attendance</h2>
                    <p>Get to know your current attendance</p>
                    <p>Hassle Free</p>
                    <!-- <p class="invisible">invisible text</p> -->
                    <!-- <button href="" type="button" class="btn btn-lg  btn-outline-dark w-100  "> ATTENDANCE</button> -->
                    <a href="{{route('attendance.show',$student->id)}}"><button type="button" class="btn btn-lg  btn-dark w-100  ">Check Attendance</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 ">
            <div class="card">
                <div class="card-header">
                    <h3>Marks</h3>
                </div>
                <div class="card-body">
                    <h2>Enter Marks</h2>
                    <p>Easily Enter Your Marks</p>
                    <p>Easy to Understand U/I</p>
                    <p class="invisible"></p>
                    <a style='text-decoration:none;' href="{{route('student.viewmarks')}}"><button type="button" class="btn btn-lg  btn-dark w-100  ">MARKS</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4  ">
            <div class="card">
                <div class="card-header">
                    <h3>Extra Co-Curricular</h3>
                </div>
                <div class="card-body">
                    <h2>Upload Certificates</h2>
                    <p>Size Limit of 2MB</p>
                    <p>Should submit xereox copy as well </p>
                    <a  style='text-decoration:none;' href="{{route('uploadCertificate')}}"><button type="button" class="btn btn-lg  btn-dark w-100 ">UPLOAD</button> </a>
                </div>
            </div>
        </div>



        
      <div class="col-lg-4 col-md-4 " >
        <div class="card">
          <div class="card-header">
            <h3>SPT</h3>
          </div>
          <div class="card-body">
            <h2>Your Final Pointer </h2>
            <p>After Considering Attendance, Marks and Extra Co-Curricular activites </p>
            <!-- <p></p> -->
            <a style='text-decoration:none;' href="{{route('SPT.report')}}"><button type="button" class="btn btn-lg  btn-dark w-100 ">Click Here</button></a>
          </div>
        </div>
      </div>
    </div>
    </section>
    </div>
</section>
@endsection