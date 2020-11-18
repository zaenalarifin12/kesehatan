<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemberkasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == "pendaftar") {
            $pemberkasan = DB::select(" SELECT * FROM pemberkasan 
            INNER JOIN daftar_praktik
                ON pemberkasan.daftar_id = daftar_praktik.id    
            WHERE daftar_praktik.user_id = ?
            ", [auth()->user()->id]);
        } else {
            $pemberkasan = DB::select(" SELECT * FROM pemberkasan ");
        }

        return view("pemberkasan.index", ["pemberkasan" => $pemberkasan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pendaftaran = DB::select("SELECT * FROM daftar_praktik WHERE user_id = ?",[auth()->user()->id]);
        
        return view("pemberkasan.create", ["pendaftaran" => $pendaftaran]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $namerapi                               = "rapi" . time().".jpg";
        $nameijazah                             = "ijazah" . time().".jpg";
        $namektp                                = "ktp" . time().".jpg";
        $namestr_dilegalisir_kki                = "str_dilegalisir_kki" . time().".jpg";
        $namesurat_pernyataan_tempat_praktik    = "surat_pernyataan_tempat_praktik" . time().".jpg";
        $namesurat_persetujuan_dari_atasan      = "surat_persetujuan_dari_atasan" . time().".jpg";
        $namesertifikat_bpjs                    = "sertifikat_bpjs" . time().".jpg";
        $namesip                                = null;
        
        $request->file("rapi")                              ->storeAs("public/berkas" , $namerapi);
        $request->file("ijazah")                            ->storeAs("public/berkas" , $nameijazah);
        $request->file("ktp")                               ->storeAs("public/berkas" , $namektp);
        $request->file("str_dilegalisir_kki")               ->storeAs("public/berkas" , $namestr_dilegalisir_kki);
        $request->file("surat_pernyataan_tempat_praktik")   ->storeAs("public/berkas" , $namesurat_pernyataan_tempat_praktik);
        $request->file("surat_persetujuan_dari_atasan")     ->storeAs("public/berkas" , $namesurat_persetujuan_dari_atasan);
        $request->file("sertifikat_bpjs")                   ->storeAs("public/berkas" , $namesertifikat_bpjs);
        if($request->file("sip") != null){
            $namesip                                = "sip" . time().".jpg";
            $request->file("sip")                               ->storeAs("public/berkas" , $namesip);
        }

        DB::insert("INSERT INTO pemberkasan (
            rapi,
            ijazah,
            ktp,
            str_dilegalisir_kki,
            surat_pernyataan_tempat_praktik,
            surat_persetujuan_dari_atasan,
            sertifikat_bpjs,
            sip,
            daftar_id
        ) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )", [
            $namerapi,
            $nameijazah,
            $namektp,
            $namestr_dilegalisir_kki,
            $namesurat_pernyataan_tempat_praktik,
            $namesurat_persetujuan_dari_atasan,
            $namesertifikat_bpjs,
            $namesip,
            $request->daftar_id
        ]);

        return redirect("/pemberkasan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemberkasan = DB::select("
        SELECT * FROM pemberkasan WHERE id = ? 
        ", [$id]);

        return view("pemberkasan.show", compact("pemberkasan"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemberkasan = DB::select("
        SELECT * FROM pemberkasan WHERE id = ? 
        ", [$id]);

        return view("pemberkasan.edit", compact("pemberkasan"));
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
        $berkas = DB::select("SELECT * FROM pemberkasan WHERE id = $id");

        $namerapi                               = $berkas[0]->rapi;
        $nameijazah                             = $berkas[0]->ijazah;
        $namektp                                = $berkas[0]->ktp;
        $namestr_dilegalisir_kki                = $berkas[0]->str_dilegalisir_kki;
        $namesurat_pernyataan_tempat_praktik    = $berkas[0]->surat_pernyataan_tempat_praktik;
        $namesurat_persetujuan_dari_atasan      = $berkas[0]->surat_persetujuan_dari_atasan;
        $namesertifikat_bpjs                    = $berkas[0]->sertifikat_bpjs;
        $namesip                                = $berkas[0]->sip;
        
        if ($request->file("rapi") != null) {
            $namerapi = "namerapi" . time().".jpg";
            $request->file("rapi")->storeAs("public/berkas" , $namerapi);
        }
        if ($request->file("ijazah") != null) {
            $nameijazah = "nameijazah" . time().".jpg";
            $request->file("ijazah")->storeAs("public/berkas" , $nameijazah);
        }
        if ($request->file("ktp") != null) {
            $namektp = "namektp" . time().".jpg";
            $request->file("ktp")->storeAs("public/berkas" , $namektp);
        }
        if ($request->file("str_dilegalisir_kki") != null) {
            $namestr_dilegalisir_kki = "namestr_dilegalisir_kki" . time().".jpg";
            $request->file("str_dilegalisir_kki")->storeAs("public/berkas" , $namestr_dilegalisir_kki);
        }
        if ($request->file("surat_pernyataan_tempat_praktik") != null) {
            $namesurat_pernyataan_tempat_praktik = "namesurat_pernyataan_tempat_praktik" . time().".jpg";
            $request->file("surat_pernyataan_tempat_praktik")->storeAs("public/berkas" , $namesurat_pernyataan_tempat_praktik);
        }
        if ($request->file("surat_persetujuan_dari_atasan") != null) {
            $namesurat_persetujuan_dari_atasan = "namesurat_persetujuan_dari_atasan" . time().".jpg";
            $request->file("surat_persetujuan_dari_atasan")->storeAs("public/berkas" , $namesurat_persetujuan_dari_atasan);
        }
        if ($request->file("sertifikat_bpjs") != null) {
            $namesertifikat_bpjs = "namesertifikat_bpjs" . time().".jpg";
            $request->file("sertifikat_bpjs")->storeAs("public/berkas" , $namesertifikat_bpjs);
        }
        if($request->file("sip") != null){
            $namesip = "sip" . time().".jpg";
            $request->file("sip")->storeAs("public/berkas" , $namesip);
        }
        DB::update("UPDATE pemberkasan SET  
            rapi = ?,
            ijazah = ?,
            ktp = ?,
            str_dilegalisir_kki = ?,
            surat_pernyataan_tempat_praktik = ?,
            surat_persetujuan_dari_atasan = ?,
            sertifikat_bpjs = ?,
            sip = ?
            WHERE id = ?", [
            $namerapi,
            $nameijazah,
            $namektp,
            $namestr_dilegalisir_kki,
            $namesurat_pernyataan_tempat_praktik,
            $namesurat_persetujuan_dari_atasan,
            $namesertifikat_bpjs,
            $namesip,
            $id
        ]);

        return redirect("/pemberkasan/".$berkas[0]->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM pemberkasan WHERE id = ?", [$id]);

        return redirect("/pemberkasan");
    }
}
