<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public  function articles($id = 'saya id default') {
        return 'Ini halaman artikel dengan id = ' . $id;
    }
}
