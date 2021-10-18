@extends('master.index')
@section('content')

    <section class="section">
        <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Data Surat jin</h4>
                <div style="width:80%; text-align:right; margin-bottom:25px;">
                    <a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#modal-surat"><i class="fas fa-plus"></i>  Buat Surat</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Tanggal Izin</th>
                            <th>Tanggal Masuk</th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ijin as $data)
                            <tr>
                                <td>{{ $loop->iteration}} </td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ Carbon\carbon::parse($data->tglIzin)->translatedFormat("d F Y") }}</td>
                                <td>{{ Carbon\carbon::parse($data->tglMasuk)->translatedFormat("d F Y") }}</td>
                                <td>{{ $data->jenis_surat }}</td>
                                <td>
                                    <a href="{{url('/ijinKerja/'.$data->idIzins)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idIzins }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idIzins}}"><i class="fa fa-trash"></i></button>
                                    <a href="{{url('/ijinKerja/'.$data->idIzins)}}" target="_blank"  class="btn btn-warning"><i class="fas fa-eye"></i></a>
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
    </section>

    {{-- Modal tambah --}}
    <div class="modal fade" id="modal-surat">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Surat Lamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr>
                <div class="modal-body">
                    <form method="post" action="ijinKerja" enctype="multipart/form-data" id="tambahForm">
                         @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Izin</label>
                                        <input type="date" class="form-control" name="tglIzin">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tglMasuk">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Surat</label>
                                        <select class="form-control" @error('jenis_surat') is-invalid @enderror" name="jenis_surat" style="width: 100%;" required>
                                            <option value selected="selected">-- Pilih Jenis Surat --</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Perjalanan Dinas">Perjalanan Dinas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="ketIzin"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal edit --}}
    @foreach($ijin as $data)
    <div class="modal fade" id="modal-edit-{{ $data->idIzins }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Izin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form class="form-horizontal" action="{{url('/ijinKerja/'.$data->idIzins)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama',  $data->nama) }}" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip" @error('nip') is-invalid @enderror" value="{{ old('nip',  $data->nip) }}" name="nip" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" @error('jabatan') is-invalid @enderror" value="{{ old('jabatan',  $data->jabatan) }}" name="jabatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Izin</label>
                                        <input type="text" class="form-control" name="tglIzin" @error('tglIzin') is-invalid @enderror" value="{{ old('tglIzin',  $data->tglIzin) }}" name="tglIzin" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="text" class="form-control" name="tglMasuk" @error('tglMasuk') is-invalid @enderror" value="{{ old('tglMasuk',  $data->tglMasuk) }}" name="tglMasuk" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Surat</label>
                                        <select class="form-control" @error('jenis_surat') is-invalid @enderror" name="jenis_surat" style="width: 100%;" required>
                                            <option value selected="selected">-- Pilih Jenis Surat --</option>
                                            <option value="Sakit" {{ $data->Sakit == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                            <option value="Izin" {{ $data->Izin == 'Izin' ? 'selected' : '' }}>Izin</option>
                                            <option value="Perjalanan Dinas" {{ $data->PerjalananDinas == 'Perjalanan Dinas' ? 'selected' : '' }}>Perjalanan Dinas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="ketIzin" @error('ketIzin') is-invalid @enderror value="{{ old('ketIzin',  $data->ketIzin) }}"  required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- modal hapus --}}
    @foreach($ijin as $data)
    <div class="modal fade" id="modal-success-hapus-{{ $data->idIzins }}">
    <div class="modal-dialog" style="max-width: 30%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form method="post" action="{{url('/ijinKerja/'.$data->idIzins)}}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Hapus</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <script type="text/javascript">
        $(document).ready(function() {

            $('#tambahForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/ijinKerja",
                    data: $('#tambahForm').serialize(),
                    success: function (response) {
                        console.log(response)
                        $.('#modal-surat').modal('hide')
                        alert("Data Tersimpan");
                    },
                    error: function(error){
                        console.log(error)
                        alert("Data tidak tersimpan")
                    }
                });
            });
        });
     </script>
@endsection

