<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Http\Requests\RequestStoreOrUpdateKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
    $kendaraans = Kendaraan::orderByDesc('id')->paginate(10);

    return view('dashboard.kendaraans.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('dashboard.kendaraans.create');
    }

    public function store(RequestStoreOrUpdateKendaraan $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];
        $kendaraan = Kendaraan::create($validated);

        return redirect(route('kendaraans.index'))->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('dashboard.kendaraans.edit', compact('kendaraan'));
    }

    public function update(RequestStoreOrUpdateKendaraan $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($validated);

        return redirect(route('kendaraans.index'))->with('success', 'Kendaraan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect(route('kendaraans.index'))->with('success', 'Kendaraan berhasil dihapus.');
    }
}
