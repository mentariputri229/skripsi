<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\User;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Usaha::all();

        return view('admin.usaha.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::whereRole('0')->get();

        return view('admin.usaha.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usaha = usaha::create($request->all());

        // comment this code if foto not used
        $usaha_id = $usaha->id;
        $setuuid = Usaha::findOrFail($usaha_id);
        if($request->photo != null)
        {
            $img = $request->file('photo');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $usaha_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/fotousaha', $foto);
            $setuuid->photo       = $foto;
        }else{
            $setuuid->photo       = $setuuid->photo;
        }
        $setuuid->update();
        return redirect()->route('admin.usaha.index')->withSuccess('Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usaha $usaha)
    {
        $data = User::whereRole('0')->get();

        return view('admin.usaha.edit', compact('usaha', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usaha $usaha)
    {
        $usaha->update($request->all());

        // comment this code if foto not used
        $usaha_id = $usaha->id;
        $setuuid = Usaha::findOrFail($usaha_id);
        if($request->photo != null)
        {
            $img = $request->file('photo');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $usaha_id;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/fotousaha', $foto);
            $setuuid->photo       = $foto;
        }else{
            $setuuid->photo       = $setuuid->photo;
        }
        $setuuid->update();
        return redirect()->route('admin.usaha.index')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usaha $usaha)
    {
        try {
            $usaha->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
