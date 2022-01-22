@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <a href="{{ url('admin/user/tambah', []) }}" class="btn btn-primary btn-sm">Tambah</a>
                <h3>Halaman User</h3>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Buat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                @foreach ($objek as $item)
                <tr>
                    <td>
                        {{  $loop->iteration }}
                    </td>
                    <td>
                        {{  $item->name }}
                    </td>
                    <td>
                        {{  $item->email }}
                    </td>
                    <td> {{  $item->created_at }} </td>
                    
                    <a href="{{ url('admin/user/edit/'.$item->id, []) }}"class="btn btn-info btn-sm">
                        Edit     
                    <a href="{{ url('admin/user/hapus/'.$item->id, []) }}"class="btn btn-danger btn-sm">
                        Hapus     
                </tr>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
