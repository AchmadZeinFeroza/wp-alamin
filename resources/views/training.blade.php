@extends('layout.master')
@section('content')    
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Data Training
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button class="btn-shadow btn btn-info" data-toggle="modal" data-target="#Lihat">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="pe-7s-look"> </i>
                                </span>
                                Lihat Format Excel
                            </button>
                            <button class="btn-shadow btn btn-success" data-toggle="modal" data-target="#Tambah">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="pe-7s-plus"> </i>
                                </span>
                                Tambah Data Excel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Data Training</h5>
                            <div class="table-responsive">
                                <table class="mb-0 table" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Jumlah Saldo Simpanan</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Jumlah Cicilan</th>
                                        <th>Keperluan</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->simpanan}}</td>
                                                <td>{{$item->pinjaman}}</td>
                                                <td>{{$item->cicilan}}</td>
                                                <td>{{$item->keperluan}}</td>
                                                <td>{{$item->status}}</td>
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
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahLabel">Tambah Data Training <span class="nama"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/excel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Lihat" tabindex="-1" role="dialog" aria-labelledby="LihatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LihatLabel">Format Excel<span class="nama"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="{{asset('format-excel.png')}}" alt="" class="img-fluid">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>