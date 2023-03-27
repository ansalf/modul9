<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return "Berhasil di proses";
    }

    public function insertSql()
    {
        $result = DB::insert("insert into mahasiswas (nim,nama,tanggal_lahir,ipk) values ('19003036','Sari Citra Lestari','2001-12-31',3.5)"); //hasil timestamp null
        dump($result);
    }

    public function inserTimestamp()
    {
        $result = DB::insert("insert into mahasiswas (nim,nama,tanggal_lahir,ipk,created_at, update_at) values ('19003033','Rina Kumala Sari','2001-1-31',3.1,now(),now())"); //hasil ada timestamp
        dump($result);
    }

    public function insertPrepared()
    {
        $result = DB::insert("INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at) values (?,?,?,?,?,?)", ['18012012', 'James Jamet', '1999-04-02', 2.7, now(), now()]);
        dump($result);
    }

    public function insertBinding()
    {
        $result = DB::insert(
            "INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at) values(:nim,:nama,:tgl,:ipk,:created,:updated)",
            [
                'nim'=>'19005011',
                'nama'=>'Riana Putria',
                'tgl'=>'2000-11-23',
                'ipk'=>2.7,
                'created'=>now(),
                'updated'=>now(),
            ]
        );
        dump($result);
    }

    public function update(){
        $result = DB::update("UPDATE mahasiswas SET created_at = now(), updated_at = now() WHERE nim =?", ['19003036']);
        dump($result);
    }

    public function delete(){
        $result = DB:: delete("DELETE from mahasiswas where nama =?", ['James Jamet']);
        dump($result);
    }

    public function select(){
        $result = DB::select("SELECT * from mahasiswas");
        dump($result);
    }

    public function selectTampil(){
        $result = DB::select("SELECT *from mahasiswas");
        echo $result[0]->id."<br>";
        echo $result[0]->nim."<br>";
        echo $result[0]->nama."<br>";
        echo $result[0]->tanggal_lahir."<br>";
        echo $result[0]->ipk."<br>";
    }

    public function selectView(){
        $result = DB::select("SELECT *from mahasiswas");
        return view('tampil-mahasiswa',["mahasiswas"=>$result]);
    }
}
