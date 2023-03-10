@extends('Index')
@section('content')


    <div class="card mb-4">
                                <div class="card-header">
                                    <h4><i class="fa-solid fa-right-left"></i>
                                    Peminjaman</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddPinjam">
                                    <i class="fa fa-plus"></i>
                                    Pinjam Buku
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="users-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Buku</th>
                                                <th>Nama Peminjam</th>
                                                <th>Nomor HP</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach($pinjam as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->nama_buku }}</td>
                                                <td>{{ $row->nama_pinjam }}</td>
                                                <td>{{ $row->nomor_hp }}</td>
                                                <td>{{ $row->tanggal_pinjam }}</td>
                                                <td>{{ $row->tanggal_kembali }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>
                                                    <img src="{{ asset('fotobuku/'.$row->gambar) }}" alt="" style="width: 100px;">
                                                </td>
                                                <td>
                                                    <a href="#modalEditPinjam{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<div class="modal fade" id="modalAddPinjam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" enctype="multipart/form-data" action="/pinjam/store">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Buku</label>
                        <select class="form-control" name="id_buku" required>
                        @foreach ($buku as $row)
                        <option value="{{$row->id}}">{{$row->id}} | {{$row->nama_buku}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pinjam" id="nama_pinjam" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" class="form-control" name="nomor_hp" placeholder="Nomor HP" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" placeholder="Tanggal Pinjam">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tanggal_kembali" placeholder="Tanggal Kembali">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" value="Dipinjam" class="form-control" name="status" id="dipinjam" placeholder="Status" readonly>
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

@foreach($pinjam as $d)

<div class="modal fade" id="modalEditPinjam{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" enctype="multipart/form-data" action="/pinjam/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="{{ $d->id }}" name="id" required>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="{{ $d->nama_pinjam }}" class="form-control" name="nama_pinjam" placeholder="Nama Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" value="{{ $d->nomor_hp }}" class="form-control" name="nomor_hp" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option <?php if($d['status']=="Dipinjam") echo "selected"; ?> value="Dipinjam">Dipinjam</option>
                            <option <?php if($d['status']=="Dikembalikan") echo "selected"; ?>value="Dikembalikan">Dikembalikan</option>
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

@endsection
                    
