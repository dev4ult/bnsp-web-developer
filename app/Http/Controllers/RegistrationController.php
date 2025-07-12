<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller {
    public function index() {
        return view('pages.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        User::create($data);

        return redirect(route('login.index'));
    }
}
