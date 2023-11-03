<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateConsultationRequest;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Reception;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function abort;
use function auth;
use function redirect;
use function view;

class ConsultationsController extends Controller
{
    public function index()
    {
        $consultations = Consultation::orderBy('id', 'desc')->take(20)->paginate(20);
        if (auth()->user()->role(User::ROLE_ADVOCATE)) {
            $consultations = Consultation::where('user_id', auth()->id())->orderBy('id', 'desc')->take(20)->paginate(20);
        }
        $visitors = Visitor::all();
        $advocateRole = Role::where('name', 'advocate')->first();

        $users = $advocateRole->users;
        $categories = Category::all();
        $receptions = Reception::all();

        return view('consultation.index',
            compact(
                'consultations',
                'visitors',
                'users',
                'categories',
                'receptions',
            ));
    }

    public function create()
    {
        if (auth()->user()->can('consultation-create')) {
            $visitors = Visitor::all();
            $users = User::role('advocate')->get();
            $categories = Category::all();
            $receptions = Reception::all();

            return view('consultation.create',
                compact(
                    'visitors',
                    'users',
                    'categories',
                    'receptions',
                ));
        } else {
            abort(403);
        }

    }

    public function store(CreateConsultationRequest $request)
    {
        if (auth()->user()->can('consultation-create')) {
            $consultation = Consultation::create($request->validated());
            if ($consultation) {
                return redirect()->back()->with('status', 'Запис про нову консультацію створено');
            }
        }

        abort(403);

    }

    public function edit(string $id)
    {
        abort(404);
    }

    public function update(Request $request, string $id)
    {
        abort(404);
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}
