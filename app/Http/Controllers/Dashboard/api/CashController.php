<?php

namespace App\Http\Controllers\Dashboard\api;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use Illuminate\Http\Request;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashes = Cash::get();

        // Total Uang Kas
        if ($cashes != "") {
            foreach ($cashes as $key => $cash) {
                $amountCash[] = $cash->amount;
            }
        } else {
            $amountCash[] = 0;
        }
        $uangKas = array_sum($amountCash);

        // Total Pemasukan Mingguan
        $incomes = Cash::where('status', 'income')->get();

        if ($incomes != "") {
            foreach ($incomes as $key => $income) {
                $amountIncomes[] = $income->amount;
            }
        } else {
            $amountIncomes[] = 0;
        }

        $pemasukan = array_sum($amountIncomes);

        // Total Pengeluaran
        $spends = Cash::where('status', 'spend')->get();

        if ($spends != "") {
            foreach ($spends as $key => $spend) {
                $amountSpends[] = $spend->amount;
            }
        } else {
            $amountSpends[] = 0;
        }

        $pengeluaran = array_sum($amountSpends);

        $data = [
            'uangKas' => $uangKas,
            'pemasukan' => $pemasukan,
            'pengeluaran' => preg_replace("/-/", "", $pengeluaran)
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
