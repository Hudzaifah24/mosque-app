<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\KajianRequest;
use App\Models\Kajian;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kajians = Kajian::get();

        return view('pages.dashboard.contents.kajian.index', compact('kajians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.contents.kajian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KajianRequest $request)
    {
        $data = $request->all();

        Kajian::create([
            'title' => $data['title'],
            'speaker' => $data['speaker'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'jam' => $data['jam'],
            'tanggal' => $data['tanggal']
        ]);

        return redirect()->route('kajian.index')->with('success', 'Berhasil tambah data!');
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
        $kajian = Kajian::findOrFail($id);

        return view('pages.dashboard.contents.kajian.edit', compact('kajian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KajianRequest $request, $id)
    {
        $kajian = Kajian::findOrFail($id);

        $data = $request->all();

        $kajian->update([
            'title' => $data['title'],
            'speaker' => $data['speaker'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'jam' => $data['jam'],
            'tanggal' => $data['tanggal']
        ]);

        return redirect()->route('kajian.index')->with('warning', 'Berhasil ubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kajian = Kajian::findOrFail($id);

        $kajian->delete();

        return redirect()->route('kajian.index')->with('danger', 'Berhasil hapus data!');
    }
}
