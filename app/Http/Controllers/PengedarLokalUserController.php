<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Produsen;
use App\Models\Usaha;
use App\Models\PengedarLokal;
use Illuminate\Http\Request;

class PengedarLokalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengedarLokal::all();

        return view('pemohon.pengedarlokal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarlokal.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $i = array($request->sarana);
        $pengedarlokal = pengedarlokal::create($request->all() + [
            'sarana' => json_encode($i),
        ]);

        // comment this code if foto not used
        $pengedarlokal_id = $pengedarlokal->id;
        $setuuid = pengedarlokal::findOrFail($pengedarlokal_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarlokal_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihlokal', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarlokal.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(PengedarLokal $pengedarlokal)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.pengedarlokal.edit', compact('pengedarlokal','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengedarLokal $pengedarlokal)
    {
        $i = array($request->sarana);
        $pengedarlokal->update($request->all() + [
            'sarana' => json_encode($i),
        ]);

        $pengedarlokal_id = $pengedarlokal->id;
        $setuuid = pengedarlokal::findOrFail($pengedarlokal_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $pengedarlokal_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pengedarbenihlokal', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.pengedarlokal.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengedarLokal $pengedarlokal)
    {
        try {
            $pengedarlokal->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
