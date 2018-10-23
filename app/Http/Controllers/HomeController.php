<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:lihat-statistik');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataNOA = DB::table('masters')
            ->select('NamaUnit')
            ->groupBy('NamaUnit')
            ->orderBy('NamaUnit')
            ->get()->toArray();
        // print_r(Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString());
        $dataNOA2 = DB::table('masters')->select(DB::raw('count(NO_REKENING) as norek'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();

        return view('home')
            ->with('chartLabel', json_encode(array_column($dataNOA, 'NamaUnit'), JSON_NUMERIC_CHECK))
            ->with('chartData', json_encode(array_column($dataNOA2, 'norek'), JSON_NUMERIC_CHECK))
            ->with('OSData', json_encode(array_column($this->statistikos(), 'jumlahOS'), JSON_NUMERIC_CHECK))
            ->with('OSLancar', json_encode(array_column($this->statistikLancar(), 'jumlahLancar'), JSON_NUMERIC_CHECK));
    }
    public function statistikos()
    {
        return DB::table('masters')->select(DB::raw('sum(OS_Pokok) as jumlahOS'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();
    }

    public function statistikLancar()
    {
        return DB::table('masters')->select(DB::raw('sum(OS_Pokok) as jumlahLancar'))->where(DB::raw(' kolektibilitas = "L"'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();
    }

    public function statistikOSNominatif()
    {
        return DB::select("SELECT NamaUnit,sum(Jml_Pinjaman) FROM 
        `masters` WHERE TglRealisasi BETWEEN 
        " . "'" . Carbon::now()->startofMonth()->subMonth()->toDateString() . "'" . " 
        and " . "'" . Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString() . "'" . " GROUP by NamaUnit");
    }

    public function masuk()
    {
        Redirect('/login');
    }
}
