<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\models\Student;
use App\models\Teacher;
use App\models\subjects;
use App\models\classes;
use App\Models\subject;
use app\models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function studentHome()
    {
        $user = Auth::user();
        $student = Student::with('user')->findOrFail($user->student->id);
        return view('home.student',compact('student'))  ;
    }

    public function entermarks(){

    }

    public function viewmarks(){
        return view('additional.studviewmarks')  ;
    }

    public function teacherHome()
    {
        $user = Auth::user();
        // dd($user->teacher);
        // $teacher = Teacher::with(['user','subjects','classes','students'])->withCount('subjects','classes')->findOrFail($user->Teacher->id);
        $teacher = Teacher::with(['period'])->findOrFail($user->teacher->id);  
        // dd($teacher->period);
        return view('home.teacher',compact('teacher'));
    }

    public function mentorHome()
    {
        $certs = Certificate::where('approved','=',0)->get();
        // dd($certs);
        return view('home.mentor',compact(['certs']));  
    }

    public function approve(Request $request){
        // dd($request);
        $certid = $request->input('certid');
        $tier = $request->input('tier_n');
        $certificate = Certificate::with(['student','image'])->findOrFail($certid);
        $certificate->approved = 1;
        $certificate->tier = $tier;
        $certificate->save();

        $certs = Certificate::where('approved','=',0)->get();
        // dd($certs);
        return view('home.mentor',compact(['certs']));
    }

    public function SPTreport(){
        $certs = Certificate::where('student_id','=',auth()->user()->student->id)->get();
        // dd($cert);
        return view('additional/report',compact(['certs']));
    }

    // public function destroy($id){
    //     DB::table('images')->delete($id);
    //     return redirect(route('home.mentor'));
    // }
}
