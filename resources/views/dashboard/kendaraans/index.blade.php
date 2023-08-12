@extends('layouts.app')
@section('title', 'Kendaraan')

@section('title-header', 'Kendaraan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Kendaraan</li>
@endsection

@section('action_btn')
    <a href="{{route('kendaraans.create')}}" class="btn btn-default">Tambah Data Kendaraan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Kendaraan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Nomor Polisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kendaraans as $kendaraan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kendaraan->merk }}</td>
                                        <td>{{ $kendaraan->jenis }}</td>
                                        <td>{{ $kendaraan->nama }}</td>
                                        <td>{{ $kendaraan->nopol }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('kendaraans.edit', $kendaraan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $kendaraan->id }}" action="{{ route('kendaraans.destroy', $kendaraan->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$kendaraan->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $kendaraans->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
