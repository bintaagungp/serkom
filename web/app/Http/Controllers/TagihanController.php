<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = auth()->user();
        $tagihan = Tagihan::join('user_listrik', 'user_listrik.id', '=', 'tagihan.user_listrik_id')
        ->join('tarif', 'tarif.id', '=', 'user_listrik.tarif_id')
        ->join('penggunaan', 'penggunaan.id', '=', 'tagihan.penggunaan_id')
        ->where('user_listrik.user_id', $data->id)->paginate(10);

        $result = [];
        foreach ($tagihan->items() as $t) {
            array_push($result, [
                'tagihan_id' => $t->id,
                'nomor_kwh' => $t->nomor_kwh,
                'total' => $t->tarifperkwh * $t->jumlah_meter,
                'daya'=>  $t->daya,
                'jumlah_meter' => $t->jumlah_meter,
            ]);
        }
        return view('tagihan', ['tagihan' => $tagihan, 'result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
