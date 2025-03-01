<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Jobsheet 2 Praktikum 3
    public  function index() {
        return view('welcome');
    }
    public  function about() {
        return 'NIM : 2341720166 <br> Nama : Abdullah Shamil Basayev';
    }
    public  function articles($id = 'saya id default') {
        return 'Ini halaman artikel dengan id = ' . $id;
    }

}
