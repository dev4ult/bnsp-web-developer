<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller {

    public function index(Request $request) {
        $students = User::where(['role' => 'STUDENT']);

        $searchKey  = $request->query('search');
        if ($searchKey) {
            $students = $students->where('full_name', 'like', '%' . $searchKey . '%');
        }

        $students =  $students->get();

        return view('pages.student.index', ['students' => $students, 'search' => $searchKey]);
    }

    public function create() {
        return view('pages.student.create');
    }

    public function store(Request $request) {
        $data = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),

            'id_card_address' => $request->input('id_card_address'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'regency' => $request->input('regency'),
            'district' => $request->input('district'),
            'telephone_number' => $request->input('telephone_number'),
            'phone_number' => $request->input('phone_number'),

            'citizenship' => $request->input('citizenship'),
            'birth_of_date' => $request->input('birth_of_date'),

            'birth_address' => $request->input('birth_address'),
            'birth_province' => $request->input('birth_province'),
            'birth_regency' => $request->input('birth_regency'),
            'other_country' => $request->input('other_country'),

            'gender' => $request->input('gender'),
            'marriage_status' => $request->input('marriage_status'),
            'religion' => $request->input('religion'),
        ];

        $data['password'] = Hash::make($data['password']);

        $insert = User::create($data);

        return redirect(route('student.edit', $insert['id']))->with(['success' => 'Akun mahasiswa baru berhasil diregistrasikan']);
    }

    public function show(string $id) {
        $student = User::where('role', 'STUDENT')->find($id);

        if (!$student) {
            return redirect(route('pages.student.index'))->with('error', 'Akun mahasiswa tidak ditemukan!');
        }

        return view('pages.student.show', ['student' => $student]);
    }

    public function edit(string $id) {
        $student = User::where('role', 'STUDENT')->find($id);

        if (!$student) {
            return redirect(route('pages.student.index'))->with('error', 'Akun mahasiswa tidak ditemukan!');
        }

        return view('pages.student.edit', ['student' => $student]);
    }

    public function update(Request $request, string $id) {
        $student = User::where('role', 'STUDENT')->find($id);

        if (!$student) {
            return redirect(route('pages.student.index'))->with('error', 'Akun mahasiswa tidak ditemukan!');
        }

        $data = [
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),

            'id_card_address' => $request->input('id_card_address'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'regency' => $request->input('regency'),
            'district' => $request->input('district'),
            'telephone_number' => $request->input('telephone_number'),
            'phone_number' => $request->input('phone_number'),

            'citizenship' => $request->input('citizenship'),
            'birth_of_date' => $request->input('birth_of_date'),

            'birth_address' => $request->input('birth_address'),
            'birth_province' => $request->input('birth_province'),
            'birth_regency' => $request->input('birth_regency'),
            'other_country' => $request->input('other_country'),

            'gender' => $request->input('gender'),
            'marriage_status' => $request->input('marriage_status'),
            'religion' => $request->input('religion'),
        ];

        if ($request->input('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $student->update($data);

        return redirect(route('student.edit', $student['id']))->with(['success' => 'Akun mahasiswa berhasil di-update!']);
    }

    public function update_profile(Request $request, string $id) {
        if (!$request->hasFile('photo')) {
            return redirect(route('student.edit', $id))->with('error', 'Tidak ada perubahan pada akun');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect(route('student.edit', $id))->with('error', 'Internal server error');
        }

        $photoPath = $request->file('photo')->store('photos', 'public');

        $user->update(['photo' => $photoPath]);

        return redirect(route('student.edit', $id))->with('success', 'Foto profil berhasil di-update');
    }

    public function destroy(string $id) {
        $student = User::where('role', 'STUDENT')->find($id);

        if (!$student) {
            return redirect(route('pages.student.index'))->with('error', 'Akun mahasiswa tidak ditemukan!');
        }

        $student->destroy($id);

        return redirect(route('student.index'))->with(['success' => 'Akun mahasiswa berhasil dihapus']);
    }
}
