<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserListrik;
use App\Models\Tarif;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = User::where('is_admin', false)->paginate(10);
        return view('admin.pelanggan', ['pelanggan' => $pelanggan]);
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
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $pelanggan = new User;
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->password = Hash::make('listrik123');
        $pelanggan->save();
        return redirect()->route('admin.pelanggan')->with('alert-success', 'Successfully adding new data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = User::find($id);
        $listrik = UserListrik::select('user_listrik.id', 'user_listrik.user_id','user_listrik.nomor_kwh', 'user_listrik.alamat', 'tarif.daya', 'tarif.tarifperkwh')->join('tarif', 'tarif.id', "=", 'user_listrik.tarif_id')->where('user_id', $id)->paginate(10);
        $tarif = Tarif::all();
        return view("admin.pelanggan.show", ['pelanggan' => $pelanggan, 'listrik' => $listrik, 'tarif' => $tarif]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = User::find($id);
        return view('admin.pelanggan.edit', ['pelanggan'=>$pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $tarif = User::find($id);
        $tarif->name = $request->name;
        $tarif->email = $request->email;
        $tarif->save();

        return redirect()->route('admin.pelanggan')->with('alert-success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = User::find($id);
        $pelanggan->delete();
        return redirect()->route('admin.pelanggan')->with('alert-success', 'Successfully remove data');
    }

    public function storeListrik(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'tarif_id' => 'required|integer',
        ]);

        $listrik = new UserListrik;
        $listrik->nomor_kwh = Str::uuid();
        $listrik->alamat = $request->alamat;
        $listrik->user_id = $id;
        $listrik->tarif_id = $request->tarif_id;
        $listrik->save();

        return redirect()->route('admin.pelanggan.show', ['id' => $id])->with('alert-success', 'Successfully adding new data');
    }

    public function deleteListrik($id, $listrik_id)
    {
        $listrik = UserListrik::where('user_id', $id)->where('id', $listrik_id)->first();
        $listrik->delete();

        return redirect()->route('admin.pelanggan.show', ['id' => $id])->with('alert-success', 'Successfully remove data');
    }
}
