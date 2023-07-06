@extends('layouts.app')

@section('content')
<section id="studentview" style="text-align: center; padding: 100px;">
    <div class="row" style="margin: auto;">
        <div class="col-lg-6 col-md-6  ">
            <div class="card">
                <div class="card-header">
                    <h3>SPT RUBRICS</h3>
                </div>
                <div class="card-body">
                    <h2>Your Final Pointer </h2>
                    <!-- <p>After Considering Attendance, Marks and Extra Co-Curricular activites </p> -->
                    <p>
                        COURSE = TIER NO. (0,1,2)</p>
                    <p>INTERN = TIER NO. (0,1,2)</p>

                    <h4>ATTENDANCE=%</h4>
                    <h4>Marks=%</h4>

                    <!-- <button type="button" class="btn btn-lg  btn-dark w-100 ">UPLOAD</button> -->
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6  ">
            <div class="card">
                <div class="card-header">
                    <h3>SPT</h3>
                </div>
                <div class="card-body">
                    <h2>Your Final Pointer </h2>
                    <p>After Considering Attendance, Marks and Extra Co-Curricular activites </p>
                    <p>COURSE TIER = 1
                        @foreach($certs as $cert)
                        INTERN TIER = {{$cert->tier}}
                        @endforeach
                    </p>

                    <h2>ATTENDANCE=87.5%</h2>
                    <h2>Marks=78.33%</h2>

                    <h2>SPT POINTER = 7.118 out of 10</h2>
                    <h1>Congrats, aap mumbai aa sakte ho</h1>


                    <!-- <button type="button" class="btn btn-lg  btn-dark w-100 ">UPLOAD</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection