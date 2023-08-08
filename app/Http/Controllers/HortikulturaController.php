<?php

namespace App\Http\Controllers;

use App\Mail\Mailupdate;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Auth;
use App\Models\Hortikultura;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class HortikulturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hortikultura::all();

        return view('admin.hortikultura.index', compact('data'));
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
    public function show(Hortikultura $hortikultura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hortikultura $hortikultura)
    {

        $data = Produsen::where('user_id', '=', $hortikultura->user_id)->get();
        $usaha = Usaha::where('user_id', '=', $hortikultura->user_id)->get();

        return view('admin.hortikultura.edit', compact('hortikultura','data','usaha'));
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
        if($hortikultura->wasChanged('status'))
        {
            $data = $hortikultura;

            Mail::to($hortikultura->user->email)->send(new Mailupdate($data));
        }

        return redirect()->route('admin.hortikultura.index')->withSuccess('Data Berhasil Diubah');
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
