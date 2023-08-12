<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\Titip;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateSewa;

class SewaController extends Controller
{
    public function index()
    {
        $sewas = Sewa::orderByDesc('id')->paginate(10);

        return view('dashboard.sewas.index', compact('sewas'));
    }

    public function create()
    {

        $titips = Titip::whereNull('tgl_berakhir')->get();

        return view('dashboard.sewas.create', compact('titips'));    }

    public function store(RequestStoreOrUpdateSewa $request)
    {
        $titip = Titip::findOrFail($request->id_titip);

        if ($titip->tgl_berakhir === null) {
            $sewa = Sewa::with('titip')
                ->where('id_titip', $request->id_titip)
                ->whereHas('titip', function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->whereNull('tgl_berakhir')
                    ->orWhere('tgl_berakhir', '>=', now());
            });
        })
        ->exists();

            if ($sewa) {
                return redirect()->route('dashboard.sewas.create')->with('error', 'Status kendaraan sedang aktif.');
            }
        } else {
            return redirect()->route('dashboard.sewas.create')->with('error', 'Kendaraan sudah tidak dalam masa titipan dan tidak bisa disewa.');
        }

        $validated = $request->validated() + [
            'created_at' => now(),
        ];
        $sewa = Sewa::create($validated);

        return redirect(route('sewas.index'))->with('success', 'Data penyewaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sewa = Sewa::findOrFail($id);
        $titip = Titip::findOrFail($sewa->id_titip);
        $titips = Titip::whereNull('tgl_berakhir')->get();

    return view('dashboard.sewas.edit', compact('sewa', 'titip', 'titips'));
    }

    public function update(RequestStoreOrUpdateSewa $request, $id)
    {
        $sewa = Sewa::findOrFail($id);
        $titip = Titip::findOrFail($request->id_titip);

        if ($titip->tgl_berakhir === null) {
            $sewacheck = Sewa::with('titip')
            ->where('id_titip', $request->id_titip)
            ->whereHas('titip', function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereNull('tgl_berakhir')
                        ->orWhere('tgl_berakhir', '>=', now());
                });
            })
            ->first();

            if ($sewacheck) {
                return redirect()->route('dashboard.sewas.edit', $sewa->id)->with('error', 'Status kendaraan sedang aktif.');
            }
        } else {
            return redirect()->route('dashboard.sewas.edit')->with('error', 'Kendaraan sudah tidak dalam masa titipan dan tidak bisa disewa.');
        }

        $validated = $request->validated();

        $sewa->update($validated);

        return redirect(route('sewas.index'))->with('success', 'Data penyewaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sewa = Sewa::findOrFail($id);
        $sewa->delete();

        return redirect(route('sewas.index'))->with('success', 'Data penyewaan berhasil dihapus.');
    }
}

