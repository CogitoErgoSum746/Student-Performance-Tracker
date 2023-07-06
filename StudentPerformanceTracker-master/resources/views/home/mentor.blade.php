@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Certificate</th>
                <th scope="col">Expertise</th>
                <th scope="col">Tier</th>
                <th scope="col">Approve</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{route('mentor.approve')}}" method="post">
                @csrf
                @foreach($certs as $cert)

                <tr>

                    <input type="hidden" name="certid" value="{{$cert->id}}">
                    <th>{{$cert->student->name}}</th>
                    <th><img src="{{asset('storage/courses/'.$cert->image->name)}}" width="350" height="250" class="img img-responsive"></th>
                    <th>{{$cert->domain}}</th>
                    <th><input type="text" name="tier_n"></th>
                    <th><button type="submit">Approve</button></th>
                </tr>
                @endforeach
            </form>
        </tbody>
    </table>


</div>

@endsection