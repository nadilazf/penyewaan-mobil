@extends('layouts.app')
@section('title', 'Sewa')

@section('title-header', 'Sewa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Sewa</li>
@endsection

@section('action_btn')
    <a href="{{route('sewas.create')}}" class="btn btn-default">Tambah Data Sewa</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Sewa</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Awal sewa</th>
                                    <th>Tanggal Akhir Sewa</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Merk</th>
                                    <th>Nomor Polisi</th>
                                    <th>Harga Sewa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sewas as $sewa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sewa->tgl_awal }}</td>
                                        <td>{{ $sewa->tgl_akhir }}</td>
                                        <td>{{ $sewa->titip->kendaraan->nama }}</td>
                                        <td>{{ $sewa->titip->kendaraan->jenis }}</td>
                                        <td>{{ $sewa->titip->kendaraan->merk}}</td>
                                        <td>{{ $sewa->titip->kendaraan->nopol }}</td>
                                        <td>{{ $sewa->titip->harga_sewa }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('sewas.edit', $sewa->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $sewa->id }}" action="{{ route('sewas.destroy', $sewa->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$sewa->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{ $sewas->links() }}
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
