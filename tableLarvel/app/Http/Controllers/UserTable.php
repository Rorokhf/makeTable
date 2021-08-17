<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTable extends Controller
{
    public function user(){
        $users = [
            (object)[
                'id' => 1,
                'name' => 'ahmed',
                "gender" => (object)[
                    'gender' => 'm'
                ],

            ],
            (object)[
                'id' => 2,
                'name' => 'mohamed',
                "gender" => (object)[
                    'gender' => 'm'
                ],


            ],
            (object)[
                'id' => 3,
                'name' => 'mena',
                "gender" => (object)[
                    'gender' => 'f'
                ],
                
            ]
        ];

        return view('users',compact('users'));
    }
}
