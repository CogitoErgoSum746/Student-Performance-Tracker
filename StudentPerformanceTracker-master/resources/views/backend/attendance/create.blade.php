@extends('layouts.app')

@section('styling')
<style>
   /* body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f2f2f2;
      } */

      table {
			border-collapse: collapse;
			width: 100%;
			margin: 20px 0;
			font-size: 16px;
		}
		table th,
		table td {
			text-align: center;
			padding: 12px;
			border: 1px solid #ddd;
		}
		table th {
			background-color: #f2f2f2;
			color: #333;
			font-weight: bold;
		}
		table tr:nth-child(even) {
			background-color: #f8f8f8;
		}
	

      label {
        display: block;
        margin-bottom: 8px;
      }

      input[type="radio"] {
        margin-right: 10px;
      }
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
    input[type="radio"] {
        margin-right: 10px;
      }
</style>
@endsection

@section('content')
<div class="create">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="" style="text-align:center;">Attendance for {{ $period->name }}</h2>
        </div>
    </div>

    
            <div class="text-sm text-red-600 italic">
                @error('attendances')
                <span class="border-l-4 border-red-500 px-2">{{ $message }}</span>
                @enderror
                @if(session('status'))
                <span class="border-l-4 border-red-500 px-2">{{ session('status') }}</span>
                @endif
            </div>
            <p class="invisible"></p>
            <h3 class="" style="text-align:center;"> Date: {{ date('Y-m-d') }}</h3>
        
        <form action="{{ route('teacher.attendance.store') }}" method="POST">
        @csrf
            <!-- <input type="date" name="atten_date"> -->
            <p class="invisible"></p>
            <p class="invisible"></p>
            <label for="atten_date">Date: </label>
            <input type="date" name="atten_date" id="atten_date" >
            <label>Select subject: </label>
            <select name="subject">
                @foreach($subjects as $subject)
                    <option value="{{$subject->name}}">{{$subject->name}}</option>
                @endforeach
            </select>
            <p class="invisible"></p><p class="invisible"></p>
            <table>
                <thead>
                    <tr>
                    <td>Name</td>
                    <td>Roll Number</td>
                    <td>Attendance</td>
                </tr>
                </thead>
                
                <tbody>
                @foreach ($students->where('division','=',$period->division) as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->roll_number }}</td>
                    <td><label>
                            <input name="attendances[{{ $student->id }}]"  type="radio" value="present">
                            Present
                        </label>
                        <label>
                            <input name="attendances[{{ $student->id }}]"  type="radio" value="absent">
                            Absent
                        </label>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="period_id" value="{{ $period->id }}">
            <input type="hidden" name="teacher_id" value="{{ $period->teacher_id }}">
            <br>
            
                <button class="btn btn-lg  btn-dark w-10" type="submit">
                    Attendance
                </button>
        </form>
    
</div>
<a href="{{ route('home.teacher') }}"><button class="btn btn-lg  btn-dark w-10" style="margin-left:80%;"type="submit">GOTO Dashboard </button></a>


</div>
@endsection