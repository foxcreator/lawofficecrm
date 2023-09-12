<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.employee.index', compact('users'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store()
    {
        return redirect()->back();
    }

    public function delete()
    {
        // is Working?
    }
}
