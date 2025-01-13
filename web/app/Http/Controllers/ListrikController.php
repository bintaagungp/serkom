<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserListrik;
use App\Models\Tarif;

class ListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = User::find(auth()->user()->id);
        $listrik = UserListrik::select('user_listrik.id', 'user_listrik.nomor_kwh', 'user_listrik.alamat', 'tarif.daya', 'tarif.tarifperkwh')->join('tarif', 'tarif.id', "=", 'user_listrik.tarif_id')->where('user_id', auth()->user()->id)->paginate(10);
        $tarif = Tarif::all();
        return view("listrik", ['pelanggan' => $pelanggan, 'listrik' => $listrik, 'tarif' => $tarif]);
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
        $request->validate([
            'tarif_id' => 'required|integer',
            'alamat' => 'required',
        ]);

        $listrik = new UserListrik;
        $listrik->nomor_kwh = Str::uuid();
        $listrik->alamat = $request->alamat;
        $listrik->user_id = auth()->user()->id;
        $listrik->tarif_id = $request->tarif_id;
        $listrik->save();

        return redirect()->route('listrik')->with('alert-success', 'Successfully adding new data');
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
        $listrik = UserListrik::where('user_id', auth()->user()->id)->where('id', $id)->first();
        $listrik->delete();

        return redirect()->route('listrik')->with('alert-success', 'Successfully remove data');
    }
}
