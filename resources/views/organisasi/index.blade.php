@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/home") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Organisasi</h4>
                <div class="card-header-action">
                    <a href="{{ url("/organisasi/create") }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Singkatan</th>
                                        <th>Alamat</th>
                                        <th>Detil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($organisasis as $organisasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $organisasi->nama }}</td>
                                        <td>{{ $organisasi->nama_singkat }}</td>
                                        <td>{{ $organisasi->alamat }}</td>
                                        <td><a href={{ url("/organisasi/" . $organisasi->organisasi_id) }} class="btn btn-success btn-sm">Detil</a>
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
</div>
@endsection