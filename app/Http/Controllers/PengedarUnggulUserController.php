<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Produsen;
use App\Models\Usaha;
use App\Models\PengedarUnggul;
use Illuminate\Http\Request;

class PengedarUnggulUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengedarUnggul::all();

        return view('pemohon.pengedarunggul.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarunggul.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengedarunggul = pengedarunggul::create($request->all());

        // comment this code if foto not used
        $pengedarunggul_id = $pengedarunggul->id;
        $setuuid = pengedarunggul::findOrFail($pengedarunggul_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarunggul_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihunggul', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarunggul.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(PengedarUnggul $pengedarunggul)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarunggul.edit', compact('pengedarunggul','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengedarUnggul $pengedarunggul)
    {
        $pengedarunggul->update($request->all());

        $pengedarunggul_id = $pengedarunggul->id;
        $setuuid = pengedarunggul::findOrFail($pengedarunggul_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarunggul_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihunggul', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarunggul.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengedarUnggul $pengedarunggul)
    {
        try {
            $pengedarunggul->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
