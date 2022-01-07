@extends('layout.master')
@section('content')    
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Hasil Prediksi
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{url('/form-prediksi')}}" type="button" class="btn-shadow btn btn-info">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="col-lg-12 mx-auto">
                            <div class="card-header ">Prediksi Data</div>
                            <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jumlah Saldo Simpanan</th>
                                                <th>Jumlah Pinjaman</th>
                                                <th>Jumlah Cicilan</th>
                                                <th>Keperluan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$nama}}</td>
                                                <td>{{$data_baru['Jumlah Saldo Simpanan']}}</td>
                                                <td>{{$data_baru['Jumlah Pinjaman']}}</td>
                                                <td>{{$data_baru['Jumlah Cicilan']}}</td>
                                                <td>{{$data_baru['Keperluan']}}</td>
                                                <td>{{$prediksi}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="position-relative row form-check float-right my-3">
                                        <form action="{{url('/tambah')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nomor" value="{{$request->nomor}}">
                                            <input type="hidden" name="nama" value="{{$request->nama}}">
                                            <input type="hidden" name="simpanan_id" value="{{$request->simpanan_id}}">
                                            <input type="hidden" name="pinjaman_id" value="{{$request->pinjaman_id}}">
                                            <input type="hidden" name="keperluan_id" value="{{$request->keperluan_id}}">
                                            <input type="hidden" name="cicilan_id" value="{{$request->cicilan_id}}">
                                            <input type="hidden" name="status_id" value="{{$status[0]->id}}">
                                            <button class="btn btn-success">Simpan</button>
                                            <a href="{{url('/form-prediksi')}}" class="btn btn-danger">Batal</a>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner">
                    <div class="app-footer-right">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Koperasi Al Amin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection