<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Produsen;
use App\Models\Usaha;
use App\Models\PengedarHortikultura;
use Illuminate\Http\Request;

class PengedarHortikulturaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengedarhortikultura::all();

        return view('pemohon.pengedarhortikultura.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarhortikultura.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengedarhortikultura = pengedarhortikultura::create($request->all());

        // comment this code if foto not used
        $pengedarhortikultura_id = $pengedarhortikultura->id;
        $setuuid = pengedarhortikultura::findOrFail($pengedarhortikultura_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarhortikultura_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihhortikultura', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarhortikultura.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(PengedarHortikultura $pengedarhortikultura)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarhortikultura.edit', compact('pengedarhortikultura','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengedarHortikultura $pengedarhortikultura)
    {
        $pengedarhortikultura->update($request->all());

        $pengedarhortikultura_id = $pengedarhortikultura->id;
        $setuuid = pengedarhortikultura::findOrFail($pengedarhortikultura_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarhortikultura_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihhortikultura', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarhortikultura.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengedarHortikultura $pengedarhortikultura)
    {
        try {
            $pengedarhortikultura->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
