@extends('layout/application')

@section('content')
    <div>
        <a href="/siswa" class="btn btn-secondary"><< Kembali</a>
        <h1> {{ $data->name }} </h1>
        <p>
            <b>Nomor Induk</b> {{ $data->nomor_induk }}
        </p>
        <p>
            <b>Alamat</b> {{ $data->alamat }}
        </p>
    </div>
@endsection