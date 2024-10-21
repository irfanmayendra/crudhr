<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF; // Pastikan ini diimpor jika menggunakan PDF

class KaryawanController extends Controller
{
    // Menambahkan karyawan
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $karyawan = Karyawan::create($request->all());

        return response()->json(['message' => 'Karyawan added successfully', 'karyawan' => $karyawan], 201);
    }

    // Mendapatkan semua karyawan
    public function index()
    {
        $karyawan = Karyawan::all();
        return response()->json($karyawan);
    }

    // Mengedit karyawan
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['error' => 'Karyawan not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'tgl_lahir' => 'date',
            'gaji' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $karyawan->update($request->all());

        return response()->json(['message' => 'Karyawan updated successfully', 'karyawan' => $karyawan]);
    }

    // Menghapus karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['error' => 'Karyawan not found'], 404);
        }

        $karyawan->delete();

        return response()->json(['message' => 'Karyawan deleted successfully']);
    }

    // Mengexport data karyawan ke PDF
    public function export()
    {
        $karyawan = Karyawan::all();
        $pdf = PDF::loadView('karyawan.export', compact('karyawan'));

        return $pdf->download('data_karyawan.pdf');
    }
}
