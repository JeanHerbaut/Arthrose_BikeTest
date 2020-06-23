<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilleterieController extends Controller
{
    public function rendPage() {
        return view('billeterie');
    }
}
