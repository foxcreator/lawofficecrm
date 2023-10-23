<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::query()->orderBy('is_working', 'desc')->get();
        return view('admin.employee.index', compact('users'));
    }

    public function create()
    {
        $roles = User::getRole();
        $genders = User::getGender();
        return view('admin.employee.create', compact('roles', 'genders'));
    }

    public function store(CreateEmployeeRequest $request)
    {
        $data = $request->validated();
        unset($data['confirmPassword']);
        $user = User::create($data);
        $user->assignRole($data['role']);
        if ($user) {
            return redirect()->route('dashboard')->with('status', 'Працівника додано!');
        } else {
            return redirect()->back()->with('error', 'Smth in wrong');
        }
    }

    public function toggleWorking($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->update([
            'is_working' => !$user->is_working,
        ]);
        $message = $user->is_working ? 'Працівника прийнято!' : 'Працівника звільнено!';

        return redirect()->back()->with('status', $message);
    }


    public function employeeCard($id)
    {
        $user = User::find($id);
        if (!auth()->user()->hasRole('super-user') && Auth::user()->id != $id) {
            abort(403, 'Доступ заблоковано');
        }
        $winCasesCount = CourtCase::query()->where('user_id', $id)->where('case_status', 1)->count();
        $casesCount = CourtCase::query()->where('user_id', $id)->count();
        $consultations = Consultation::query()->where('user_id', $id)->paginate(10);
        $cases = CourtCase::query()->where('user_id', $id)->paginate(10);
        $birthdate = $user->birthdate ? Carbon::createFromFormat('Y-m-d', $user->birthdate) : null;
        return view('admin.employee/card', compact(
            'user',
            'birthdate',
            'consultations',
            'cases',
            'casesCount',
            'winCasesCount'
        ));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = User::getRole();
        $genders = User::getGender();
        return view('admin.employee.update', compact('user', 'roles', 'genders'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $updateData = [];
        foreach ($data as $key => $item) {
            if ($item || $item == '0') {
                $updateData[$key] = $item;
            }
        }
        unset($updateData['_token']);
        $user = User::find($id);
        $user->update($updateData);
        if (isset($data['role'])) {
            $user->syncRoles([$data['role']]);
        }
        if ($user) {
            return redirect()->route('admin.employee.index')->with('status', 'Дані працівника успішно змінені!');
        }

        return redirect()->back()->with('error', 'Smth is wrong');
    }
}
