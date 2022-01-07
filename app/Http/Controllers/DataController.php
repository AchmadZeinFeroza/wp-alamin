<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Simpanan;
use App\Pinjaman;
use App\Cicilan;
use App\Keperluan;
use App\Status;
use App\Training;
use SweetAlert;
use Algorithm\C45;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index(){
        $data = Data::get();
        return view('data', compact('data'));
    }

    public function form_tambah(){
        $nomor = self::nomor();
        $simpanan = Simpanan::get();
        $pinjaman = Pinjaman::get();
        $cicilan = Cicilan::get();
        $keperluan = Keperluan::get();
        $status = Status::get();
        return view('tambah', compact('simpanan' ,'nomor', 'pinjaman', 'cicilan', 'keperluan', 'status'));
    }

    public function form_ubah($id){
        $data = Data::find($id);
        $simpanan = Simpanan::get();
        $pinjaman = Pinjaman::get();
        $cicilan = Cicilan::get();
        $keperluan = Keperluan::get();
        $status = Status::get();
        return view('ubah', compact('simpanan' , 'pinjaman', 'cicilan', 'keperluan', 'status','data'));
    }

    public function tambah(Request $request){
        $request->validate([
            'nama' => 'required',
            'simpanan_id' => 'required',
            'pinjaman_id' => 'required',
            'cicilan_id' => 'required',
            'keperluan_id' => 'required',
            'status_id' => 'required',
        ]);
        Data::create($request->all());
        alert()->success('Data Berhasil Ditambah', 'Data');;
        return redirect()->route('data');
    }

    public function ubah(Request $request, $id){
        $data = Data::find($id);
        $data->update($request->all());
        alert()->success('Data Berhasil Diubah', 'Data');;
        return redirect()->back();
    }

    public function hapus($id){
        $data = Data::find($id);
        $data->delete();
        alert()->success('Data Berhasil Dihapus', 'Data');;
        return redirect()->back();
    }

    public function ambil_data($id){
        $data = Data::find($id);
        return response()->json($data);
    }

    public function nomor(){
        $data = Data::orderBy('id', 'DESC')->first();
        if($data === null){
            $nomor = 'TR0001';
            return $nomor;
        }else{
            $nomor = explode('TR', $data->nomor);
            $nomor = $nomor[1];
            $nomor = (int)$nomor + 1;
            $nomor = sprintf('%04d', $nomor);
            return 'TR'.$nomor;
        }
    }

    public function pohon(){
        if(file_exists(storage_path('app/public/training.xlsx'))){
            $c45 = new C45();
            $c45->loadFile('storage/training.xlsx')->setTargetAttribute('Status')->initialize();
            return view('pohon', compact('c45'));
        }else{
            $c45 = 'Data Training Kosong';
            return view('pohon', compact('c45'));
        };
    }

    public function form_prediksi(){
        $nomor = self::nomor();
        $simpanan = Simpanan::get();
        $pinjaman = Pinjaman::get();
        $cicilan = Cicilan::get();
        $keperluan = Keperluan::get();
        $status = Status::get();
        return view('prediksi', compact('simpanan' ,'nomor', 'pinjaman', 'cicilan', 'keperluan', 'status'));
    }

    public function prediksi(Request $request){
        $c45 = new C45();
        $c45->loadFile('Bismillah.xlsx')->setTargetAttribute('Status')->initialize();
        $nama = $request->nama;
        $simpanan = Simpanan::find($request->simpanan_id);
        $pinjaman = Pinjaman::find($request->pinjaman_id);
        $cicilan = Cicilan::find($request->cicilan_id);
        $keperluan = Keperluan::find($request->keperluan_id);
        $data_baru = array(
            'Jumlah Saldo Simpanan' => $simpanan->nama,
            'Jumlah Pinjaman' => $pinjaman->nama,
            'Jumlah Cicilan' => $cicilan->nama.' Bulan',
            'Keperluan' => $keperluan->nama
        );
        $prediksi = $c45->initialize()->buildTree()->classify($data_baru);
        $status = Status::where('nama', $prediksi)->get('id');
        return view('hasil', compact('data_baru', 'prediksi','nama', 'request', 'status'));
    }

    public function training()
    {
        $data = Training::get();
        return view('training', compact('data'));
    }

    public function excel(Request $request){
        if(file_exists(storage_path('app/public/training.xlsx'))){
            Training::truncate();
            unlink(storage_path('app/public/training.xlsx'));
        };
        $request->file('file')->storeAs('', 'training.xlsx', 'public');
        Excel::import(new DataImport, $request->file('file'));
        return back();
    }
}
