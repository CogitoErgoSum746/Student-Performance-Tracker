<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\period;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Joel Abraham',
                'email' => 'joel@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'Deepak Hooda',
                'email' => 'deepak@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'lal babu',
                'email' => 'lal@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'Saurabh Dipte',
                'email' => 'saurabh@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'Chris Abraham',
                'email' => 'chris@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'martin manuel',
                'email' => 'martin@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],

            [
                'name' => 'Teacher1',
                'email' => 'Teacher1@example.com',
                'password' => bcrypt('123456'),
                'role' => '1'
            ],

            [
                'name' => 'Mentor1',
                'email' => 'Mentor1@example.com',
                'password' => bcrypt('123456'),
                'role' => '2'
            ],

            [
                'name' => 'Teacher2',
                'email' => 'Teacher2@example.com',
                'password' => bcrypt('123456'),
                'role' => '1'
            ],
            [
                'name' => 'Joel Abraham2',
                'email' => 'joel2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
        
            [
                'name' => 'Deepak Hooda2',
                'email' => 'deepak2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
        
            [
                'name' => 'lal babu2',
                'email' => 'lal2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
        
            [
                'name' => 'Saurabh Dipte2',
                'email' => 'saurabh2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
        
            [
                'name' => 'Chris Abraham2',
                'email' => 'chris2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ],
        
            [
                'name' => 'martin manuel2',
                'email' => 'martin2@example.com',
                'password' => bcrypt('123456'),
                'role' => '0'
            ]
        ];

        $teachers = [
            [
                'user_id' => '7',
                'name' => 'Teacher1'
            ],
            [
                'user_id' => '9',
                'name' => 'Teacher2'
            ]
        ];

        $students = [
            [
                'user_id' => '1',
                'name' => 'Joel Abraham',
                'roll_number' => '1',
                'division' => 'A'
            ],
            [
                'user_id' => '2',
                'name' => 'Deepak Hooda',
                'roll_number' => '2',
                'division' => 'A'
            ],
            [
                'user_id' => '3',
                'name' => 'lal babu',
                'roll_number' => '3',
                'division' => 'A'
            ],
            [
                'user_id' => '4',
                'name' => 'Saurabh Dipte',
                'roll_number' => '4',
                'division' => 'A'
            ],
            [
                'user_id' => '5',
                'name' => 'Chris Abraham',
                'roll_number' => '5',
                'division' => 'A'
            ],
            [
                'user_id' => '6',
                'name' => 'martin manuel',
                'roll_number' => '6',
                'division' => 'A'
            ],
            [
                'user_id' => '10',
                'name' => 'Joel Abraham2',
                'roll_number' => '1',
                'division' => 'B'
            ],
            [
                'user_id' => '11',
                'name' => 'Deepak Hooda2',
                'roll_number' => '2',
                'division' => 'B'
            ],
            [
                'user_id' => '12',
                'name' => 'lal babu2',
                'roll_number' => '3',
                'division' => 'B'
            ],
            [
                'user_id' => '13',
                'name' => 'Saurabh Dipte2',
                'roll_number' => '4',
                'division' => 'B'
            ],
            [
                'user_id' => '14',
                'name' => 'Chris Abraham2',
                'roll_number' => '5',
                'division' => 'B'
            ],
            [
                'user_id' => '15',
                'name' => 'martin manuel2',
                'roll_number' => '6',
                'division' => 'B'
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }

        $subjects = [
            [
                'name' => 'DWM'
            ],
            [
                'name' => 'SPCC'
            ],
            [
                'name' => 'CN'
            ],
            [
                'name' => 'TCS'
            ],
            [
                'name' => 'AI'
            ]];

        $periods = [
            [
                'name' => '1A',
                'division' => 'A',
                'teacher_id' => '1'
            ],
            [
                'name' => '1B',
                'division' => 'B',
                'teacher_id' => '1'
            ],
            [
                'name' => '2A',
                'division' => 'A',
                'teacher_id' => '2'
            ],
            [
                'name' => '2B',
                'division' => 'B',
                'teacher_id' => '2'
            ],
        ];


        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }

        foreach ($students as $student) {
            Student::create($student);
        }

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        foreach ($periods as $period) {
            period::create($period);
        }
    }
}
