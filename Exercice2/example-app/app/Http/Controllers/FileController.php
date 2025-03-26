<?php
// app/Http/Controllers/FileController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240' // max 10MB
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $fileName, 'public');

        return response()->json([
            'message' => 'File uploaded successfully',
            'path' => $path
        ]);
    }

    public function getFiles()
    {
        $files = Storage::disk('public')->files('uploads');
        return response()->json($files);
    }
}