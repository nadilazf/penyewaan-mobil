@extends('layouts.app')
@section('title', 'Tambah Data Penitipan')

@section('title-header', 'Tambah Data Penitipan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('titips.index') }}">Data Titipin</a></li>
    <li class="breadcrumb-item active">Tambah Data Penitipan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Penitipan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('titips.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="id_kendaraan">Nama Kendaraan</label>
                                        <select class="form-control" id="id_kendaraan" name="id_kendaraan">
                                            <option value="" selected>---Pilih Kendaraan---</option>
                                                @foreach ($kendaraans as $kendaraan)
                                                    <option value="{{ $kendaraan->id }}">
                                                        {{ $kendaraan->nama }} - {{ $kendaraan->nopol }}
                                                    </option>
                                                @endforeach
                                                    </select>
                                    @error('id_kendaraan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="harga_sewa">Harga Sewa</label>
                                    <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" id="harga_sewa"
                                        placeholder="Harga Sewa" value="{{ old('harga_sewa') }}" name="harga_sewa">

                                    @error('harga_sewa')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="tgl_titip">Tanggal Titip</label>
                                    <input type="date" class="form-control @error('tgl_titip') is-invalid @enderror" id="tgl_titip"
                                        placeholder="Tanggal Titip" value="{{ old('tgl_titip') }}" name="tgl_titip">

                                    @error('tgl_titip')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('titips.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
