<!-- <table>
    <tr>
        <td>Student Name </td>
        <td>Roll no </td>
        <td>Attendance </td>
        <td>Date </td>
    </tr>
    @foreach($attens as $a)
    <tr>
        <td>{{$stud->find($a->student_id)->name}}</td>
        <td>{{$stud->find($a->student_id)->roll_number}}</td>
        @if($a->attendance_status) <td>Present</td>
        @else <td>Absent</td>
        @endif
        <td>{{$a->attendance_date}}</td>
    </tr>
    @endforeach
</table> -->




<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<style>
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
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Student Name</th>
				<th>Roll No.</th>
				<th>Attendance</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
        @foreach($attens as $a)
        <tr>
            <td>{{$stud->find($a->student_id)->name}}</td>
            <td>{{$stud->find($a->student_id)->roll_number}}</td>
            @if($a->attendance_status) <td>Present</td>
            @else <td>Absent</td>
            @endif
            <td>{{$a->attendance_date}}</td>
        </tr>
        @endforeach
		</tbody>
	</table>
</body>
</html>
