<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        if(auth()->user()->level == "pendaftar"){
        
            if($request->type == "baru")
                $daftar_praktik = DB::select("SELECT * FROM daftar_praktik WHERE user_id = ?", [auth()->user()->id]);
            else
                $daftar_praktik = DB::select("SELECT * FROM daftar_praktik_perpanjangan WHERE user_id = ?", [auth()->user()->id]);
            
        }else{

            if($request->type == "baru")
                $daftar_praktik = DB::select("SELECT * FROM daftar_praktik");
            else
                $daftar_praktik = DB::select("SELECT * FROM daftar_praktik_perpanjangan");
            
        }
        
        return view("pendaftaran.index", ["daftar" => $daftar_praktik,
        "type"  => $request->type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->type;

        return view("pendaftaran.create", compact("type") );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->jenis == "baru") {
            $table = "daftar_praktik";
        }else{
            $table = "daftar_praktik_perpanjangan";
        }
        DB::insert("INSERT INTO " . $table . " (
            jenis,
            nama,
            jekel,
            tanggal_lahir,
            tempat_lahir,
            agama,
            alamat_rumah,
            nomor_hp,
            alamat_praktik,
            nama_tempat_praktik,
            alamat_kantor,
            email,
            pendidikan_terakhir,
            universitas,
            no_surat_rekomendasi_lama,
            no_sip_lama,
            sip_ke,
            user_id
        )  VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?   )",[
            $request->jenis,
            $request->nama,
            $request->jekel,
            $request->tanggal_lahir,
            $request->tempat_lahir,
            $request->agama,
            $request->alamat_rumah,
            $request->nomor_hp,
            $request->alamat_praktik,
            $request->nama_tempat_praktik,
            $request->alamat_kantor,
            $request->email,
            $request->pendidikan_terakhir,
            $request->universitas,
            empty($request->no_surat_rekomendasi_lama) ? null :$request->no_surat_rekomendasi_lama,
            empty($request->no_sip_lama) ? null : $request->no_sip_lama,
            empty($request->sip_ke) ? null : $request->sip_ke,
            auth()->user()->id,
        ]);

        return redirect("/pendaftaran");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->type == "baru"){
            
            $daftar = DB::select("SELECT * FROM daftar_praktik WHERE id = $id");

        } else if($request->type == "lama"){

            $daftar = DB::select("SELECT * FROM daftar_praktik_perpanjangan WHERE id = $id");

        }
        
        $berkas = DB::select("SELECT * FROM pemberkasan WHERE daftar_id = $id");

        return view("pendaftaran.show", ["daftar" => $daftar, "berkas" => $berkas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daftar = DB::select("SELECT * FROM daftar_praktik WHERE id = $id");

        return view("pendaftaran.edit", ["daftar" => $daftar]);
    }

    public function update(Request $request, $id)
    {
        DB::update("UPDATE daftar_praktik SET 
            jenis = ?,
            nama = ?,
            jekel = ?,
            tanggal_lahir = ?,
            tempat_lahir = ?,
            agama = ?,
            alamat_rumah = ?,
            nomor_hp = ?,
            alamat_praktik = ?,
            nama_tempat_praktik = ?,
            alamat_kantor = ?,
            email = ?,
            pendidikan_terakhir = ?,
            universitas = ?,
            no_surat_rekomendasi_lama = ?,
            no_sip_lama = ?,
            sip_ke = ?,
            WHERE id = ?
            ",[
            $request->jenis,
            $request->nama,
            $request->jekel,
            $request->tanggal_lahir,
            $request->tempat_lahir,
            $request->agama,
            $request->alamat_rumah,
            $request->nomor_hp,
            $request->alamat_praktik,
            $request->nama_tempat_praktik,
            $request->alamat_kantor,
            $request->email,
            $request->pendidikan_terakhir,
            $request->universitas,
            empty($request->no_surat_rekomendasi_lama) ? null :$request->no_surat_rekomendasi_lama,
            empty($request->no_sip_lama) ? null : $request->no_sip_lama,
            empty($request->sip_ke) ? null : $request->sip_ke,
            $id
        ]);

        return redirect("/pendaftaran");
    }

    public function destroy(Request $request, $id)
    {
        if ($request->type == "lama") {
            DB::delete("DELETE FROM daftar_praktik_perpanjangan WHERE id = ?", [$id]);
        }else{
            DB::delete("DELETE FROM daftar_praktik WHERE id = ?", [$id]);
        }

        return redirect("/pendaftaran?type=$request->type");
    }
}
