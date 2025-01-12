<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif;

class DayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarif = Tarif::paginate(10);
        return view('admin.daya', ['tarif' => $tarif]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarif = new Tarif;
        $tarif->daya = $request->daya;
        $tarif->tarifperkwh = $request->tarifperkwh;
        $tarif->save();

        return redirect()->route('admin.daya');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarif = Tarif::find($id);
        return view('admin.daya.edit', ['tarif' => $tarif]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarif = Tarif::find($id);
        $tarif->daya = $request->daya;
        $tarif->tarifperkwh = $request->tarifperkwh;
        $tarif->save();

        return redirect()->route('admin.daya');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarif = Tarif::find($id);
        $tarif->delete();
        return redirect()->route('admin.daya');
    }
}
