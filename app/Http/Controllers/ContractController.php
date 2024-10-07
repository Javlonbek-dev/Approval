<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class ContractController extends Controller
{
    public function generatePDF($id)
    {
        $contract = Contract::find($id);
        $formattedDate = Carbon::parse($contract->contract_date)
                ->locale('uz_uz')
                ->isoFormat('D-MMMM YYYY') . "yil";
        $company_name = $contract->application->laboratory->company->name;
        $company_manager = $contract->application->laboratory->company->manager;
        $approval_count = $contract->application->approval_count;
//        dd($contract->calculates);
//        $approval_price = 0;
//        if ($approval_count = $contract->calculate->count) {
//            $approval_price = $contract->calculate->price;
//        }


        $pdf = PDF::loadView('generate_pdf', [
            'contract' => $contract,
            'formattedDate' => $formattedDate,
            'company_name' => $company_name,
            'company_manager' => $company_manager,
            'approval_count' => $approval_count,
//            'approval_price' => $approval_price,
        ]);

        return $pdf->download('contract_' . $contract->id . '.pdf');
    }
}
