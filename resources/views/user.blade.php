@extends('Index')
@section('content')


    <div class="card mb-4">
                                <div class="card-header">
                                    <h4><i class="fa-solid fa-user"></i>
                                    Data User</h4>
                                </div>
                                <div class="card-body">
                                    <table id="users-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @foreach($users as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->username }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->level }}</td>
                                                <td >
                                                    <a href="#modalEditUser{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@foreach($users as $d)

<div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" enctype="multipart/form-data" action="/user/{{ $d->id }}/update">
                @csrf
                
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username ..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email ..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level" required>
                            <option <?php if($d['level']=="admin") echo "selected"; ?> value="admin">Admin</option>
                            <option <?php if($d['level']=="user") echo "selected"; ?>value="user">User</option>
                        </select>
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

@foreach($users as $g)

<div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="GET" enctype="multipart/form-data" action="/user/{{ $g->id }}/destroy">
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