<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Contract;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
// ToDo Make Sorting data in all tables

    public function contractAction(Request $request, $case)
    {
        $case = CourtCase::find($case);
        $birthdate = Carbon::create($case->visitor->birthdate);
        $passportWhenIssued = Carbon::create($case->visitor->passport_when_issued);

        $contractNumber = $this->generateNumbers()['formattedNumber'];
        $pdf = PDF::loadView('docs.contract', compact(
            'case',
            'birthdate',
            'passportWhenIssued',
            'contractNumber'
        ));

        $pdfFileName = 'contract_' .
            str_replace('/', '', $this->generateNumbers()['formattedNumber']) .
            '.pdf';
        $pdfPath = storage_path('app/public/contracts/') . $pdfFileName;
        $pdf->save($pdfPath);

        CourtCase::query()->where('id', $case->id)->update([
            'isset_contract' => true,
        ]);

        Contract::create([
            'number' => $this->generateNumbers()['number'],
            'reception_number' => '01',
            'path' => $pdfPath,
            'name' => $pdfFileName,
        ]);

        $pdf->download($pdfFileName);
        return redirect()->back();
    }

    public function downloadContractAction($id)
    {
        $case = CourtCase::find($id);

        if ($case && $case->isset_contract) {
            $pdfFileName = 'contract_' . $case->id . '.pdf';
            $pdfPath = storage_path('app/public/contracts/') . $pdfFileName;

            if (file_exists($pdfPath)) {
                return response()->download($pdfPath);
            }
        }
    }

    public function generateNumbers()
    {
        $currentYear = Carbon::now()->year;
        $number = Contract::whereYear('created_at', $currentYear)->first();

        if (!$number) {
            $number = new Contract();
            $number->number = 1;
        } else {
            $number->number++;
        }

        $formattedNumber = sprintf("%d/ДогП/%02d/%d", $number->number, 1, $currentYear);
        $numberData = [
            'number' => $number->number,
            'formattedNumber' => $formattedNumber,
        ];

        return $numberData;
    }
}
