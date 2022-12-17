<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CashRequest;
use App\Models\Cash;
use DateTime;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashes = Cash::latest()->get();

        // Total Uang Kas
        if ($cashes != "") {
            foreach ($cashes as $key => $cash) {
                $amount[] = $cash->amount;
            }
        } else {
            $amount[] = 0;
        }
        $res = array_sum($amount);

        // Total Pemasukan Mingguan
        $incomes = Cash::where('status', 'income')->get();
        if ($incomes != "") {
            foreach ($incomes as $key => $income) {
                $cashdate = $income->date;
                $cashconvert = new DateTime($cashdate);
                $cashweek = $cashconvert->format('W');
                $cashday = date('l', strtotime($cashdate));

                $date = date('Y-m-d');
                $convert = new DateTime($date);
                $week = $convert->format('W');
                $day = date('l', strtotime($date));

                if ($week == $cashweek) {
                    $amountWeek[] = $income->amount;

                    if ($cashday == 'Monday') {
                        if ($income->amount != 0) {
                            $senin[] = $income->amount;
                        }
                    } else {
                        $senin[] = 0;
                    }
                    if ($cashday == 'Tuesday') {
                        if ($income->amount != 0) {
                            $selasa[] = $income->amount;
                        }
                    } else {
                        $selasa[] = 0;
                    }
                    if ($cashday == 'Wednesday') {
                        if ($income->amount != 0) {
                            $rabu[] = $income->amount;
                        }
                    } else {
                        $rabu[] = 0;
                    }
                    if ($cashday == 'Thursday') {
                        if ($income->amount != 0) {
                            $kamis[] = $income->amount;
                        }
                    } else {
                        $kamis[] = 0;
                    }
                    if ($cashday == 'Friday') {
                        if ($income->amount != 0) {
                            $jumat[] = $income->amount;
                        }
                    } else {
                        $jumat[] = 0;
                    }
                    if ($cashday == 'Saturday') {
                        if ($income->amount != 0) {
                            $sabtu[] = $income->amount;
                        }
                    } else {
                        $sabtu[] = 0;
                    }
                    if ($cashday == 'Sunday') {
                        if ($income->amount != 0) {
                            $ahad[] = $income->amount;
                        }
                    } else {
                        $ahad[] = 0;
                    }
                } else {
                    $amountWeek[] = 0;
                    $senin[] = 0;
                    $selasa[] = 0;
                    $rabu[] = 0;
                    $kamis[] = 0;
                    $jumat[] = 0;
                    $sabtu[] = 0;
                    $ahad[] = 0;
                }
            }
        } else {
            $amountWeek[] = 0;
            $senin[] = 0;
            $selasa[] = 0;
            $rabu[] = 0;
            $kamis[] = 0;
            $jumat[] = 0;
            $sabtu[] = 0;
            $ahad[] = 0;
        }
        $resWeek = array_sum($amountWeek);
        $days = [
            'senin' => array_sum($senin),
            'selasa' => array_sum($selasa),
            'rabu' => array_sum($rabu),
            'kamis' => array_sum($kamis),
            'jumat' => array_sum($jumat),
            'sabtu' => array_sum($sabtu),
            'ahad' => array_sum($ahad),
        ];

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

        // Laporan Bulanan


        return view('pages.dashboard.contents.cashes.index', compact('pengeluaran', 'res', 'resWeek', 'cashes', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.contents.cashes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashRequest $request)
    {
        $data = $request->all();

        Cash::create([
            'amount' => $data['amount'],
            'status' => $data['status'],
            'date' => $data['date'],
            'desc' => $data['desc']
        ]);

        return redirect()->route('cash.index')->with('success', 'Berhasil tambah data!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cash = Cash::findOrFail($id);

        return view('pages.dashboard.contents.cashes.edit', compact('cash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CashRequest $request, $id)
    {
        $cash = Cash::findOrFail($id);

        $data = $request->all();

        $cash->update([
            'amount' => $data['amount'],
            'status' => $data['status'],
            'date' => $data['date'],
            'desc' => $data['desc'],
        ]);

        return redirect()->route('cash.index')->with('warning', 'Berhasil ubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash = Cash::findOrFail($id);

        $cash->delete();

        return redirect()->route('cash.index')->with('danger', 'Berhasil hapus data!');
    }
}
