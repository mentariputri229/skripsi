<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Models\BenihUnggul;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class BenihUnggulUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BenihUnggul::where('user_id', '=', Auth::id())->get();

        return view('pemohon.benihunggul.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.benihunggul.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $benihunggul = benihunggul::create($request->all());

        // comment this code if foto not used
        $benihunggul_id = $benihunggul->id;
        $setuuid = benihunggul::findOrFail($benihunggul_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $benihunggul_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasibenihunggul', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.benihunggul.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(BenihUnggul $benihunggul)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.benihunggul.edit', compact('benihunggul','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BenihUnggul $benihunggul)
    {
        $benihunggul->update($request->all());

        $benihunggul_id = $benihunggul->id;
        $setuuid = benihunggul::findOrFail($benihunggul_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $benihunggul_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasibenihunggul', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.benihunggul.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BenihUnggul $benihunggul)
    {
        try {
            $benihunggul->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
