<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\CourtCase;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function contractAction(Request $request, $case)
    {
        $case = CourtCase::find($case);
        $birthdate = Carbon::create($case->visitor->birthdate);
        $passportWhenIssued = Carbon::create($case->visitor->passport_when_issued);
        $licenseWhenIssued = Carbon::create($case->user->license_when_issued);

        $contractNumber = $this->generateNumbers()['formattedNumber'];
        $pdf = PDF::loadView('docs.contract', compact(
            'case',
            'birthdate',
            'passportWhenIssued',
            'contractNumber',
            'licenseWhenIssued'
        ));
        $pdf->stream('document.pdf');

//        $pdfFileName = 'contract_' .
//            str_replace('/', '', $this->generateNumbers()['formattedNumber']) .
//            '.pdf';
//        $pdfPath = storage_path('app/public/contracts/') . $pdfFileName;
//        $pdf->save($pdfPath);
//
//        CourtCase::query()->where('id', $case->id)->update([
//            'isset_contract' => true,
//        ]);
//
//        Contract::create([
//            'number' => $this->generateNumbers()['number'],
//            'reception_number' => '01',
//            'path' => $pdfPath,
//            'name' => $pdfFileName,
//            'case_id' => $case->id,
//        ]);
//
//        $pdf->download($pdfFileName);
//        return redirect()->back()->with('success', 'Файл успішно збережено на сервері');
    }

    public function downloadContractAction($id)
    {
        $case = CourtCase::find($id);
        $contract = Contract::where('case_id', $case->id)->first();
        if ($case && $case->isset_contract) {
            $pdfFileName = $contract->name;
            $pdfPath = storage_path('app/public/contracts/') . $pdfFileName;

            if (file_exists($pdfPath)) {
                return response()->download($pdfPath);
            }
        }

        return redirect()->back()->with('error', 'Файл не знайдено на сервері.');
    }

    public function generateNumbers()
    {
        $currentYear = Carbon::now()->year;
        $number = Contract::whereYear('created_at', $currentYear)->orderBy('number', 'desc')->first();

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

    public function about()
    {
        return view('docs.about-system');
    }

    public function policy()
    {
        return view('docs.policy');
    }

    public function testing($case)
    {
        $case = CourtCase::find($case);
        $birthdate = Carbon::create($case->visitor->birthdate);
        $passportWhenIssued = Carbon::create($case->visitor->passport_when_issued);
        $licenseWhenIssued = Carbon::create($case->user->license_when_issued);

        $contractNumber = $this->generateNumbers()['formattedNumber'];
        $pdf = PDF::loadView('docs.contract', compact(
            'case',
            'birthdate',
            'passportWhenIssued',
            'contractNumber',
            'licenseWhenIssued'
        ));
        return $pdf->stream('document.pdf');
    }
}
