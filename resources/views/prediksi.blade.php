@extends('layout.master')
@section('content')    
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-science icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Prediksi
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{url('/')}}" type="button" class="btn-shadow btn btn-info">
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
                                <form action="{{url('/prediksi')}}" method="GET">
                                    <div class="position-relative row form-group">
                                        <label for="nomor" class="col-sm-4 col-form-label text-md-right text-sm-left">Nomor</label>
                                        <div class="col-sm-6"><input name="nomor" id="nomor" type="name" class="form-control" value="{{$nomor}}" readonly></div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="nama" class="col-sm-4 col-form-label text-md-right text-sm-left">Nama</label>
                                        <div class="col-sm-6"><input name="nama" id="nama" placeholder="Masukkan Nama Pemohon" type="nama" class="form-control" required></div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="simpanan" class="col-sm-4 col-form-label text-md-right text-sm-left">Jumlah Saldo Simpanan</label>
                                        <div class="col-sm-6">
                                            <select name="simpanan_id" id="simpanan" class="form-control" required>
                                                <option> Pilih Saldo Simpanan </option>
                                                @foreach ($simpanan as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="pinjaman" class="col-sm-4 col-form-label text-md-right text-sm-left">Jumlah Pinjaman</label>
                                        <div class="col-sm-6">
                                            <select name="pinjaman_id" id="pinjaman" class="form-control" required>
                                                <option> Pilih Jumlah Pinjaman </option>
                                                @foreach ($pinjaman as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="cicilan" class="col-sm-4 col-form-label text-md-right text-sm-left">Jumlah Cicilan</label>
                                        <div class="col-sm-6">
                                            <select name="cicilan_id" id="cicilan" class="form-control" required>
                                                <option> Pilih Jumlah Cicilan </option>
                                                @foreach ($cicilan as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="keperluan" class="col-sm-4 col-form-label text-md-right text-sm-left">Keperluan</label>
                                        <div class="col-sm-6">
                                            <select name="keperluan_id" id="keperluan" class="form-control" required>
                                                <option> Pilih Keperluan </option>
                                                @foreach ($keperluan as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-check mx-auto">
                                        <div class="offset-md-4 col-sm-6 text-right">
                                            <button class="btn btn-success">Prediksi</button>
                                        </div>
                                    </div>
                                </form>
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