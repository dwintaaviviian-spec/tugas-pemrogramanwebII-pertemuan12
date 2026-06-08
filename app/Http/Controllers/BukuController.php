<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();

        $totalBuku = Buku::count();
        $bukuTersedia = Buku::tersedia()->count();
        $bukuHabis = Buku::where('stok', 0)->count();

        return view('buku.index', compact(
            'bukus',
            'totalBuku',
            'bukuTersedia',
            'bukuHabis'
        ));
    }

    public function kategori($kategori)
{
    $bukus = Buku::where('kategori', $kategori)->get();

    $totalBuku = Buku::count();
    $bukuTersedia = Buku::tersedia()->count();
    $bukuHabis = Buku::where('stok', 0)->count();

    return view('buku.index', compact(
        'bukus',
        'kategori',
        'totalBuku',
        'bukuTersedia',
        'bukuHabis'
    ));
}

public function create()
{
    return view('buku.create');
}

public function show($id)
{
    $buku = Buku::findOrFail($id);

    return view('buku.show', compact('buku'));
}

public function search(Request $request)
{
    $query = Buku::query();

    // Search keyword
    if ($request->filled('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->keyword . '%')
              ->orWhere('pengarang', 'like', '%' . $request->keyword . '%')
              ->orWhere('penerbit', 'like', '%' . $request->keyword . '%');
        });
    }

    // Filter kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    // Filter tahun
    if ($request->filled('tahun')) {
        $query->where('tahun_terbit', $request->tahun);
    }

    // Filter ketersediaan
    if ($request->ketersediaan == 'tersedia') {
        $query->where('stok', '>', 0);
    }

    if ($request->ketersediaan == 'habis') {
        $query->where('stok', 0);
    }

    $bukus = $query->latest()->get();

    $totalBuku = Buku::count();
    $bukuTersedia = Buku::tersedia()->count();
    $bukuHabis = Buku::where('stok', 0)->count();

    return view('buku.index', compact(
        'bukus',
        'totalBuku',
        'bukuTersedia',
        'bukuHabis'
    ));
}
public function store(StoreBukuRequest $request)
{
    try {

        Buku::create($request->validated());

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');

    } catch (\Exception $e) {

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Gagal menambahkan buku!');
    }
}
public function edit(string $id)
{
    $buku = Buku::findOrFail($id);
    return view('buku.edit', compact('buku'));
}
public function update(UpdateBukuRequest $request, string $id)
{
    try {
        $buku = Buku::findOrFail($id);
        
        // Update buku dengan validated data
        $buku->update($request->validated());
        
        // Redirect dengan success message
        return redirect()->route('buku.show', $buku->id)
                         ->with('success', 'Buku berhasil diupdate!');
                         
    } catch (\Exception $e) {
        // Redirect dengan error message jika gagal
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'Gagal mengupdate buku: ' . $e->getMessage());
    }
}

public function destroy(string $id)
{
    try {
        $buku = Buku::findOrFail($id);
        $judulBuku = $buku->judul;
        
        // Delete buku
        $buku->delete();
        
        // Redirect dengan success message
        return redirect()->route('buku.index')
                         ->with('success', "Buku '{$judulBuku}' berhasil dihapus!");
                         
    } catch (\Exception $e) {
        // Redirect dengan error message jika gagal
        return redirect()->back()
                         ->with('error', 'Gagal menghapus buku: ' . $e->getMessage());
    }
}

public function bulkDelete(Request $request)
{
    try {

        $ids = $request->buku_ids;

        if (!$ids) {
            return redirect()
                ->back()
                ->with('error', 'Pilih minimal satu buku.');
        }

        Buku::whereIn('id', $ids)->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', count($ids) . ' buku berhasil dihapus!');

    } catch (\Exception $e) {

        return redirect()
            ->back()
            ->with('error', 'Gagal menghapus buku.');
    }
}

public function export()
{
    $bukus = Buku::all();

    $filename = 'buku_' . date('Y-m-d_His') . '.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($bukus) {

        $file = fopen('php://output', 'w');

        // Header CSV
        fputcsv($file, [
            'Kode Buku',
            'Judul',
            'Kategori',
            'Pengarang',
            'Penerbit',
            'Tahun',
            'ISBN',
            'Harga',
            'Stok'
        ]);

        // Data Buku
        foreach ($bukus as $buku) {
            fputcsv($file, [
                $buku->kode_buku,
                $buku->judul,
                $buku->kategori,
                $buku->pengarang,
                $buku->penerbit,
                $buku->tahun_terbit,
                $buku->isbn,
                $buku->harga,
                $buku->stok,
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

}