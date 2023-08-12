@extends('layouts.app')
@section('title', 'Penitipan')

@section('title-header', 'Penitipan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Penitipan</li>
@endsection

@section('action_btn')
    <a href="{{route('titips.create')}}" class="btn btn-default">Tambah Data Penitipan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Penitipan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Merk</th>
                                    <th>Nomor Polisi</th>
                                    <th>Harga Sewa</th>
                                    <th>Tanggal Titip</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($titips as $titip)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $titip->kendaraan->nama }}</td>
                                        <td>{{ $titip->kendaraan->jenis }}</td>
                                        <td>{{ $titip->kendaraan->merk}}</td>
                                        <td>{{ $titip->kendaraan->nopol }}</td>
                                        <td>{{ $titip->harga_sewa }}</td>
                                        <td>{{ $titip->tgl_titip }}</td>
                                        <td>{{ $titip->tgl_berakhir !=null ? $titip->tgl_berakhir : 'null' }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('titips.edit', $titip->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $titip->id }}" action="{{ route('titips.destroy', $titip->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$titip->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{ $titips->links() }}
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
