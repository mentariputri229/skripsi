<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UsahaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Usaha::where('user_id', '=', Auth::id())->get();

        return view('pemohon.usaha.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemohon.usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usaha = usaha::create($request->all());

        return redirect()->route('user.usaha.index')->withSuccess('Data Berhasil Disimpan');
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
    public function edit(Usaha $usaha)
    {
        return view('pemohon.usaha.edit', compact('usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usaha $usaha)
    {
        $usaha->update($request->all());

        return redirect()->route('user.usaha.index')->withSuccess('Data Berhasil Diubah');
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
