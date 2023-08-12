@extends('layouts.app')
@section('title', 'Tambah Data Penyewaan')

@section('title-header', 'Tambah Data Penyewaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sewas.index') }}">Data Titipin</a></li>
    <li class="breadcrumb-item active">Tambah Data Penyewaan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Penyewaan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sewas.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="id_titip">Nama Kendaraan</label>
                                        <select class="form-control" id="id_titip" name="id_titip">
                                            <option value="" selected>---Pilih Kendaraan---</option>
                                                @foreach ($titips as $titip)
                                                    <option value="{{ $titip->kendaraan->id }}">
                                                        {{ $titip->kendaraan->nama }} - {{ $titip->kendaraan->nopol }}
                                                    </option>
                                                @endforeach
                                                    </select>
                                    @error('id_titip')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="tgl_awal">Tanggal Awal Sewa</label>
                                    <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" id="tgl_awal"
                                        placeholder="Tanggal Awal Sewa" value="{{ old('tgl_awal') }}" name="tgl_awal">

                                    @error('tgl_awal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="tgl_akhir">Tanggal Akhir Sewa</label>
                                    <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" id="tgl_akhir"
                                        placeholder="Tanggal Akhir Sewa" value="{{ old('tgl_akhir') }}" name="tgl_akhir">

                                    @error('tgl_akhir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('sewas.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
