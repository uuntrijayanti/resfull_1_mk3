<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order; 
use App\Models\Customer;

class OrdersController extends Controller
{
    /**
     * Menampilkan semua data order.
     */
    public function index()
    {
        $orders = Order::all(); // Mengambil semua data dari tabel orders
        return response()->json($orders);
    }

    /**
     * Menyimpan data order baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create($validated); // Menyimpan data yang sudah divalidasi
        return response()->json($order, 201); // Mengembalikan respon JSON dengan status 201 (Created)
    }

    /**
     * Menampilkan data order berdasarkan ID.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id); // Mencari order berdasarkan ID, error jika tidak ditemukan
        return response()->json($order);
    }

    /**
     * Memperbarui data order berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::findOrFail($id); // Mencari order berdasarkan ID
        $order->update($validated); // Memperbarui data dengan input yang divalidasi

        return response()->json($order);
    }

    /**
     * Menghapus data order berdasarkan ID.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id); // Mencari order berdasarkan ID
        $order->delete(); // Menghapus data

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
