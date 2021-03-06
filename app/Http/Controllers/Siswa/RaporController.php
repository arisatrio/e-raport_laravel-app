<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MMapelUmum;
use App\Models\MMapelJurusan;
use App\Models\MMapel;
use App\Models\KKelas;
use App\Models\RAbsensi;
use App\Models\RCatatan;
use App\Models\RNilai;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reqKelas = KKelas::with('jurusan', 'tahunAjaran', 'waliKelas', 'siswaKelas')->find($request->kelas_id);
        $mapel = MMapel::where('m_jurusan_id', auth()->user()->kelasSiswa->first()->kelas->m_jurusan_id)->orWhereNull('m_jurusan_id')->where('tingkat', $reqKelas->tingkat)->get();

        $raporAbsensi = RAbsensi::where('k_kelas_id', $reqKelas->id)->where('murid_id', auth()->user()->id)->first();
        $raporCatatan = RCatatan::where('k_kelas_id', $reqKelas->id)->where('murid_id', auth()->user()->id)->first();

        $totalNilai     = RNilai::siswaIs(auth()->user()->id, $reqKelas->id)->sum('nilai_akhir');
        $rerataNilai    = $totalNilai / $mapel->count();

        return view('_murid.rapor-show', compact('reqKelas', 'mapel', 'raporAbsensi', 'raporCatatan', 'totalNilai', 'rerataNilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
