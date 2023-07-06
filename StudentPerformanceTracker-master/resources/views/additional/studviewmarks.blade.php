@extends('layouts.app')

@section('styling')
<style>
    body {
        background-color: #f4f4f4;
        font-family: 'Segoe UI', sans-serif;

    }

    .container {
        width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
    }

    h1 {
        font-size: 32px;
        margin-bottom: 10px;
        color: #333;
    }

    h2 {
        font-size: 20px;
        margin-bottom: 0;
        color: #666;
    }

    .content {
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 18px;
        color: #333;
    }

    th {
        background-color: #f5f5f5;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:last-child {
        background-color: #f5f5f5;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .period,
    .percentage {
        width: 150px;
        padding: 15px;
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .period p,
    .percentage p {
        margin: 0;
        font-size: 16px;
        color: #666;
    }

    .period h3,
    .percentage h3 {
        margin: 0;
        font-size: 24px;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="header">
        <h1>Student Marksheet</h1>
        <h2>SEM-VI</h2>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
            <form action="{{ route('student.marks.store') }}" method="post"></form>
            <tr>
                <td>SPCC</td>
                <td><input type="number" name="SPCC"></td>
            </tr>
            <tr>
                <td>DWM</td>
                <td><input type="number" name="DWM"></td>
            </tr>
            <tr>
                <td>TCS</td>
                <td><input type="number" name="TCS"></td>
            </tr>
            <tr>
                <td>CN</td>
                <td><input type="number" name="CN"></td>
            </tr>
            <tr>
                <td>AI</td>
                <td><input type="number" name="AI"></td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <div class="percentage">
            <p>Percentage</p>
            <h3>{{}}</h3>
        </div>
    </div>
</div>

@endsection