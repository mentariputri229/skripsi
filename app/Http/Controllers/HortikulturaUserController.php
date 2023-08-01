<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Models\Hortikultura;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class HortikulturaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hortikultura::where('user_id', '=', Auth::id())->get();

        return view('pemohon.hortikultura.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.hortikultura.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $i = array($request->sarana);
        $hortikultura = hortikultura::create($request->all() +[
            'sarana' => json_encode($i),
        ]);

        // comment this code if foto not used
        $hortikultura_id = $hortikultura->id;
        $setuuid = hortikultura::findOrFail($hortikultura_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $hortikultura_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasihortikultura', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.hortikultura.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(Hortikultura $hortikultura)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.hortikultura.edit', compact('hortikultura','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hortikultura $hortikultura)
    {
        $i = array($request->sarana);
        $hortikultura->update($request->all() + [
            'sarana' => json_encode($i),
        ]);

        $hortikultura_id = $hortikultura->id;
        $setuuid = hortikultura::findOrFail($hortikultura_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $hortikultura_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasihortikultura', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.hortikultura.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hortikultura $hortikultura)
    {
        try {
            $hortikultura->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
