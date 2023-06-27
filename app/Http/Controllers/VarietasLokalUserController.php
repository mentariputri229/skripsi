<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Models\VarietasLokal;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class VarietasLokalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VarietasLokal::where('user_id', '=', Auth::id())->get();

        return view('pemohon.varietaslokal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.varietaslokal.create', compact('data','usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $varietaslokal = varietaslokal::create($request->all());

        // comment this code if foto not used
        $varietaslokal_id = $varietaslokal->id;
        $setuuid = varietaslokal::findOrFail($varietaslokal_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $varietaslokal_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasivarietaslokal', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.varietaslokal.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(VarietasLokal $varietaslokal)
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();
        $usaha = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.varietaslokal.edit', compact('varietaslokal','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VarietasLokal $varietaslokal)
    {
        $varietaslokal->update($request->all());

        $varietaslokal_id = $varietaslokal->id;
        $setuuid = varietaslokal::findOrFail($varietaslokal_id);
        if($request->persyaratan != null)
        {
            $img = $request->file('persyaratan');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $varietaslokal_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/rekomendasivarietaslokal', $foto);
            $setuuid->persyaratan       = $foto;
        }else{
            $setuuid->persyaratan       = $setuuid->persyaratan;
        }
        $setuuid->update();
        return redirect()->route('user.varietaslokal.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $benihunggul->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
