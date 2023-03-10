@extends('Index')
@section('content')


<div class="card mb-4">
    <div class="card-header">
        <h4><i class="fa-solid fa-book"></i> Buku</h4>
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
                        <th>Stauts</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection