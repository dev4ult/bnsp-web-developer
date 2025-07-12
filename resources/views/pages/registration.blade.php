@extends('layouts.single')

@section('content')
<form action="{{ route('registration.store') }}" method="POST" class="shadow p-8 min-w-52 rounded-lg">
    @csrf
    @method('POST')

    <h1 class="text-3xl font-semibold">Registrasi Calon Mahasiswa</h1>
    <!-- <p class="mt-2">Login untuk dapat mengakses sistem.</p> -->

    <div class="grid grid-flow-row grid-cols-2 gap-x-5 gap-y-3 mt-5">
        <div class="space-y-1.5 col-span-2">
            <label for="full_name" class="font-medium text-sm">Nama Lengkap *</label>
            <input type="text" id="full_name" name="full_name" class="input input-bordered w-full" required />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />


        <div class="space-y-1.5">
            <label for="id_card_address" class="font-medium text-sm">Alamat KTP *</label>
            <input type="text" id="id_card_address" name="id_card_address" class="input input-bordered w-full" required />
        </div>
        <div class="space-y-1.5">
            <label for="address" class="font-medium text-sm">Alamat Lengkap Saat Ini *</label>
            <input type="text" id="address" name="address" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="province" class="font-medium text-sm">Provinsi *</label>
            <input type="text" id="province" name="province" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="regency" class="font-medium text-sm">Kabupaten *</label>
            <input type="text" id="regency" name="regency" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="district" class="font-medium text-sm">Kecamatan *</label>
            <input type="text" id="district" name="district" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="telephone_umber" class="font-medium text-sm">Nomor Telepon *</label>
            <input type="number" id="telephone_number" name="telephone_number" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5 col-span-2">
            <label for="phone_number" class="font-medium text-sm">Nomor HP *</label>
            <input type="number" id="phone_number" name="phone_number" class="input input-bordered w-full" required />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="citizenship" class="font-medium text-sm">Kewarganegaraan *</label>
            <select name="citizenship" id="citizenship" class="select select-bordered w-full" required>
                <option value="">Pilih ..</option>
                <option value="WNI Asli">WNI Asli</option>
                <option value="WNI Keturunan">WNI Keturunan</option>
                <option value="WNA">WNA</option>
            </select>

            <input type="text" id="other_country_citizenship" name="other_country_citizenship" class="input input-bordered w-full hidden" />
        </div>

        <div class="space-y-1.5">
            <label for="birth_of_date" class="font-medium text-sm">Tanggal Lahir *</label>
            <input type="date" id="birth_of_date" name="birth_of_date" class="input input-bordered w-full" required />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="birth_address" class="font-medium text-sm">Tempat Lahir *</label>
            <input type="text" id="birth_address" name="birth_address" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="birth_province" class="font-medium text-sm">Provinsi Kelahiran *</label>
            <input type="text" id="birth_province" name="birth_province" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="birth_regency" class="font-medium text-sm">Kota/Kabupaten Kelahiran *</label>
            <input type="text" id="birth_regency" name="birth_regency" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="other_country" class="font-medium text-sm">Negara Lain (jika tempat lahir diluar negeri)</label>
            <input type="text" id="other_country" name="other_country" class="input input-bordered w-full" />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="gender" class="font-medium text-sm">Jenis Kelamin *</label>
            <select name="gender" id="gender" class="select select-bordered w-full" required>
                <option value="">Pilih ..</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
        </div>

        <div class="space-y-1.5">
            <label for="marriage_status" class="font-medium text-sm">Status Menikah *</label>
            <select name="marriage_status" id="marriage_status" class="select select-bordered w-full" required>
                <option value="">Pilih ..</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Lain-lain">Lain-lain (janda/duda)</option>
            </select>
        </div>

        <div class="space-y-1.5 col-span-2">
            <label for="religion" class="font-medium text-sm">Agama *</label>
            <select name="religion" id="religion" class="select select-bordered w-full" required>
                <option value="">Pilih ..</option>
                <option value="Islam">Islam</option>
                <option value="Katolik">Katolik</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <h1 class="badge badge-neutral badge-sm rounded-full col-span-2">Kebutuhan Akun Mahasiswa</h1>

        <div class="space-y-1.5">
            <label for="email" class="font-medium text-sm">Email *</label>
            <input type="email" id="email" name="email" class="input input-bordered w-full" required />
        </div>

        <div class="space-y-1.5">
            <label for="password" class="font-medium text-sm">Password *</label>
            <input type="password" id="password" name="password" class="input input-bordered w-full" required />
        </div>

    </div>

    <button type="submit" class="btn btn-block btn-primary mt-6">Registrasi</button>
    <p class="text-xs mt-2 text-center">Sudah punya akun mahasiswa? <a href="{{ route('login.index') }}" class="link text-blue-500">Login</a></p>

</form>
@endsection