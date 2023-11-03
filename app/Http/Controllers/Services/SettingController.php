<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function dd;

class SettingController extends Controller
{
    public function index()
    {
        $admin = Role::findById(1);
        $manager = Role::findById(2);
        $advocate = Role::findById(3);
        $guest = Role::findById(4);
        $dataAdmin = [
            //Add id roles to sync permission
        ];
        $permission = Permission::whereIn('id', $dataAdmin)->get();
//        dd($permission);
        $success = $advocate->syncPermissions($permission);
//        $success = $manager->syncPermissions($permission);
        dd($success);
    }
}
