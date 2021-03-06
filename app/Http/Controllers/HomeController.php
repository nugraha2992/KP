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
        $dataNOA2 = DB::table('masters')->select(DB::raw('count(NO_REKENING) as norek'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();

        return view('home')
            ->with('chartLabel', json_encode(array_column($dataNOA, 'NamaUnit'), JSON_NUMERIC_CHECK))
            ->with('chartData', json_encode(array_column($dataNOA2, 'norek'), JSON_NUMERIC_CHECK))
            ->with('OSData', json_encode(array_column($this->statistikos(), 'jumlahOS'), JSON_NUMERIC_CHECK))
            ->with('NOMData', json_encode(array_column($this->statistiknom(), 'jumlahNOM'), JSON_NUMERIC_CHECK))
            ->with('OSLancar', json_encode(array_column($this->statistikLancar(), 'jumlahLancar'), JSON_NUMERIC_CHECK))
            ->with('statistikOSNominatif', array_column($this->statistikOSNominatif(), 'jumlah'), JSON_NUMERIC_CHECK)
            ->with('statistikOSPAR', array_column($this->statistikOSPAR(), 'jumlah'))
            ->with('statistikOSPARNominatif', json_encode(array_column($this->statistikOSPARNominatif(), 'jumlah'), JSON_NUMERIC_CHECK))
            ->with('statistikOSNPLLengkap', array_column($this->statistikOSNPLlengkap(), 'jumlah'))
            ->with('statistikOSKOLLengkap', array_column($this->statistikOSNPLlengkap(), 'jumlah'))
            ->with('statistikOSNPL', array_column($this->statistikOSNPL(), 'jumlah'))
            ->with('statistikOSKOL', array_column($this->statistikOSKOL(), 'jumlah'), JSON_NUMERIC_CHECK)
            ->with('statistikOSKOLNormatif', array_column($this->statistikOSKOLNormatif(), 'jumlah'))
            ->with('statistikOSNPLNominatif', array_column($this->statistikOSNPLNominatif(), 'jumlah'), JSON_NUMERIC_CHECK);
    }
    public function statistiknom()
    {
        return DB::table('masters')->select(DB::raw('sum(Jml_Pinjaman) as jumlahNOM'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();
    }

    // public function eksport()
    // {
    //     $dataNOA = DB::table('masters')
    //         ->select('NamaUnit')
    //         ->groupBy('NamaUnit')
    //         ->orderBy('NamaUnit')
    //         ->get()->toArray();
    //     $dataNOA2 = DB::table('masters')->select(DB::raw('count(NO_REKENING) as norek'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();
    //     $dataTotal = (object)array(
    //         'NamaUnit' => array_column($dataNOA, 'NamaUnit'),
    //         'NOA' => array_column($dataNOA2, 'norek'),
    //         'OS' => array_column($this->statistikos(), 'jumlahOS'),
    //         'Lancar' => array_column($this->statistikLancar(), 'jumlahLancar'),
    //         'OSb' => array_column($this->statistikOSNominatif(), 'jumlah'),
    //         'Par' => array_column($this->statistikOSPAR(), 'jumlah'),
    //         'Parb' => array_column($this->statistikOSPARNominatif(), 'jumlah'),
    //         'NPL' => array_column($this->statistikOSNPLlengkap(), 'jumlah'),
    //         'OSNPL' => array_column($this->statistikOSNPL(), 'jumlah'),
    //         'KOL' => array_column($this->statistikOSKOL(), 'jumlah'),
    //         'KOLb' => array_column($this->statistikOSKOLNormatif(), 'jumlah'),
    //         'NPLb' => array_column($this->statistikOSNPLNominatif(), 'jumlah'),
    //         'KOLL' => array_column($this->statistikOSNPLlengkap(), 'jumlah')
    //     );
    //     // print_r($dataTotal);
    //     return view('eksport', compact($dataTotal))
    //         ->with('i', 1);
    // }
    public function statistikos()
    {
        return DB::table('masters')->select(DB::raw('sum(OS_Pokok) as jumlahOS'))->groupBy('NamaUnit')->orderBy('NamaUnit')->get()->toArray();
    }

    public function statistikLancar()
    {
        return DB::select('SELECT sum(OS_Pokok) as jumlahLancar FROM `masters` WHERE kolektibilitas = "L" GROUP by NamaUnit ORDER BY NamaUnit');
    }

    public function statistikOSNominatif()
    {
        return DB::select("SELECT NamaUnit,sum(Jml_Pinjaman) as jumlah FROM 
        `masters` WHERE TglRealisasi BETWEEN 
        " . "'" . Carbon::now()->startofMonth()->subMonth()->toDateString() . "'" . " 
        and " . "'" . Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString() . "'" . " GROUP by NamaUnit order by NamaUnit");
    }

    public function statistikOSPARNominatif()
    {
        return DB::select("SELECT NamaUnit,sum(OS_Pokok) as jumlah FROM 
        `masters` WHERE TglRealisasi BETWEEN 
        " . "'" . Carbon::now()->startofMonth()->subMonth()->toDateString() . "'" . " 
        and " . "'" . Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString() . "'" . " 
        and (FT_Pokok <> 0 and FT_Bunga <> 0)   GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSNPLNominatif()
    {
        return DB::select("SELECT sum(OS_Pokok) as jumlah FROM 
            `masters` WHERE TglRealisasi BETWEEN 
            " . "'" . Carbon::now()->startofMonth()->subMonth()->toDateString() . "'" . " 
            and " . "'" . Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString() . "'" . "
             and (kolektibilitas='KL' or kolektibilitas='M' or kolektibilitas='D' or kolektibilitas='L')   GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSPAR()
    {
        return DB::select("SELECT  sum(OS_Pokok) as jumlah from masters 
        WHERE FT_Pokok <> 0 and FT_Bunga <> 0 GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSNPL()
    {
        return
            DB::select("SELECT sum(OS_Pokok) as jumlah FROM 
            `masters` WHERE TglRealisasi BETWEEN 
            " . "'" . Carbon::now()->startofMonth()->toDateString() . "'" . " 
            and " . "'" . Carbon::now()->startofMonth()->endOfMonth()->toDateString() . "'" . "
            and (kolektibilitas='KL' or kolektibilitas='M' or kolektibilitas='D' or kolektibilitas='L')   
            GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSNPLlengkap()
    {
        return
            DB::select("SELECT sum(OS_Pokok) as jumlah FROM 
            `masters` WHERE (kolektibilitas='KL' or kolektibilitas='M' or kolektibilitas='D' or kolektibilitas='L')   
            GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSKOL()
    {
        return DB::select("SELECT sum(OS_Pokok) as jumlah FROM 
            `masters` WHERE (kolektibilitas='PK') and
            TglRealisasi BETWEEN 
            " . "'" . Carbon::now()->startofMonth()->toDateString() . "'" . " 
            and " . "'" . Carbon::now()->startofMonth()->endOfMonth()->toDateString() . "'" . "    
            GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSKOLLengkap()
    {
        return DB::select("SELECT sum(OS_Pokok) as jumlah FROM 
            `masters` WHERE (kolektibilitas='PK')    
            GROUP by NamaUnit order by NamaUnit");
    }
    public function statistikOSKOLNormatif()
    {
        return DB::select("SELECT sum(OS_Pokok) as jumlah FROM `masters` WHERE (kolektibilitas='PK') and
         TglRealisasi BETWEEN 
            " . "'" . Carbon::now()->startofMonth()->subMonth()->toDateString() . "'" . " 
            and " . "'" . Carbon::now()->startofMonth()->subMonth()->endOfMonth()->toDateString() . "'" . "
        GROUP by NamaUnit order by NamaUnit");
    }

    public function masuk()
    {
        Redirect('/login');
    }
}
