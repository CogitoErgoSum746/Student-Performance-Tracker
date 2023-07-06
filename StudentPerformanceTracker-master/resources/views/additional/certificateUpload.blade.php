@extends('layouts.app')

@section('content')

<div class="card text-center">
  <div class="card p-4 mt-4">
    <form action="/upload-internship" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label><h1>Upload Internship Certificate</h1></label>
            <input type="file" name="profile-internship" class="form-control" />
            <label><h3>Enter Area of expertise</h3></label>
            <input type="text" name="domain-name" class="form-control" />
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
  </div>
</div>
@endsection