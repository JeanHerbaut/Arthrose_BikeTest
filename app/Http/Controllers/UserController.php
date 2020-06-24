<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Http\Controllers\CompanyController;

class UserController extends Controller
{
    public function index() {
        $users = User::with('company')
        ->orderBy('users.username')
        ->paginate('20');
        return view('adminConsultation', compact('users'));
    }

    public function edit()
    {
    $id = htmlspecialchars($_GET["user_id"]);
    $user=User::findOrFail($id);
    $companies=Company::all();
    return view('adminModifyUser', compact('user', 'companies'));
    }
}
