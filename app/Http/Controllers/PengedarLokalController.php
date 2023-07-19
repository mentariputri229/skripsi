<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Produsen;
use App\Models\Usaha;
use App\Models\PengedarLokal;
use Illuminate\Http\Request;

class PengedarLokalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PengedarLokal::all();

        return view('admin.pengedarlokal.index', compact('data'));
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
    public function show(PengedarLokal $pengedarlokal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengedarLokal $pengedarlokal)
    {
        $pengedarlokal_id = $pengedarlokal->user_id;

        $data = Produsen::where('user_id', '=', $pengedarlokal_id)->get();
        $usaha = Usaha::where('user_id', '=', $pengedarlokal_id)->get();

        return view('admin.pengedarlokal.edit', compact('pengedarlokal','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengedarLokal $pengedarlokal)
    {
        $pengedarlokal->update($request->all());

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
        return redirect()->route('admin.pengedarlokal.index')->withSuccess('Data Berhasil Diubah');
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
