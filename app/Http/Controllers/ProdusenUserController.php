<?php

namespace App\Http\Controllers;

use App\Models\Produsen;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProdusenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produsen::where('user_id', '=', Auth::id())->get();

        return view('pemohon.produsen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemohon.produsen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produsen = produsen::create($request->all());

        // comment this code if foto not used
        $produsen_id = $produsen->id;
        $setuuid = produsen::findOrFail($produsen_id);
        if($request->photo != null)
        {
            $img = $request->file('photo');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $produsen_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/fotoprodusen', $foto);
            $setuuid->photo       = $foto;
        }else{
            $setuuid->photo       = $setuuid->photo;
        }
        $setuuid->update();
        return redirect()->route('user.produsen.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(Produsen $produsen)
    {
        return view('pemohon.produsen.edit', compact('produsen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produsen $produsen)
    {
        $produsen->update($request->all());

        // comment this code if foto not used
        $produsen_id = $produsen->id;
        $setuuid = produsen::findOrFail($produsen_id);
        if($request->photo != null)
        {
            $img = $request->file('photo');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $produsen_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/fotoprodusen', $foto);
            $setuuid->photo       = $foto;
        }else{
            $setuuid->photo       = $setuuid->photo;
        }
        $setuuid->update();
        return redirect()->route('user.produsen.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produsen $produsen)
    {
        try {
            $produsen->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
