<?php

namespace App\Http\Controllers;

use App\Models\Titip;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateTitip;

class TitipController extends Controller
{
    public function index()
    {
        $titips = Titip::orderByDesc('id')->paginate(10);

        return view('dashboard.titips.index', compact('titips'));
    }

//     public function showByMerkAndJenis($merk, $jenis)
// {
//     $kendaraans = Kendaraan::where('merk', $merk)
//         ->where('jenis', $jenis)
//         ->orderByDesc('id')
//         ->paginate(10);

//     return view('dashboard.titips.index', compact('kendaraans'));
// }

    public function create()
    {
        $kendaraans = Kendaraan::all();
        return view('dashboard.titips.create', compact('kendaraans'));
    }

    public function store(RequestStoreOrUpdateTitip $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];
        $titip = Titip::create($validated);

        return redirect(route('titips.index'))->with('success', 'Titipin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kendaraans = Kendaraan::all();
        $titip = Titip::findOrFail($id);

        return view('dashboard.titips.edit', compact('titip', 'kendaraans'));
    }

    public function update(RequestStoreOrUpdateTitip $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $titip = Titip::findOrFail($id);
        $titip->update($validated);

        return redirect(route('titips.index'))->with('success', 'Titipan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $titip = Titip::findOrFail($id);
        $titip->delete();

        return redirect(route('titips.index'))->with('success', 'Titipan berhasil dihapus.');
    }
}
