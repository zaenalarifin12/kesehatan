======== CARA MENJALANKAN PERTAMA KALI ============
edit di .env
    DB_DATABASE=db_201753080_pkl
    DB_USERNAME=root
    DB_PASSWORD=

buka terminal di folder projek
    hapus folder " public/* storage *" 
    jalankan * php storage:link *
    







================= SKIP DULU ======================
TASK BELUM SELESAI
    PENDAFTARAN EDIT

    
TABLE
    users
        id
        email
        username
        password
        level
            pendaftar
            kasi SDK
            kabid
            kepala dinas
    
    daftar_praktik_lama
        nama
        jenis kelamin
        ttl
        agama
        alamat rumah
        no telepon
        alamat praktik
        alamat_kantor
        email
        pendidikan terakhir
        universitas
        no_surat rekomendasi lama
        no sip lama
        sip ke

    pemberkasan
        foto rapi
        foto ijazah
        foto ktp
        foto STR dilegalisir KKI
        foto surat pernyataan tempat praktik
        foto surat persetujuan dari atasan
        foto sertifikat bpjs
        foto SIP [jika sudah mengajukan sip harus di isi] [boleh kosong]
        id_daftar

    surat rekomendasi
        foto
        no_rekomendasi
        id pendaftaran
        nama
        jabatan
        alamat praktik
        id_daftar

    SIP
        id
        foto
        nomer sip
        id pendaftaran
        nama
        ttl
        alamat rumah
        nama tempat praktik
        masa berlaku
        no rekomendasi
        untuk praktik
        id_pendaftaran


// halaman
login 
register
home
    menu
        users
        pendaftaran [baru|lama]
            -> datatable pendaftaran -> crud pendaftaran
        berkas
            -> datatable pendaftaran -> crud pendaftaran
        surat rekomendasi
            -> datatable pendaftaran -> crud pendaftaran -> cetak[rekomendasi|pendaftaran] -> acc/hapus
        surat sip
            -> datatable pendaftaran -> crud pendaftaran -> cetak[sip|rekomendasi|pendaftaran] -> acc/hapus
        laporan
            -> datatable pendaftaran -> crud pendaftaran