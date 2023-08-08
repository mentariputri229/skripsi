<?php

namespace App\Http\Controllers;

use App\Mail\Mailupdate;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Auth;
use App\Models\BenihUnggul;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class BenihUnggulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BenihUnggul::all();

        return view('admin.benihunggul.index', compact('data'));
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
    public function show(BenihUnggul $benihunggul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BenihUnggul $benihunggul)
    {
        $benihunggul_id = $benihunggul->user_id;

        $data = Produsen::where('user_id', '=', $benihunggul_id)->get();
        $usaha = Usaha::where('user_id', '=', $benihunggul_id)->get();

        return view('admin.benihunggul.edit', compact('benihunggul','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BenihUnggul $benihunggul)
    {
        $i = array($request->sarana);

        $benihunggul->update($request->all() + [
            'sarana' => json_encode($i),
        ]);

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

        if($benihunggul->wasChanged('status'))
        {
            $data = $benihunggul;

            Mail::to($benihunggul->user->email)->send(new Mailupdate($data));
        }


        return redirect()->route('admin.benihunggul.index')->withSuccess('Data Berhasil Diubah');
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
