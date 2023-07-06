@extends('layouts.app')

@section('content')
<!-- <div class="create">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-gray-700 uppercase font-bold" style="text-align:center;">Attendance</h2>
        </div>
    </div>

    <div class="w-full mt-8 bg-white rounded">
        <form action="{{ route('attendance.index202') }}" method="GET" class="md:flex md:items-center md:justify-between px-6 py-6 pb-0">
            @csrf
            <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                <div class="flex flex-row items-center bg-gray-200 px-4 py-3 rounded">
                    <label>Select period</label>
                    <select name="period">
                        @foreach($periods as $period)
                        <option value="{{$period->id}}">{{$period->name}}</option>
                        @endforeach
                    </select>
                    <label>Select subject</label>
                    <select name="subject">
                        @foreach($subjects as $subject)
                        <option value="{{$subject->name}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <h3>From : </h3>
                <input type="date" name="date1">
                <h3> To : </h3>
                <input type="date" name="date2">
            </div>

            <div class="md:flex md:items-center mb-6 text-gray-700 uppercase font-bold">
                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded" type="submit">Generate</button>
            </div>
        </form>
    </div>

</div> -->







<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    label {
        font-size: 18px;
        margin-bottom: 10px;
    }

    select {
        font-size: 16px;
        padding: 8px;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    option {
        font-size: 16px;
        color: #000;
    }
    label {
        font-size: 18px;
        color: #333;
        margin-bottom: 5px;
      }

      input[type="date"] {
        font-size: 16px;
        padding: 10px;
        border: none;
        border-bottom: 2px solid #333;
        background-color: transparent;
        margin-bottom: 20px;
        width: 100%;
        max-width: 300px;
      }

      input[type="date"]:focus {
        outline: none;
        border-bottom-color: #0099ff;
      }

      input[type="submit"] {
        background-color: #0099ff;
        color: #fff;
        font-size: 16px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s ease;
      }

      input[type="submit"]:hover {
        background-color: #0077cc;
      }
</style>



<div class="create">

    <div>
        <h2 class="text-gray-700 uppercase font-bold" style="text-align:center;">Attendance</h2>
    </div>
        <form action="{{ route('attendance.index202') }}" method="GET" >
            @csrf
            <div>
                <label>Select period: </label>
                    <select name="period">
                        @foreach($periods as $period)
                        <option value="{{$period->id}}">{{$period->name}}</option>
                        @endforeach
                    </select>
                    <label>Select subject: </label>
                    <select name="subject">
                        @foreach($subjects as $subject)
                        <option value="{{$subject->name}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
            </div>
            <p class="invisible"></p>
            <p class="invisible"></p>
            <p class="invisible"></p>
            <label for="date1">From: </label>
            <input type="date" name="date1" id="date1" >
            <label for="date2">From: </label>
            <input type="date" name="date2" id="date2">
            <button class="btn btn-lg  btn-dark w-10 " type="submit">Generate</button>
            
        </form>
    

</div>


















@endsection