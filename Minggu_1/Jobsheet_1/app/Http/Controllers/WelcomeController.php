<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Jobsheet 2 Praktikum 3
    public function hello() {
        return 'Hello World';
    }
    // Jobsheet 2 Praktikum 7
    // public function greeting(){
    //     return view('blog.hello', ['name' => 'Shamil']);
    // }
    // Jobsheet 2 Praktikum 8
    public function greeting(){
        return view('blog.hello')
        ->with('name', 'Shamil')
        ->with('occupation', 'Mahasigma');
    }
}
