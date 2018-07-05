<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Session;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        return view('pengantin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pengantin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nis' => 'required|',
            'jurusan' => 'required|',
            'no_hp' => 'required|',
            'alamat' => 'required'
        ]);
        $p = new Member;
        $p->nama = $request->nama;
        $p->nis = $request->nis;
        $p->jurusan = $request->jurusan;
        $p->no_hp = $request->no_hp;
        $p->alamat = $request->alamat;
        $p->save();
     
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama</b>"
        ]);
        return redirect()->route('MEMBER.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $p = Member::findOrFail($id);
        return view('MEMBER.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $p = Member::findOrFail($id);
        return view('MEMBER.edit',compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'nis' => 'required|',
            'jurusan' => 'required|',
            'no_hp' => 'required|',
            'alamat' => 'required'
        ]);
         $p = Member::findOrFail($id);
        $p->nama = $request->nama;
        $p->nis = $request->nis;
        $p->jurusan = $request->jurusan;
        $p->no_hp = $request->no_hp;
        $p->alamat = $request->alamat;
        $p->save();
     
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama</b>"
        ]);
        return redirect()->route('MEMBER.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
        $p = Member::findOrFail($id);
        $p->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('MEMBER.index');
    }
}