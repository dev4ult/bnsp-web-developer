@extends('layouts.app')

@section('content')

<div class="p-8">
    <h1 class="font-bold text-2xl">Selamat Datang, {{ $username }}</h1>
    <div class="grid grid-flow-row sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mt-8 gap-4">
        @if($is_admin)
        <a href="{{ route('student.index') }}" class="shadow p-5 rounded flex items-center gap-3 hover:shadow-md">
            <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-full bg-gray-100 grid place-content-center">
                <i class="iconoir-community text-3xl lg:text-4xl"></i>
            </div>
            <div>
                <h2 class="font-semibold text-xl mb-1">Data Mahasiswa</h2>
                <p class="text-gray-400 text-sm">Lihat pendaftaran mahasiswa</p>
            </div>
        </a>
        @endif
        <a href="{{ route('profile.index') }}" class="shadow p-5 rounded flex items-center gap-3 hover:shadow-md">
            <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-full bg-gray-100 grid place-content-center">
                <i class="iconoir-user text-3xl lg:text-4xl"></i>
            </div>
            <div>
                <h2 class="font-semibold text-xl mb-1">Profil</h2>
                <p class="text-gray-400 text-sm">Lihat akun saya</p>
            </div>
        </a>
    </div>
</div>

@endsection