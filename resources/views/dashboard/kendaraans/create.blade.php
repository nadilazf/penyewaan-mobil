@extends('layouts.app')
@section('title', 'Tambah Data Kendaraan')

@section('title-header', 'Tambah Data Kendaraan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('kendaraans.index') }}">Data Kendaraan</a></li>
    <li class="breadcrumb-item active">Tambah Data Kendaraan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Kendaraan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kendaraans.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="merk">Merk Kendaraan</label>
                                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk"
                                        placeholder="Merk Kendaraan" value="{{ old('merk') }}" name="merk">

                                    @error('merk')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="jenis">Jenis Kendaraan</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                                        placeholder="Jenis Kendaraan" value="{{ old('jenis') }}" name="jenis">

                                    @error('jenis')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Kendaraan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Nama Kendaraan" value="{{ old('nama') }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="nopol">Nomor Polisi</label>
                                    <input type="text" class="form-control @error('nopol') is-invalid @enderror" id="nopol"
                                        placeholder="Nomor Polisi" value="{{ old('nopol') }}" name="nopol">

                                    @error('nopol')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('kendaraans.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
