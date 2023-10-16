<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\Visitor;
use Illuminate\Http\Request;
use function Termwind\render;

class VisitorsController extends Controller
{
    public function index($status)
    {
        $visitors = Visitor::query()->where('visitor_status', $status)->get();
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {
        $status = Visitor::getVisitorStatus();
        return view('visitors.create', compact('status'));
    }

    public function store(CreateVisitorRequest $request)
    {
        $data = $request->validated();
        $visitor = Visitor::query()->create($data);
        if ($visitor) {
            return redirect()->route('dashboard')->with('status', "{$visitor->visitor_status_name} успішно доданий!");
        }

        return redirect()->back()->with('error', 'Smth is wrong');

    }

    public function edit($id)
    {
        $visitor = Visitor::find($id);
        $status = Visitor::getVisitorStatus();
        return view('visitors.edit', compact('visitor', 'status'));
    }

    public function update(UpdateVisitorRequest $request, $id)
    {
        $updateVisitorData = $request->validated();

        $visitor = Visitor::create($updateVisitorData);
        if ($visitor) {
            return redirect()->route('visitors', $visitor->visitor_status)->with('status', "{$visitor->name} був успішно змінен");
        }

        return redirect()->back()->with('error', 'Smth is wrong');
    }

    public function visitorCard($id)
    {
        $visitor = Visitor::find($id);
        $cases = CourtCase::query()->where('visitor_id', $id)->paginate(10);
        $consultations = Consultation::query()->where('visitor_id', $id)->paginate(10);
        return view('visitors.card', compact(
            'visitor',
            'cases',
            'consultations'
        ));
    }
}
