<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Session;
use App\Barang;
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        $p = Member::all();
        return view('member.index', compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ps = Barang::all();
       return view('member.create',compact('ps'));
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
            'alamat' => 'required',
            'barang' => 'required'
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
        return redirect()->route('member.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ps = Barang::all();
          $p = Member::findOrFail($id);
        return view('member.show',compact('p','ps'));
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
        $selectedo = Member::findOrFail($id);
        $selected = $p->barang->pluck('id')->toArray();
        $ps = Barang::all();
        // dd($selected);
        return view('member.edit',compact('p','selectedo','selected','ps'));
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
            'alamat' => 'required|',
            'barang' => 'required'
        ]);
         $p = Member::findOrFail($id);
        $p->nama = $request->nama;
        $p->nis = $request->nis;
        $p->jurusan = $request->jurusan;
        $p->no_hp = $request->no_hp;
        $p->alamat = $request->alamat;
        $p->save();
         $p->barang()->sync($request->barang);
     
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama</b>"
        ]);
        return redirect()->route('member.index');

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
        return redirect()->route('member.index');
    }
}