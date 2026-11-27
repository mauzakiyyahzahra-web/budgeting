<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;


class moneyController extends Controller
{
    public function index()
    {
        $moneys = Money::all();
        $totalPemasukan = Money::where('type', 'pemasukan')->sum('amount');
        $totalPengeluaran = Money::where('type', 'pengeluaran')->sum('amount');
        $sisaDuit = $totalPemasukan - $totalPengeluaran;
        return View('Moneys.index', compact('moneys', 'totalPemasukan', 'totalPengeluaran', 'sisaDuit'));
    }

    public function create()
    {
        return view('Moneys.create');
    }
    public function store(Request $request)
    {
        // dicek dulu data yang diisi sama user
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'category' => 'required',
            'date' => 'required',
            'description' => 'nullable',
        ]);

        // masukain data baru ke tabel money
        Money::create($request->all());
        return redirect()->route('Moneys.index')->with('success', 'hore transaksi berhasil');

    }

    public function edit($id)
    {
        $money = Money::findOrFail($id);
        return view('moneys.edit', compact('money'));


    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'category' => 'required',
            'date' => 'required',
            'description' => 'nullable',
        ]);
        $money = Money::findOrFail($id);
        $money ->update($request->all());
        return redirect()->route('Moneys.index')->with('success', 'hore edit berhasil');
    }
    
    public function destory(Request $request, $id)
    {
        $money = Money::findOrFail($id);
        $money ->delete();
        return redirect()->route('Moneys.index')->with('success', 'berhasil dihapus');
    }
}

