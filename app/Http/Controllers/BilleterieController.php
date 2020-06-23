<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilleterieController extends Controller
{
    public function displayForm() {
        return view('billeterie');
    }
}
