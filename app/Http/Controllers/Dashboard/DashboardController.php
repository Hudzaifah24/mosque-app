<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Kajian;
use DateTime;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kajians = Kajian::latest()->paginate(5);

        // Total Uang Kas
        $cashes = Cash::get();
        if ($cashes != "") {
            foreach ($cashes as $key => $cash) {
                $amount[] = $cash->amount;
            }
        } else {
            $amount[] = 0;
        }
        $uangKas = array_sum($amount);

        // Total Pemasukan Mingguan
        $incomes = Cash::where('status', 'income')->get();
        if ($incomes != "") {
            foreach ($incomes as $key => $income) {
                $cashdateIncome = $income->date;
                $cashconvertIncome = new DateTime($cashdateIncome);
                $cashweekIncome = $cashconvertIncome->format('W');

                $date = date('Y-m-d');
                $convert = new DateTime($date);
                $week = $convert->format('W');

                if ($week == $cashweekIncome) {
                    $amountWeekIncome[] = $income->amount;

                } else {
                    $amountWeekIncome[] = 0;
                }
            }
        } else {
            $amountWeekIncome[] = 0;
        }
        $pemasukanMingguan = array_sum($amountWeekIncome);

        // Total Pengeluaran Mingguan
        $spends = Cash::where('status', 'spend')->get();

        if ($spends != "") {
            foreach ($spends as $key => $spend) {
                $cashdateSpend = $spend->date;
                $cashconvertSpend = new DateTime($cashdateSpend);
                $cashweekSpend = $cashconvertSpend->format('W');

                $date = date('Y-m-d');
                $convert = new DateTime($date);
                $week = $convert->format('W');

                if ($week == $cashweekSpend) {
                    $amountWeekSpend[] = $spend->amount;

                } else {
                    $amountWeekSpend[] = 0;
                }
            }

            // Total Pengeluaran
            foreach ($spends as $key => $TotalSpend) {
                $amountSpends[] = $TotalSpend->amount;
            }
        } else {
            $amountWeekSpend[] = 0;
            $amountSpends[] = 0;
        }
        $pengeluaranMingguan = array_sum($amountWeekSpend);

        $pengeluaran = array_sum($amountSpends);

        return view('pages.dashboard.contents.dashboard', compact('kajians', 'uangKas', 'pengeluaran', 'pemasukanMingguan', 'pengeluaranMingguan'));
    }
}
