<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
use App\Models\Contract;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class ContractController extends Controller
{
    public function generatePDF($id)
    {
        $contract = Contract::find($id);
        $calculates = Calculate::all();
        $formattedDate = Carbon::parse($contract->contract_date)
                ->locale('uz_uz')
                ->isoFormat('D-MMMM YYYY') . "yil";

        $company_name = $contract->application->laboratory->company->name;
        $company_manager = $contract->application->laboratory->company->manager;
        $approval_count = $contract->application->approval_count;
        $employee_count = $contract->employees_count;
        $days = $contract->days_count;
        $pracent_qqs = 12;
        $approval_price = 0;
        $price_way = 103530;
        $bhm = 340000;

        foreach ($calculates as $calculate) {
            if ($approval_count == $calculate->count) {
                $approval_price = $calculate->price;
            } else {
                $approval_price = 0;
            }
        }
        $day_price = $days * $bhm;
        $day_price_qqs = ($day_price * $pracent_qqs) / 100;
        $total_day_price = $day_price + $day_price_qqs;

        $calculate_way = $price_way * 2 * $employee_count;
        $employee_price_qqs = ($pracent_qqs * $calculate_way) / 100;
        $total_employee_price = $calculate_way + $employee_price_qqs;

        $approval_qqs = ($approval_price * $pracent_qqs) / 100;
        $approval_total_price = $approval_price + $approval_qqs;

        $total = $total_employee_price + $approval_total_price + $total_day_price;

        $pdf = PDF::loadView('generate_pdf', [
            'contract' => $contract,
            'formattedDate' => $formattedDate,
            'company_name' => $company_name,
            'company_manager' => $company_manager,
            'approval_count' => $approval_count,
            'approval_price' => $approval_price,
            'approval_qqs' => $approval_qqs,
            'approval_total_price' => $approval_total_price,
            'calculate_way' => $calculate_way,
            'day_price' => $day_price,
            'pracent_qqs' => $pracent_qqs,
            'employee_price_qqs' => $employee_price_qqs,
            'total_employee_price' => $total_employee_price,
            'total_day_price' => $total_day_price,
            'employee_count' => $employee_count,
            'price_way' => $price_way,
            'bhm' => $bhm,
            'day_price_qqs' => $day_price_qqs,
            'total' => $total,
            'days' => $days,
        ]);

        return $pdf->download('contract_' . $contract->id . '.pdf');
    }
}
