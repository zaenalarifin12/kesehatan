<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SuratRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->level == "pendaftar"){
            $rekomendasi = 
            DB::select("SELECT surat_rekomendasi.*, daftar_praktik.user_id FROM surat_rekomendasi
            INNER JOIN daftar_praktik 
            ON surat_rekomendasi.daftar_id = daftar_praktik.id
                WHERE daftar_praktik.user_id = ?
                ", [auth()->user()->id]);
        }else{
            $rekomendasi = 
            DB::select("SELECT surat_rekomendasi.*, daftar_praktik.user_id FROM surat_rekomendasi
            INNER JOIN daftar_praktik 
            ON surat_rekomendasi.daftar_id = daftar_praktik.id");
        }
        return view("rekomendasi.index", ["rekomendasi" => 
            $rekomendasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->level == "pendaftar"){
            $daftar = DB::select("SELECT * FROM daftar_praktik
            WHERE user_id = ?
            ", [auth()->user()->id]);
        }else{
            $daftar = DB::select("SELECT * FROM daftar_praktik");
        }
        return view("rekomendasi.create", 
        ["daftar" => $daftar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert("
        INSERT INTO surat_rekomendasi
        (no_rekomendasi,
        nama,
        jabatan,
        ttl,
        alamat_praktik,
        daftar_id)
        VALUES
        (
        ?,
        ?,
        ?,
        ?,
        ?,
        ?)
        ", [
            $request->no_rekomendasi,
            $request->nama,
            $request->jabatan,
            $request->ttl,
            $request->alamat_praktik,
            $request->daftar_id,
        ]);

        return redirect("/rekomendasi");
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
        $rekomendasi = DB::select("SELECT * FROM surat_rekomendasi WHERE id = $id");

        return view("rekomendasi.edit", compact("rekomendasi"));

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
        DB::update("
        UPDATE surat_rekomendasi SET
        no_rekomendasi = ?,
        nama = ?,
        jabatan = ?,
        ttl = ?,
        alamat_praktik = ?
        WHERE id = ?
        ", [
            $request->no_rekomendasi,
            $request->nama,
            $request->jabatan,
            $request->ttl,
            $request->alamat_praktik,
            $id
        ]);

        return redirect("/rekomendasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM surat_rekomendasi WHERE id = ?", [$id]);

        return redirect("/rekomendasi");
    }

    public function accKabid($id)
    {
        
        DB::update("UPDATE surat_rekomendasi SET status = 1 WHERE id = ?", [$id]);

        return redirect("/rekomendasi");
    }

    public function accKepala($id)
    {
        
        DB::update("UPDATE surat_rekomendasi SET status = 2 WHERE id = ?", [$id]);

        return redirect("/rekomendasi");
    }

    public function cetak($id)
    {
        $data = DB::select("
            SELECT surat_rekomendasi.*, pemberkasan.rapi 
                FROM surat_rekomendasi
                INNER JOIN daftar_praktik 
                    ON surat_rekomendasi.daftar_id = daftar_praktik.id 
                INNER JOIN pemberkasan 
                    ON pemberkasan.daftar_id = daftar_praktik.id 
            WHERE surat_rekomendasi.id = ?
        ", [$id]);

        $pdf = PDF::loadView('rekomendasi.cetak', compact("data"));
        return $pdf->stream('rekomendasi.pdf');
    }



    public function getapi($id)
    {
        $daftar = DB::select("SELECT * FROM daftar_praktik WHERE id = $id");

        return response()->json($daftar);
    }

}
