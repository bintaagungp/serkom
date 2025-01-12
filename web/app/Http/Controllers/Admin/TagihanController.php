<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserListrik;
use App\Models\Penggunaan;
use App\Models\Tagihan;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listrik = UserListrik::select('user_listrik.id', 'user_listrik.nomor_kwh', 'user_listrik.alamat', 'tarif.daya', 'tarif.tarifperkwh')
        ->join('tarif', 'tarif.id', '=', 'user_listrik.tarif_id')->paginate(10);
        return view('admin.tagihan', ['listrik' => $listrik]);
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
    public function store(Request $request, $id)
    {
        $penggunaan = new Penggunaan;
        $penggunaan->bulan = $request->bulan;
        $penggunaan->tahun = $request->tahun;
        $penggunaan->meter_awal = $request->meter_awal;
        $penggunaan->meter_akhir = $request->meter_akhir;
        $penggunaan->user_listrik_id = $id;
        $penggunaan->save();

        $tagihan = new Tagihan;
        $tagihan->bulan = $penggunaan->bulan;
        $tagihan->tahun = $penggunaan->tahun;
        $tagihan->jumlah_meter = $penggunaan->meter_akhir - $penggunaan->meter_awal;
        $tagihan->penggunaan_id = $penggunaan->id;
        $tagihan->user_listrik_id = $id;
        $tagihan->save();

        return redirect()->route('admin.tagihan.show', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listrik = UserListrik::find($id);
        $penggunaan = Penggunaan::where('user_listrik_id', $listrik->id)->paginate(10);
        return view('admin.tagihan.show', ['listrik' => $listrik, 'penggunaan' => $penggunaan]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPenggunaan(string $id, string $penggunaan_id)
    {
        $penggunaan = Penggunaan::where('user_listrik_id', $id)->where('id', $penggunaan_id)->first();
        $penggunaan->delete();

        return redirect()->route('admin.tagihan.show', ['id' => $id]);
    }
}
