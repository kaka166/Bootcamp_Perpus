@extends('Index')
@section('content')


<div class="card mb-4">
    <div class="card-header">
        <h4><i class="fa-solid fa-book"></i> Buku</h4>
        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBuku">
            <i class="fa fa-plus"></i>
            Tambah Buku
        </button>
        </div>
        <div class="card-body">
            <table id="users-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Status</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($buku as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_buku }}</td>
                        <td>{{ $row->penerbit }}</td>
                        <td>{{ $row->penulis }}</td>
                        <td>{{ $row->tahun_terbit }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            <img src="{{ asset('fotobuku/'.$row->gambar) }}" alt="" style="width: 100px;">
                        </td>
                        <td>
                            <a href="#modalEditBuku{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="#modalHapusBuku{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddBuku" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" enctype="multipart/form-data" action="/buku/store">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" name="nama_buku" placeholder="Nama Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" class="form-control" name="penulis" placeholder="Penulis" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" value="tersedia" class="form-control" name="status" id="tersedia" placeholder="Status" readonly>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*" required>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i>Batal</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Simpan</button></div>
                    </div>
            </form>
        </div>
    </div>
</div>

@foreach($buku as $d)

<div class="modal fade" id="modalEditBuku{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" enctype="multipart/form-data" action="/buku/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $d->id }}" name="id" required>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" value="{{ $d->nama_buku }}" class="form-control" name="nama_buku" placeholder="Nama Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" value="{{ $d->penerbit }}" class="form-control" name="penerbit" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" value="{{ $d->penulis }}" class="form-control" name="penulis" placeholder="Penulis" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="number" value="{{ $d->tahun_terbit }}" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option <?php if($d['status']=="Tersedia") echo "selected"; ?> value="Tersedia">Tersedia</option>
                            <option <?php if($d['status']=="Tidak Tersedia") echo "selected"; ?>value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*"  >
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i>Batal</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Simpan</button></div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@foreach($buku as $g)

<div class="modal fade" id="modalHapusBuku{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="GET" enctype="multipart/form-data" action="buku/{{ $g->id }}/destroy">
                @csrf
                
                <div class="modal-body">

                    <input type="hidden" value="{{ $g->id }}" name="id" required>

                    <div class="form-group">
                        <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>    
                    </div>
                
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-undo"></i>Batal</button>
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection
                    
