<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPdf\Facades\Pdf;

class PDFController extends Controller {
    public function index(String $id) {
        $user = User::find($id);

        if (!$user) {
            return redirect(route('dashboard'))->with('error', 'Tidak ada mahasiswa / akun dengan id tersebut');
        }

        if (Auth::user()->role == 'STUDENT' && Auth::user()->id != $id) {
            abort(403);
        }

        $imagePath = public_path('storage/' . $user['photo']);
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
        $imageData = file_get_contents($imagePath);
        $data['base64'] = 'data:image/' . $imageType . ';base64,' . base64_encode($imageData);

        return Pdf::view('pdfs.registration-document', ['user' => $user, 'photo' => $data['base64']])
            ->download('Bukti Pendaftaran ' . $user['full_name'] . '.pdf');
    }
}
