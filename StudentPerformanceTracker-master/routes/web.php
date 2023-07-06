<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UploadImageController;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});



Route::middleware(['auth', 'user-role:student'])->group(function(){
    Route::get("/student/home",[HomeController::class, 'studentHome'])->name('home.student');
    Route::get('/student/attendance/{attendance}', [AttendanceController::class, 'show'])->name('attendance.show');
    Route::post('/student/entermarks', [HomeController::class, 'entermarks'])->name('student.marks.store');
    Route::get('/student/viewmarks', [HomeController::class, 'viewmarks'])->name('student.viewmarks');
});

Route::middleware(['auth', 'user-role:teacher'])->group(function(){
    Route::get("/teacher/home",[HomeController::class, 'teacherHome'])->name('home.teacher');
    Route::get('/teacher/attendance/index', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/teacher/attendance/index/report', [AttendanceController::class, 'index202'])->name('attendance.index202');
    Route::post('/teacher/attendance', [AttendanceController::class, 'store'])->name('teacher.attendance.store');
    Route::post('/teacher/attendance/index/report/excelform', [AttendanceController::class, 'exportExcel'])->name('attendance.exportExcel');
    Route::get('/teacher/attendance-create/{periodid}', [AttendanceController::class, 'createByTeacher'])->name('teacher.attendance.create');
});

Route::middleware(['auth', 'user-role:mentor'])->group(function(){
    Route::get("/mentor/home",[HomeController::class, 'mentorHome'])->name('home.mentor');
});

Route::get('/upload-certificate',function(){
    return view('additional/certificateUpload');})->name('uploadCertificate');

Route::get('goreport',[HomeController::class,'SPTreport'])->name('SPT.report');

//uploadCertificate
// Route::post('/upload-course',[UploadImageController::class,'uploadCourse']);
Route::post('/upload-internship',[UploadImageController::class,'uploadInternship']);

//show certificate
// Route::get('/mentor/home',[UploadImageController::class,'index']);

// Route::get('/mentor/home/delete/{id}',[HomeController::class,'destroy'])->name('destroy');
Route::post('/mentor/home/approve',[HomeController::class,'approve'])->name('mentor.approve');

