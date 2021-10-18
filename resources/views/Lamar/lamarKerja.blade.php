@extends('master.index')
@section('content')


    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Surat Lamaran</h4>
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
                            <th>Nama</th>
                            <th>Perusahaan Tujuan</th>
                            <th>Posisi</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lamar as $data)
                            <tr>
                                <td>{{ $loop->iteration}} </td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tujuan }}</td>
                                <td>{{ $data->posisi }}</td>
                                <td>
                                    <a href="{{url('/lamarKerja/'.$data->idLamar)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idLamar }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idLamar}}"><i class="fa fa-trash"></i></button>
                                    <a href="{{url('/lamarKerja/'.$data->idLamar)}}" target="_blank" class="btn btn-warning"><i class="fas fa-eye"></i></a></center>
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
                    <form method="post" action="lamarKerja" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempatLahir">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tglLahir">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" @error('jk') is-invalid @enderror" name="jk" style="width: 100%;" required>
                                        <option value selected="selected">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki - laki</option>
                                        <option value="Perempuan">Perempruan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select class="form-control" @error('penTerakhir') is-invalid @enderror" name="penTerakhir" style="width: 100%;" required>
                                        <option value selected="selected">-- Pilih Jenis Kelamin --</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Telp/Hp</label>
                                    <input type="text" class="form-control" name="noHp">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label>Kepada</label>
                                    <input type="text" class="form-control" name="tujuan">
                                </div>
                                <div class="form-group">
                                    <label>Posisi yang dilamar</label>
                                    <input type="text" class="form-control" name="posisi">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Pembuatan Surat</label>
                                    <input type="text" class="form-control" name="tempatPembuatan">
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
  @foreach($lamar as $data)
  <div class="modal fade" id="modal-edit-{{ $data->idLamar }}">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Edit Data </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <!-- form start -->
                  <form class="form-horizontal" action="{{url('/lamarKerja/'.$data->idLamar)}}" method="post">
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
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control  @error('tempatLahir') is-invalid @enderror" value="{{ old('tempatLahir',  $data->tempatLahir) }}" name="tempatLahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control  @error('tglLahir') is-invalid @enderror" value="{{ old('tglLahir',  $data->tglLahir) }}" name="tglLahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" @error('jk') is-invalid @enderror" name="jk" style="width: 100%;" required>
                                            <option value selected="selected">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki - laki</option>
                                            <option value="Perempuan">Perempruan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-control" @error('penTerakhir') is-invalid @enderror" name="penTerakhir" style="width: 100%;" required>
                                            <option value selected="selected">-- Pilih Jenis Kelamin --</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Telp/Hp</label>
                                        <input type="text" class="form-control  @error('noHp') is-invalid @enderror" value="{{ old('noHp',  $data->noHp) }}" name="noHp" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{ old('alamat',  $data->alamat) }}" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kepada</label>
                                        <input type="text" class="form-control  @error('tujuan') is-invalid @enderror" value="{{ old('tujuan',  $data->tujuan) }}" name="tujuan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Posisi yang dilamar</label>
                                        <input type="text" class="form-control  @error('posisi') is-invalid @enderror" value="{{ old('posisi',  $data->posisi) }}" name="posisi" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Pembuatan</label>
                                        <input type="text" class="form-control  @error('tempatPembuatan') is-invalid @enderror" value="{{ old('tempatPembuatan',  $data->tempatPembuatan) }}" name="tempatPembuatan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <!-- /.box-body -->
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      <!-- /.box-footer -->
                  </form>
              </div>
          </div>
      </div>
  </div>
  @endforeach

  {{-- modal hapus --}}
  @foreach($lamar as $data)
  <div class="modal fade" id="modal-success-hapus-{{ $data->idLamar }}">
  <div class="modal-dialog" style="max-width: 30%">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
          <div class="modal-body">
              <form method="post" action="{{url('/lamarKerja/'.$data->idLamar)}}">
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

@endsection
