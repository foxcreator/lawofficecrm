<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    public function index()
    {
        $admin = Role::findById(1);
        $manager = Role::findById(2);
        $advocate = Role::findById(3);
        $guest = Role::findById(4);
        $dataAdmin = [
            '1',
//            '2',
//            '3',
//            '4',
//            '5',
            '6',
//            '7',
            '8',
//            '9',
//            '10',
            '11',
            '12',
            '13',
            '14',
//            '15',
//            '16',
        ];
        $permission = Permission::whereIn('id', $dataAdmin)->get();
//        dd($permission);
        $success = $advocate->syncPermissions($permission);
//        $success = $manager->syncPermissions($permission);
        dd($success);
    }
}
