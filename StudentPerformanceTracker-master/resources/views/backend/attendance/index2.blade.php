@extends('layouts.app')

@section('styling')
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
@endsection

@section('content')
<div class="create">
    @include('backend.attendance.exportExcel')
</div>
<form action="{{route('attendance.exportExcel')}}" method="post">
    @csrf
    <input type="hidden" name="p" value="{{ $period }}">
    <input type="hidden" name="a" value="{{ $attens }}">
    <input type="hidden" name="s" value="{{ $stud }}">

    <!-- <button type="submit" class="btn btn-primary ">Export to Excel</button> -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Export to Excel</button>
    </div>
</form>
    
@endsection