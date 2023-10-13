<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsultationRequest;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Reception;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateConsultationRequest $request)
    {
        if (auth()->user()->can('consultation-create')) {

            $consultation = Consultation::create($request->validated());

            if ($consultation) {
                return redirect()->back()->with('status', 'Запис про нову консультацію створено');
            }
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
