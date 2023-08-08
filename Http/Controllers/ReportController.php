<?php

namespace App\Http\Controllers;

use URL;
use Carbon\Carbon;
use App\Models\Usaha;
use App\Models\User;
use App\Models\Produsen;
use App\Models\PengedarUnggul;
use App\Models\PengedarLokal;
use App\Models\PengedarHortikultura;
use App\Models\VarietasLokal;
use App\Models\Hortikultura;
use App\Models\BenihUnggul;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now()->translatedFormat('d F Y');

        $this->ttdName = 'H.Zainul Arifin, SP';
    }

    public function rekomendasilokalfilter()
    {
        return view('admin.varietaslokal.filter');

    }

    public function rekomendasihortikulturafilter()
    {
        return view('admin.hortikultura.filter');

    }

    public function rekomendasiunggulfilter()
    {
        return view('admin.benihunggul.filter');

    }

    public function pengedarlokalfilter()
    {
        return view('admin.pengedarlokal.filter');

    }

    public function pengedarhortikulturafilter()
    {
        return view('admin.pengedarhortikultura.filter');

    }

    public function pengedarunggulfilter()
    {
        return view('admin.pengedarunggul.filter');

    }

    public function rekomendasilokalcetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = VarietasLokal::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthvarietaslokal', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function rekomendasihortikulturacetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = Hortikultura::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthhortikultura', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function rekomendasiunggulcetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = Benihunggul::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthbenihunggul', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function pengedarlokalcetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = PengedarLokal::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthpengedarlokal', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function pengedarhortikulturacetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = PengedarHortikultura::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthpengedarhortikultura', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function pengedarunggulcetak(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $data = Pengedarunggul::wherebetween('created_at', [$start, $end])->get();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.monthpengedarunggul', compact('data', 'now', 'ttdName', 'start', 'end'));

    }

    public function userAll()
    {
        $data = User::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.userAll', compact('data', 'now', 'ttdName'));

    }

    public function usahaAll()
    {
        $data = usaha::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.usahaAll', compact('data', 'now', 'ttdName'));

    }

    public function produsenAll()
    {
        $data = produsen::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.produsenAll', compact('data', 'now', 'ttdName'));

    }

    public function sertifikatunggul($id)
    {
        $url = URL::current();
        $data   = BenihUnggul::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.sertifikatbenihunggul', compact('data', 'now', 'ttdName', 'url'));

    }

    public function sertifikathortikultura($id)
    {
        $url = URL::current();
        $data   = hortikultura::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.sertifikathortikultura', compact('data', 'now', 'ttdName', 'url'));
    }

    public function sertifikatlokal($id)
    {
        $url = URL::current();
        $data   = varietaslokal::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.sertifikatvarietaslokal', compact('data', 'now', 'ttdName', 'url'));
    }

    public function pengedarunggul($id)
    {
        $url = URL::current();
        $data   = PengedarUnggul::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.pengedarbenihunggul', compact('data', 'now', 'ttdName', 'url'));

    }

    public function pengedarhortikultura($id)
    {
        $url = URL::current();
        $data   = PengedarHortikultura::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.pengedarhortikultura', compact('data', 'now', 'ttdName', 'url'));
    }

    public function pengedarlokal($id)
    {
        $url = URL::current();
        $data   = PengedarLokal::findOrFail($id);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('report.pengedarvarietaslokal', compact('data', 'now', 'ttdName', 'url'));
    }
}
