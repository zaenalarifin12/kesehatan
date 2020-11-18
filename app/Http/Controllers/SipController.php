<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->level == "pendaftar"){
            $sip = DB::select("
                SELECT sip.*, surat_rekomendasi.no_rekomendasi, daftar_praktik.id AS id_daftar
                FROM sip
                INNER JOIN surat_rekomendasi 
                    ON sip.rekomendasi_id = surat_rekomendasi.id
                INNER JOIN daftar_praktik ON surat_rekomendasi.daftar_id = daftar_praktik.id
                WHERE daftar_praktik.user_id = ?
            ", [auth()->user()->id]);

        }else{
            $sip = DB::select("
                SELECT sip.*, surat_rekomendasi.no_rekomendasi, daftar_praktik.id AS id_daftar
                FROM sip
                INNER JOIN surat_rekomendasi 
                    ON sip.rekomendasi_id = surat_rekomendasi.id
                INNER JOIN daftar_praktik ON surat_rekomendasi.daftar_id = daftar_praktik.id
            ");
        }

        return view("sip.index", ["sip" => $sip]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekomendasi = DB::select("SELECT * FROm surat_rekomendasi");

        return view("sip.create", compact("rekomendasi"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert("INSERT INTO sip 
        (
            nomor_sip,
            nama,
            ttl,
            alamat_rumah,
            nama_tempat_praktik,
            alamat_praktik,
            masa_berlaku_dari,
            masa_berlaku_sampai,
            untuk_praktik,
            rekomendasi_id
        ) VALUES
        (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?,
        ?
        )
        ", [
            $request->nomor_sip,
            $request->nama,
            $request->ttl,
            $request->alamat_rumah,
            $request->nama_tempat_praktik,
            $request->alamat_praktik,
            $request->masa_berlaku_dari,
            $request->masa_berlaku_sampai,
            $request->untuk_praktik,
            $request->rekomendasi_id
        ]);

        return redirect("/sip");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sip = DB::select("SELECT * FROM sip WHERE id = ?", [$id]);

        return view("sip.edit", compact("sip"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::update("UPDATE sip SET 
            nomor_sip = ?,
            nama = ?,
            ttl = ?,
            alamat_rumah = ?,
            nama_tempat_praktik = ?,
            alamat_praktik = ?,
            masa_berlaku_dari = ?,
            masa_berlaku_sampai = ?,
            untuk_praktik = ?
        WHERE id  = ?
        ", [
            $request->nomor_sip,
            $request->nama,
            $request->ttl,
            $request->alamat_rumah,
            $request->nama_tempat_praktik,
            $request->alamat_praktik,
            $request->masa_berlaku_dari,
            $request->masa_berlaku_sampai,
            $request->untuk_praktik,
            $id
        ]);

        return redirect("/sip");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM sip WHERE id = ?", [$id]);

        return redirect("/sip");
    }

    public function accKabid($id)
    {
        DB::update("UPDATE sip SET status = 1 WHERE id = ?", [$id]);
        return redirect("/sip");
    }

    public function accKepala($id)
    {   
        DB::update("UPDATE sip SET status = 2 WHERE id = ?", [$id]);
        return redirect("/sip");
    }

    public function cetak($id)
    {
        
        $data = DB::select("
            SELECT sip.*, pemberkasan.rapi, surat_rekomendasi.no_rekomendasi , daftar_praktik.id AS daftar_id
            FROM sip 
                INNER JOIN surat_rekomendasi ON sip.rekomendasi_id = surat_rekomendasi.id 
                INNER JOIN daftar_praktik ON surat_rekomendasi.daftar_id = daftar_praktik.id 
                INNER JOIN pemberkasan ON pemberkasan.daftar_id = daftar_praktik.id 
            WHERE sip.id = ?
        ", [$id]);
        
        $pdf = PDF::loadView('sip.cetak', compact("data"));
        return $pdf->stream('sip.pdf');
    }
}
