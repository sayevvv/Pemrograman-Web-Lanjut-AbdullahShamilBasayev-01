<?php
namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect('/dashboard'); // or wherever your main page is
        }
        return view('landing.index'); // landing page
    }
    public function dashboard() {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
           ];

           $activeMenu = 'dashboard';

           return view('welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
