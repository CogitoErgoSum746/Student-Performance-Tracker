<?php

namespace App\Exports;

use app\models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceDataExport implements FromView, ShouldAutoSize
{
    // use Exportable;

    // protected $users = User::get()

    // public function __construct()
    // {
    //     $this->users = User::get;
    // }

    // public function view(): View
    // {
    //     return view('backend.attendance.users',[
    //         'users' => $this->users
    //     ]);
    // }

    public function collection(){
        return User::all();
    }
}
