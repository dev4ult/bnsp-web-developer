<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index() {
        return view('pages.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request, string $id) {
        if (!$request->hasFile('photo')) {
            return redirect(route('profile.index'))->with('error', 'Tidak ada perubahan pada akun');
        }

        if (Auth::user()->role == 'STUDENT' && Auth::user()->id != $id) {
            abort(403);
        }

        $user = User::find($id);

        if (!$user) {
            return redirect(route('profile.index'))->with('error', 'Internal server error');
        }

        $photoPath = $request->file('photo')->store('photos', 'public');

        $user->update(['photo' => $photoPath]);

        return redirect(route('profile.index'))->with('success', 'Foto profil berhasil di-update');
    }
}
