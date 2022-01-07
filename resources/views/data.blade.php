@extends('layout.master')
@section('content')    
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Data
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <a href="{{url('/form_tambah')}}" class="btn-shadow btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="pe-7s-plus"> </i>
                                </span>
                                Tambah Data 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Data Training</h5>
                            <div class="table-responsive">
                                <table class="mb-0 table" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Jumlah Saldo Simpanan</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Jumlah Cicilan</th>
                                        <th>Keperluan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->nomor}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->simpanan->nama}}</td>
                                                <td>{{$item->pinjaman->nama}}</td>
                                                <td>{{$item->cicilan->nama}} Bulan</td>
                                                <td>{{$item->keperluan->nama}}</td>
                                                <td>{{$item->status->nama}}</td>
                                                <td>
                                                    <div class="btn-group ">
                                                        <a href="{{url('ubah/'. $item->id)}}" class="btn btn-xs btn-warning text-white"><i class="pe-7s-pen"> </i></a>
                                                        <button type="button"  class="btn btn-xs btn-danger text-white hapus"  data-toggle="modal" data-target="#HapusData" data-id="{{$item->id}}"><i class="pe-7s-trash"> </i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

{{-- modal --}}

@endsection
@section('script')
    <script>
        $('.hapus').click(function(){
            var id = $(this).data('id');
            var url = "{{url('/ambil-data')}}" + '/' + id;
            var urlhapus = "{{url('/hapus')}}" + '/' + id;

            $('#form-hapus').attr('action', urlhapus);

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: url,
                data: { '_token': $('input[name=_token]').val() },
                success: function (data) {
                $('.nama').html(data.nama);
                }
            }).done(function (data) {
                console.log('suksess');
            });
        });
    </script>
@endsection
<!-- Modal -->
<div class="modal fade" id="HapusData" tabindex="-1" role="dialog" aria-labelledby="HapusDataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="HapusDataLabel">Hapus Data <span class="nama"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form-hapus" method="POST">
            @csrf @method('DELETE')
            Apakah Anda Yakin Ingin Menghapus <span class="nama"></span>
            <input type="hidden" name="id" id="data-id">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>