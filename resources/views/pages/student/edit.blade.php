@extends('layouts.app')

@section('content')
<div class="p-8">
    <a href="{{ route('student.index') }}" class="btn btn-neutral btn-outline mb-5">
        <i class="iconoir-arrow-left"></i> Kembali
    </a>
    <div class="shadow p-8 rounded-lg">


        <h1 class="text-3xl font-semibold mb-5">Edit Informasi Mahasiswa</h1>

        <div class="space-y-1.5 mb-5">
            <label for="photo" class="font-medium text-sm">Foto Profil</label>
            <form id="update_photo" action="{{ route('update-profile-student', $student['id']) }}" method="POST" class="relative w-fit" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($student['photo'])
                <img src="{{ asset('storage/' . $student['photo']) }}" alt="{{ $student['full_name'] }} profile" class="object-cover rounded-md w-40 h-44" />
                @else
                <img src="{{ asset('blank-profile.webp') }}" alt="blank profile" class="object-cover rounded-md w-32 h-32" />
                @endif

                <label for="photo" class="absolute -top-2 -right-2">
                    <label for="photo" class="tooltip" data-tip="Edit Foto">
                        <i class="iconoir-settings text-2xl cursor-pointer"></i>
                    </label>
                    <input type="file" id="photo" name="photo" class="hidden" accept="image/*" />
                </label>
            </form>
        </div>

        <form class="grid grid-flow-row grid-cols-2 col-span-2 gap-x-5 gap-y-3" action="{{ route('student.update', $student['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-1.5">
                <label for="full_name" class="font-medium text-sm">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" class="input input-bordered w-full" value="{{ $student['full_name'] }}" required />
            </div>

            <div class="space-y-1.5">
                <label for="email" class="font-medium text-sm">Email</label>
                <input type="email" id="email" name="email" class="input input-bordered w-full" required value="{{ $student['email'] }}" />
            </div>

            <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

            <div class="space-y-1.5">
                <label for="id_card_address" class="font-medium text-sm">Alamat KTP</label>
                <input type="text" id="id_card_address" name="id_card_address" class="input input-bordered w-full" required value="{{ $student['id_card_address'] }}" />
            </div>
            <div class="space-y-1.5">
                <label for="address" class="font-medium text-sm">Alamat Lengkap Saat Ini</label>
                <input type="text" id="address" name="address" class="input input-bordered w-full" required value="{{ $student['address'] }}" />
            </div>

            <div class="space-y-1.5">
                <label for="province" class="font-medium text-sm">Provinsi *</label>
                <select name="province" id="province" class="select select-bordered w-full" required>
                    <option value="">Pilih ...</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province['provinsi'] }}" @if($province['provinsi']==$student['province']) selected @endif>{{ $province['provinsi'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label for="regency" class="font-medium text-sm">Kota/Kabupaten *</label>
                <select name="regency" id="regency" class="select select-bordered w-full" required>
                    <option value="">Pilih ...</option>
                    @foreach ($regencies as $regency)
                    <option value="{{ $regency['nama_wilayah'] }}" @if($regency['nama_wilayah']==$student['regency']) selected @endif>{{ $regency['nama_wilayah'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label for="district" class="font-medium text-sm">Kecamatan</label>
                <input type="text" id="district" name="district" class="input input-bordered w-full" required value="{{ $student['district'] }}" />
            </div>

            <div class="space-y-1.5">
                <label for="telephone_umber" class="font-medium text-sm">Nomor Telepon</label>
                <input type="number" id="telephone_number" name="telephone_number" class="input input-bordered w-full" required value="{{ $student['telephone_number'] }}" />
            </div>

            <div class="space-y-1.5 col-span-2">
                <label for="phone_number" class="font-medium text-sm">Nomor HP</label>
                <input type="number" id="phone_number" name="phone_number" class="input input-bordered w-full" required value="{{ $student['phone_number'] }}" />
            </div>

            <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

            <div class="space-y-1.5">
                <label for="citizenship" class="font-medium text-sm">Kewarganegaraan</label>
                <select name="citizenship" id="citizenship" class="select select-bordered w-full" required value="{{ $student['citizenship'] }}">
                    <option value="">Pilih ..</option>
                    <option value="WNI Asli" @if($student['citizenship']=='WNI Asli' ) selected @endif>WNI Asli</option>
                    <option value="WNI Keturunan" @if($student['citizenship']=='WNI Keturunan' ) selected @endif>WNI Keturunan</option>
                    <option value="WNA" @if($student['citizenship']=='WNA' ) selected @endif>WNA</option>
                </select>

            </div>

            <div class="space-y-1.5">
                <label for="birth_of_date" class="font-medium text-sm">Tanggal Lahir</label>
                <input type="date" id="birth_of_date" name="birth_of_date" class="input input-bordered w-full" required value="{{ $student['birth_of_date'] }}" />
            </div>

            <input type="text" id="other_country_citizenship" name="other_country_citizenship" class="input input-bordered col-span-2 w-full @if($student['citizenship'] != 'WNA') hidden @endif" placeholder="Nama negaranya..." value="{{ $student['other_country_citizenship'] }}" />


            <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

            <div class="space-y-1.5">
                <label for="birth_address" class="font-medium text-sm">Kota/Kabupaten Kelahiran</label>
                <input type="text" id="birth_address" name="birth_address" class="input input-bordered w-full" required value="{{ $student['birth_address'] }}" />
            </div>

            <div class="space-y-1.5">
                <label for="birth_province" class="font-medium text-sm">Provinsi *</label>
                <select name="birth_province" id="birth_province" class="select select-bordered w-full" required>
                    <option value="">Pilih ...</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province['provinsi'] }}" @if($province['provinsi']==$student['birth_province']) selected @endif>{{ $province['provinsi'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label for="birth_regency" class="font-medium text-sm">Kota/Kabupaten *</label>
                <select name="birth_regency" id="birth_regency" class="select select-bordered w-full" required>
                    <option value="">Pilih ...</option>
                    @foreach ($regencies as $regency)
                    <option value="{{ $regency['nama_wilayah'] }}" @if($regency['nama_wilayah']==$student['birth_regency']) selected @endif>{{ $regency['nama_wilayah'] }}</option>
                    @endforeach
                </select>
            </div>



            <div class="space-y-1.5">
                <label for="other_country" class="font-medium text-sm">Negara Lain (jika tempat lahir diluar negeri)</label>
                <input type="text" id="other_country" name="other_country" class="input input-bordered w-full" value="{{ $student['other_country'] }}" />
            </div>

            <hr class="col-span-2 border-gray-200 border-[1px] my-2" />

            <div class="space-y-1.5">
                <label for="gender" class="font-medium text-sm">Jenis Kelamin</label>
                <select name="gender" id="gender" class="select select-bordered w-full" required required>
                    <option value="">Pilih ..</option>
                    <option value="Pria" @if($student['gender']=='Pria' ) selected @endif>Pria</option>
                    <option value="Wanita" @if($student['gender']=='Wanita' ) selected @endif>Wanita</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label for="marriage_status" class="font-medium text-sm">Status Menikah</label>
                <select name="marriage_status" id="marriage_status" class="select select-bordered w-full" required required>
                    <option value="">Pilih ..</option>
                    <option value="Belum Menikah" @if($student['marriage_status']=='Belum Menikah' ) selected @endif>Belum Menikah</option>
                    <option value="Menikah" @if($student['marriage_status']=='Menikah' ) selected @endif>Menikah</option>
                    <option value="Lain-lain" @if($student['marriage_status']=='Lain-lain' ) selected @endif>Lain-lain (janda/duda)</option>
                </select>
            </div>

            <div class="space-y-1.5 col-span-2">
                <label for="religion" class="font-medium text-sm">Agama</label>
                <select name="religion" id="religion" class="select select-bordered w-full" required required>
                    <option value="">Pilih ..</option>
                    <option value="Islam" @if($student['religion']=='Islam' ) selected @endif>Islam</option>
                    <option value="Katolik" @if($student['religion']=='Katolik' ) selected @endif>Katolik</option>
                    <option value="Kristen" @if($student['religion']=='Kristen' ) selected @endif>Kristen</option>
                    <option value="Hindu" @if($student['religion']=='Hindu' ) selected @endif>Hindu</option>
                    <option value="Budha" @if($student['religion']=='Budha' ) selected @endif>Budha</option>
                    <option value="Lain-lain" @if($student['religion']=='Lain-lain' ) selected @endif>Lain-lain</option>
                </select>
            </div>

            <hr class="col-span-2 border-gray-200 border-[1px] my-2" />


            <div class="space-y-1.5 col-span-2">
                <label for="password" class="font-medium text-sm">Password (jika ingin mengubah password)</label>
                <input type="password" id="password" name="password" class="input input-bordered w-full" />
            </div>


            <button type="submit" class="btn btn-block btn-primary mt-6 col-span-2">Update Informasi</button>
        </form>


    </div>
</div>

<script>
    document.getElementById('photo').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('update_photo').submit();
        }
    });

    document.querySelector('#citizenship').addEventListener('change', function(e) {
        console.log(e.target.value);
        if (e.target.value == 'WNA') {
            document.querySelector('#other_country_citizenship').classList.remove('hidden');
        } else {
            document.querySelector('#other_country_citizenship').classList.add('hidden');
        }
    })
</script>
@endsection