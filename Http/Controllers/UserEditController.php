<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('id', '=', Auth::id())->get();

        return view('pemohon.user.index', compact('data'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Request $req)
    {
        return view('pemohon.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, User $user)
    {
        $input = $req->except('password', 'foto');

        if ($req->password) {
            $input['password'] = Hash::make($req->password);
        }
        if ($req->foto) {
            $name = $req->file('foto')->getClientOriginalName();

            $req->file('foto')->store('public/user');
            $input['foto'] = $name;
        }

        $user->update($input);
        return redirect()->route('user.user.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            // return notify()->warning($exception->getMessage());
            return back()->withWarning($exception->getMessage());
        }
    }
}
