<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Session;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
          $ps = Barang::paginate(10);
        return view('barang.index', compact('ps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
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
            'nama_barang' => 'required|',
            'persediaan' => 'required|',
            'kondisi' => 'required|'
        ]);
        $ps = new Barang;
        $ps->nama_barang = $request->nama_barang;
        $ps->persediaan = $request->persediaan;
        $ps->kondisi = $request->kondisi;
        $ps->save();
     
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$ps->nama_barang</b>"
        ]);
        return redirect()->route('barang.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $ps = Barang::findOrFail($id);
        return view('barang.show',compact('ps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ps = Barang::findOrFail($id);
        return view('barang.edit',compact('ps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
        $this->validate($request,[
            'nama_barang' => 'required|',
            'persediaan' => 'required|',
            'kondisi' => 'required|'
        ]);
          $ps = Barang::findOrFail($id);
        $ps->nama_barang = $request->nama_barang;
        $ps->persediaan = $request->persediaan;
        $ps->kondisi = $request->kondisi;
        $ps->save();
     
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$ps->nama_barang</b>"
        ]);
        return redirect()->route('barang.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ps = Barang::findOrFail($id);
        $ps->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('barang.index');
    }
}
