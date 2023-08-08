<?php

namespace App\Http\Controllers;

use App\Mail\Mailupdate;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Auth;
use App\Models\VarietasLokal;
use App\Models\Produsen;
use App\Models\Usaha;
use Illuminate\Http\Request;

class VarietasLokalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VarietasLokal::all();

        return view('admin.varietaslokal.index', compact('data'));
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
    public function show(VarietasLokal $varietaslokal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VarietasLokal $varietaslokal)
    {
        $varietaslokal_id = $varietaslokal->user_id;

        $data = Produsen::where('user_id', '=', $varietaslokal_id)->get();
        $usaha = Usaha::where('user_id', '=', $varietaslokal_id)->get();

        return view('admin.varietaslokal.edit', compact('varietaslokal','data','usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VarietasLokal $varietaslokal)
    {
        $i = array($request->sarana);
        $varietaslokal->update($request->all() + [
            'sarana' => json_encode($i),
        ]);

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

        if($varietaslokal->wasChanged('status'))
        {
            $data = $varietaslokal;

            Mail::to($varietaslokal->user->email)->send(new Mailupdate($data));
        }
        return redirect()->route('admin.varietaslokal.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VarietasLokal $varietaslokal)
    {
        try {
            $varietaslokal->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
