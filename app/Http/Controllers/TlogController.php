<?php

namespace App\Http\Controllers;

use App\Models\Tlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class TlogController extends Controller
{
    // Menambahkan log
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jam' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tlog = Tlog::create($request->all());

        return response()->json(['message' => 'Log added successfully', 'log' => $tlog], 201);
    }

    // Mendapatkan semua log
    public function index()
    {
        $logs = Tlog::all();
        return response()->json($logs);
    }

    // Mengedit log
    public function update(Request $request, $id)
    {
        $tlog = Tlog::find($id);

        if (!$tlog) {
            return response()->json(['error' => 'Log not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'tanggal' => 'date',
            'jam' => 'string|max:255',
            'keterangan' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tlog->update($request->all());

        return response()->json(['message' => 'Log updated successfully', 'log' => $tlog]);
    }

    // Menghapus log
    public function destroy($id)
    {
        $tlog = Tlog::find($id);

        if (!$tlog) {
            return response()->json(['error' => 'Log not found'], 404);
        }

        $tlog->delete();

        return response()->json(['message' => 'Log deleted successfully']);
    }

    // Mengexport data log ke PDF
    public function export()
    {
        $logs = Tlog::all();
        $pdf = PDF::loadView('tlog.export', compact('logs'));

        return $pdf->download('data_log.pdf');
    }
}
