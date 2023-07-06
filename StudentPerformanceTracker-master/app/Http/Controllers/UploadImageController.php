<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Certificate;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadImageController extends Controller
{
    // public function index(){
    //     return view('home.mentor',['images'=>Image::get()]);
    // }

    // public function uploadCourse(Request $request){
    //     // dd($request->file('profile-course')->getClientOriginalName());
    //     $image = $request->file('profile-course');

    //     $name = $image->getClientOriginalName();

    //     $image->storeAs('public/courses/',$name);

    //     $image_save=new Image;
    //     $image_save->name=$name;
    //     $image_save->save();

    //     return back();
    // }

    public function uploadInternship(Request $request){
        // dd($request->file('profile-course')->getClientOriginalName());
        $stud = Student::findOrFail(auth()->user()->student->id);
        $image = $request->file('profile-internship');

        $domainName = $request->input('domain-name');
        $name = $image->getClientOriginalName();

        $image->storeAs('public/courses/',$name);

        $cert = Certificate::create([
            'student_id' => $stud->id,
            'domain' => $domainName
        ]);


        // dd($cert->id);
        $image_save=new Image;
        $image_save->name=$name;
        $image_save->certificate_id=$cert->id;
        $image_save->save();

        return back();
    }
}
