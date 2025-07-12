@extends('layouts.app')

@section('content')
<div class="grid grid-flow-row grid-cols-3 gap-5 p-8">
    <div class="grid grid-flow-row grid-cols-2 col-span-2 gap-x-5 gap-y-3 shadow p-8 rounded-lg">
        <h1 class="text-3xl font-semibold col-span-2">Akun Saya</h1>

        <div class="space-y-1.5 col-span-2">
            <label for="full_name" class="font-medium text-sm">Foto Profil</label>
            <form id="update_photo" action="{{ route('profile.update', $user['id']) }}" method="POST" class="relative w-fit" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($user['photo'])
                <img src="{{ asset('storage/' . $user['photo']) }}" alt="{{ $user['full_name'] }} profile" class="object-cover rounded-md w-40 h-44" />
                @else
                <img src="blank-profile.webp" alt="blank profile" class="object-cover rounded-md w-32 h-32" />
                @endif

                <label for="photo" class="absolute -top-2 -right-2">
                    <label for="photo" class="tooltip" data-tip="Edit Foto">
                        <i class="iconoir-settings text-2xl cursor-pointer"></i>
                    </label>
                    <input type="file" id="photo" name="photo" class="hidden" accept="image/*" />
                </label>
            </form>
        </div>

        <div class="space-y-1.5">
            <label for="full_name" class="font-medium text-sm">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name" class="input input-bordered w-full" disabled value="{{ $user['full_name'] }}" disabled />
        </div>

        <div class="space-y-1.5">
            <label for="email" class="font-medium text-sm">Email</label>
            <input type="email" id="email" name="email" class="input input-bordered w-full" disabled value="{{ $user['email'] }}" />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="id_card_address" class="font-medium text-sm">Alamat KTP</label>
            <input type="text" id="id_card_address" name="id_card_address" class="input input-bordered w-full" disabled value="{{ $user['id_card_address'] }}" />
        </div>
        <div class="space-y-1.5">
            <label for="address" class="font-medium text-sm">Alamat Lengkap Saat Ini</label>
            <input type="text" id="address" name="address" class="input input-bordered w-full" disabled value="{{ $user['address'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="province" class="font-medium text-sm">Provinsi</label>
            <input type="text" id="province" name="province" class="input input-bordered w-full" disabled value="{{ $user['province'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="regency" class="font-medium text-sm">Kabupaten</label>
            <input type="text" id="regency" name="regency" class="input input-bordered w-full" disabled value="{{ $user['regency'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="district" class="font-medium text-sm">Kecamatan</label>
            <input type="text" id="district" name="district" class="input input-bordered w-full" disabled value="{{ $user['district'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="telephone_umber" class="font-medium text-sm">Nomor Telepon</label>
            <input type="number" id="telephone_number" name="telephone_number" class="input input-bordered w-full" disabled value="{{ $user['telephone_number'] }}" />
        </div>

        <div class="space-y-1.5 col-span-2">
            <label for="phone_number" class="font-medium text-sm">Nomor HP</label>
            <input type="number" id="phone_number" name="phone_number" class="input input-bordered w-full" disabled value="{{ $user['phone_number'] }}" />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="citizenship" class="font-medium text-sm">Kewarganegaraan</label>
            <select name="citizenship" id="citizenship" class="select select-bordered w-full" disabled value="{{ $user['citizenship'] }}">
                <option value="">Pilih ..</option>
                <option value="WNI Asli" @if($user['citizenship']=='WNI Asli' ) selected @endif>WNI Asli</option>
                <option value="WNI Keturunan" @if($user['citizenship']=='WNI Keturunan' ) selected @endif>WNI Keturunan</option>
                <option value="WNA" @if($user['citizenship']=='WNA' ) selected @endif>WNA</option>
            </select>

            <input type="text" id="other_country_citizenship" name="other_country_citizenship" class="input input-bordered w-full hidden" />
        </div>

        <div class="space-y-1.5">
            <label for="birth_of_date" class="font-medium text-sm">Tanggal Lahir</label>
            <input type="date" id="birth_of_date" name="birth_of_date" class="input input-bordered w-full" disabled value="{{ $user['birth_of_date'] }}" />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="birth_address" class="font-medium text-sm">Tempat Lahir</label>
            <input type="text" id="birth_address" name="birth_address" class="input input-bordered w-full" disabled value="{{ $user['birth_address'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="birth_province" class="font-medium text-sm">Provinsi Kelahiran</label>
            <input type="text" id="birth_province" name="birth_province" class="input input-bordered w-full" disabled value="{{ $user['birth_province'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="birth_regency" class="font-medium text-sm">Kota/Kabupaten Kelahiran</label>
            <input type="text" id="birth_regency" name="birth_regency" class="input input-bordered w-full" disabled value="{{ $user['birth_regency'] }}" />
        </div>

        <div class="space-y-1.5">
            <label for="other_country" class="font-medium text-sm">Negara Lain (jika tempat lahir diluar negeri)</label>
            <input type="text" id="other_country" name="other_country" class="input input-bordered w-full" value="{{ $user['other_country'] }}" disabled />
        </div>

        <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

        <div class="space-y-1.5">
            <label for="gender" class="font-medium text-sm">Jenis Kelamin</label>
            <select name="gender" id="gender" class="select select-bordered w-full" disabled disabled>
                <option value="">Pilih ..</option>
                <option value="Pria" @if($user['gender']=='Pria' ) selected @endif>Pria</option>
                <option value="Wanita" @if($user['gender']=='Wanita' ) selected @endif>Wanita</option>
            </select>
        </div>

        <div class="space-y-1.5">
            <label for="marriage_status" class="font-medium text-sm">Status Menikah</label>
            <select name="marriage_status" id="marriage_status" class="select select-bordered w-full" disabled disabled>
                <option value="">Pilih ..</option>
                <option value="Belum Menikah" @if($user['marriage_status']=='Belum Menikah' ) selected @endif>Belum Menikah</option>
                <option value="Menikah" @if($user['marriage_status']=='Menikah' ) selected @endif>Menikah</option>
                <option value="Lain-lain" @if($user['marriage_status']=='Lain-lain' ) selected @endif>Lain-lain (janda/duda)</option>
            </select>
        </div>

        <div class="space-y-1.5 col-span-2">
            <label for="religion" class="font-medium text-sm">Agama</label>
            <select name="religion" id="religion" class="select select-bordered w-full" disabled disabled>
                <option value="">Pilih ..</option>
                <option value="Islam" @if($user['religion']=='Islam' ) selected @endif>Islam</option>
                <option value="Katolik" @if($user['religion']=='Katolik' ) selected @endif>Katolik</option>
                <option value="Kristen" @if($user['religion']=='Kristen' ) selected @endif>Kristen</option>
                <option value="Hindu" @if($user['religion']=='Hindu' ) selected @endif>Hindu</option>
                <option value="Budha" @if($user['religion']=='Budha' ) selected @endif>Budha</option>
                <option value="Lain-lain" @if($user['religion']=='Lain-lain' ) selected @endif>Lain-lain</option>
            </select>
        </div>

    </div>
    <div class="shadow p-8 rounded-lg">
        <h1 class="text-3xl font-semibold col-span-2 mb-5">Aksi</h1>
        <a href="{{ route('registration-document', $user['id']) }}" class="btn btn-primary btn-outline">Bukti Pendaftaran <i class="iconoir-download text-xl"></i></a>
    </div>
</div>

<script>
    document.getElementById('photo').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('update_photo').submit();
        }
    });
</script>
@endsection