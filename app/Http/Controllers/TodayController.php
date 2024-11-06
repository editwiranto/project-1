<?php

namespace App\Http\Controllers;

use App\Models\Today;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TodayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Today::all();
        return view('today.indextoday', compact('today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('today.tambahtoday');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:2048',
            'nama_makanan' => 'required|string',
            'diskon' => 'required|string',
            'url' => 'required|string'
        ]);

        try {
            if ($request->image) {

                $path = $request->image->store('images', 'public');
            }

            $data = new Today();
            $data->image = $path;
            $data->nama_makanan = $request->nama_makanan;
            $data->diskon = $request->diskon;
            $data->url = $request->url;
            $data->save();


            return redirect('today')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('today')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Today $today)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $today = Today::find($id);
        return view('today.edittoday', compact('today'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Today $today, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:2048',
            'nama_makanan' => 'required|string',
            'diskon' => 'required|string',
            'url' => 'required|string'
        ]);

        try {

            $image = Today::find($id);

            if ($request->image) {
                //hapus gambar yang lama
                if ($image->image) {
                    $imagePath = $image->image; // Path relatif yang disimpan di database
                    Log::info("Checking if file exists: " . $image->image);
                    if (Storage::exists('public/' . $imagePath)) {
                        Log::info("File found, attempting to delete: " . $imagePath);
                        Storage::delete('public/' . $imagePath);
                    } else {
                        Log::info("File not found: " . $image->image);
                    }
                }
                //hapus images/ agar tersisa nama file
                $fileName = basename($image->image);
                //simpan gambar baru dengan timpa yang lama dengan storeAs
                $imagePath = $request->image->storeAs('images', $fileName, 'public');
                Log::info("New image uploaded at: " . $imagePath);
                $image->image = $imagePath;
            }

            $image->nama_makanan = $request->nama_makanan;
            $image->diskon = $request->diskon;
            $image->url = $request->url;
            $image->save();



            return redirect('today')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('today')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Mencari entri berdasarkan ID
            $today = Today::find($id);

            // Pastikan entri ditemukan
            if ($today->image) {
                Log::info("Checking if file exists: " . $today->image);
                $filePath = 'public/' . $today->image;
                Log::info("Full path to check: " . $filePath);
                // Jika entri memiliki gambar terkait, hapus file tersebut
                if ($today->image && Storage::exists('public/' . $today->image)) {
                    Log::info("Deleting file: " . $today->image);  // Tambahkan log untuk melihat file yang akan dihapus
                    Storage::delete('public/' . $today->image);
                } else {
                    Log::info("File not found: " . $today->image);  // Tambahkan log jika file tidak ditemukan
                }

                // Menghapus entri
                $today->delete();

                // Mengembalikan response dengan pesan sukses
                return redirect('today')->with('success', 'Data Berhasil Dihapus');
            } else {
                // Jika data tidak ditemukan
                return redirect('today')->with('fail', 'Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            // Menangkap error dan mengembalikan pesan error
            return redirect('today')->with('fail', $e->getMessage());
        }
    }
}
