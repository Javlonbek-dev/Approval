<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
use App\Models\Contract;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class ContractController extends Controller
{

    function numberToUzbek($number)
    {
        $ones = ["", "bir", "ikki", "uch", "to'rt", "besh", "olti", "yetti", "sakkiz", "to'qqiz"];
        $tens = ["", "o'n", "yigirma", "o'ttiz", "qirq", "ellik", "oltmis", "yetmis", "sakson", "to'qson"];
        $hundred = "yuz";
        $thousands = "ming";
        $millions = "million";
        $billions = "milliard";

        if ($number == 0) {
            return "nol";
        }

        if ($number < 10) {
            return $ones[$number];
        } elseif ($number < 100) {
            $ten = intdiv($number, 10);
            $one = $number % 10;
            return $tens[$ten] . ($one ? " " . $ones[$one] : "");
        } elseif ($number < 1000) {
            $hundreds = intdiv($number, 100);
            $remainder = $number % 100;
            return $ones[$hundreds] . " " . $hundred . ($remainder ? " " . $this->numberToUzbek($remainder) : "");
        } elseif ($number < 1000000) {
            $thousandPart = intdiv($number, 1000);
            $remainder = $number % 1000;
            return $this->numberToUzbek($thousandPart) . " " . $thousands . ($remainder ? " " . $this->numberToUzbek($remainder) : "");
        } elseif ($number < 1000000000) {
            $millionPart = intdiv($number, 1000000);
            $remainder = $number % 1000000;
            return $this->numberToUzbek($millionPart) . " " . $millions . ($remainder ? " " . $this->numberToUzbek($remainder) : "");
        } elseif ($number < 1000000000000) {
            $billionPart = intdiv($number, 1000000000);
            $remainder = $number % 1000000000;
            return $this->numberToUzbek($billionPart) . " " . $billions . ($remainder ? " " . $this->numberToUzbek($remainder) : "");
        } else {
            return "Limit: 0 - 999,999,999,999";
        }
    }

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
        $price_way = 103500;
        $bhm = 340000;

        //company info
        $company_address = $contract->application->laboratory->company->address;
        $laboratory_address = $contract->application->laboratory->address;
        $company_inn = $contract->application->laboratory->company->stir;
        $company_bank_vis = $contract->application->laboratory->company->bank_visits;

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


 $total_string= $this->numberToUzbek($total);

        $pdf = PDF::loadView('contract.generate_pdf', [
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
            'company_address' => $company_address,
            'laboratory_address' => $laboratory_address,
            'company_inn' => $company_inn,
            'company_bank_vis' => $company_bank_vis,
            'total_string'=>$total_string
        ]);

        return $pdf->download('contract_' . $contract->id . '.pdf');
    }
}
