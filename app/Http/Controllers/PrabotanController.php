<?php

namespace App\Http\Controllers;

use App\Models\Prabotan;
use Illuminate\Http\Request;

class PrabotanController extends Controller
{
    // Tampilkan semua data prabotan
    public function index()
    {
        $prabotans = Prabotan::latest()->paginate(10);
        return view('prabotans.index', compact('prabotans'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('prabotans.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Prabotan::create($request->all());

        return redirect()->route('prabotan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $prabotan = Prabotan::findOrFail($id);
        return view('prabotans.edit', compact('prabotan'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $prabotan = Prabotan::findOrFail($id);
        $prabotan->update($request->all());

        return redirect()->route('prabotan.index')->with('success', 'Data berhasil diupdate.');
    }

    // Tampilkan detail (jika diperlukan)
    public function show(Prabotan $prabotan)
    {
        return view('prabotans.show', compact('prabotan'));
    }

    // Hapus data
    public function destroy($id)
    { 
        $prabotan = Prabotan::findOrFail($id);
        $prabotan->delete();

        return redirect()->route('prabotan.index')->with('success', 'Data berhasil dihapus.');
    }
}
