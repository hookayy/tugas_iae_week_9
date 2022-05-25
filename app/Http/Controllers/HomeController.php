<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Covid19;
use App\Models\Lomba;
use App\Models\TAK;
use App\Models\Beasiswa;

class HomeController extends Controller
{
    public function home()
    {
        $mahasiswa = Mahasiswa::all();
        $sehat = Covid19::where('Kondisi', 'Sehat')->get();
        $sakit = Covid19::where('Kondisi', 'Sakit')->get();
        $beasiswa = Beasiswa::all();     
        $filter_beasiswa = DB::table('penerima_beasiswa')->select('Jenis_Beasiswa', DB::raw('count(*) as total'))->groupBy('Jenis_Beasiswa')->get();
        $filter_zona = DB::table('pantauan_covid_19')->select('zona_tinggal', DB::raw('count(*) as total'))->groupBy('zona_tinggal')->get();
        $filter_lomba = DB::table('lomba')->select('nama_lomba', DB::raw('count(*) as total'))->groupBy('nama_lomba')->get();
        $mahasiswa_count = Mahasiswa::all()->count();
        $beasiswa_count = Beasiswa::all()->count();
        $sehat_count = Covid19::where('Kondisi', 'Sehat')->count();
        return view('index', compact('mahasiswa', 'sehat', 'sakit', 'beasiswa', 'filter_beasiswa', 'mahasiswa_count', 'beasiswa_count', 'sehat_count', 'filter_zona', 'filter_lomba'));
    }
    public function kesehatan()
    {
        $mahasiswa = Mahasiswa::all();
        $sehat = Covid19::where('Kondisi', 'Sehat')->get();
        $sakit = Covid19::where('Kondisi', 'Sakit')->get();
        $beasiswa = Beasiswa::all();     
        $filter_zona = DB::table('pantauan_covid_19')->select('zona_tinggal', DB::raw('count(*) as total'))->groupBy('zona_tinggal')->get();
        $gabungan1 = DB::table('pantauan_covid_19')->select('zona_tinggal', DB::raw('COUNT(CASE WHEN Kondisi = "Sakit" then 1 end) as Sakit'), DB::raw('COUNT(CASE WHEN Kondisi = "Sehat" then 1 end) as Sehat') )->groupBy('zona_tinggal')->get();
        $gabungan2 = DB::table('pantauan_covid_19')->select('Kondisi', DB::raw('COUNT(CASE WHEN zona_tinggal = "Hitam" THEN 1 END) as Hitam'), DB::raw("COUNT(CASE WHEN zona_tinggal = 'Merah' THEN 1 END) as Merah"), DB::raw("COUNT(CASE WHEN zona_tinggal = 'Orange' THEN 1 END) as Orange"), DB::raw("COUNT(CASE WHEN zona_tinggal = 'Hijau' THEN 1 END) as Hijau"))->groupBy('Kondisi')->get();
        $mahasiswa_count = Mahasiswa::all()->count();
        $beasiswa_count = Beasiswa::all()->count();
        $sehat_count = Covid19::where('Kondisi', 'Sehat')->count();
        return view('kesehatan', compact('mahasiswa','sehat', 'sakit', 'beasiswa', 'mahasiswa_count', 'beasiswa_count', 'sehat_count', 'filter_zona', 'gabungan1','gabungan2'));
    }
    public function keaktifan()
    {   
        $gabungan1 = DB::table('tak_mhs')
                        ->selectRaw('mahasiswa.NIM as NIM, mahasiswa.Nama as Nama, tak_mhs.tak')
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'tak_mhs.nim')
                        ->orderByDesc('tak_mhs.tak')
                        ->get();
        $a_16 = DB::table("lomba")
                        ->selectRaw("nama_lomba, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'lomba.NIM')
                        ->whereRaw('SUBSTRING(mahasiswa.tgl_lahir,-3,3) = "/98"')
                        ->groupBy('nama_lomba')
                        ->get();
        $a_17 = DB::table("lomba")
                        ->selectRaw("nama_lomba, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'lomba.NIM')
                        ->whereRaw('SUBSTRING(mahasiswa.tgl_lahir,-3,3) = "/99"')
                        ->groupBy('nama_lomba')
                        ->get();
        $a_18 = DB::table("lomba")
                        ->selectRaw("nama_lomba, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'lomba.NIM')
                        ->whereRaw('SUBSTRING(mahasiswa.tgl_lahir,-3,3) = "/00"')
                        ->groupBy('nama_lomba')
                        ->get();
        $a_19 = DB::table("lomba")
                        ->selectRaw("nama_lomba, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'lomba.NIM')
                        ->whereRaw('SUBSTRING(mahasiswa.tgl_lahir,-3,3) = "/01"')
                        ->groupBy('nama_lomba')
                        ->get();
        $gabungan2 = DB::table("lomba")
                        ->select("nama_lomba", DB::raw("count(*) as total"))
                        ->orderByDesc("total")
                        ->groupBy("nama_lomba")
                        ->get();
        return view('keaktifan', compact('gabungan1','a_16', 'a_17','a_18', 'a_19' ));
    }
    public function kelulusan()
    {   
        $per_smt = DB::table("telat_lulus")
                        ->select("semester", DB::raw("count(*) as total"))
                        ->groupBy("semester")
                        ->get();
        $list_mhs = DB::table("telat_lulus")
                        ->selectRaw("mahasiswa.NIM, mahasiswa.Nama, telat_lulus.Semester")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'telat_lulus.nim')
                        ->get();
        $per_ang = DB::table("telat_lulus")
                        ->selectRaw(
                            "CASE SUBSTRING(mahasiswa.tgl_lahir,-3,3)
                                when '/01' then '2019'
                                when '/00' then '2018'
                                when '/99' then '2017'
                                when '/98' then '2016' end as angkatan, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'telat_lulus.nim')
                        ->groupBy('angkatan')
                        ->get();
        return view('kelulusan', compact('per_smt', 'list_mhs', 'per_ang'));
    }
    public function registrasi()
    {   
        $per_alasan = DB::table("tunggakan_bpp")
                        ->select("alasan", DB::raw("count(*) as total"))
                        ->groupBy("alasan")
                        ->get();
        $list_mhs = DB::table("tunggakan_bpp")
                        ->selectRaw("mahasiswa.NIM, mahasiswa.Nama, tunggakan_bpp.alasan")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'tunggakan_bpp.nim')
                        ->get();
        $per_ang = DB::table("tunggakan_bpp")
                        ->selectRaw(
                            "CASE SUBSTRING(mahasiswa.nim,1,3)
                                when '160' then 'Fakultas A'
                                when '161' then 'Fakultas B'
                                when '162' then 'Fakultas D'
                                when '163' then 'Fakultas E'
                                when '164' then 'Fakultas F'
                                when '165' then 'Fakultas G'
                                when '166' then 'Fakultas H'
                                when '167' then 'Fakultas I'
                                when '168' then 'Fakultas J'
                                when '169' then 'Fakultas K' end as fakultas, count(*) as total")
                        ->leftJoin('mahasiswa', 'mahasiswa.NIM', '=', 'tunggakan_bpp.nim')
                        ->groupBy('fakultas')
                        ->get();
        return view('registrasi', compact('per_alasan', 'list_mhs', 'per_ang'));
    }
}
