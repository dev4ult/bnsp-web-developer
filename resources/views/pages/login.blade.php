@extends('layouts.single');

@section('content')
<form action="{{ route('login.store') }}" method="POST" class="shadow p-8 min-w-52 rounded-lg">
    @csrf
    @method('POST')

    <h1 class="text-3xl font-semibold">Login</h1>
    <p class="mt-2">Login untuk dapat mengakses sistem.</p>



    <div class="space-y-1.5 mb-5 mt-5">
        <label for="email" class="font-medium text-sm">Email</label>
        <input type="email" id="email" name="email" class="input input-bordered w-full" required />
    </div>

    <div class="space-y-1.5">
        <label for="password" class="font-medium text-sm">Password</label>
        <input type="password" id="password" name="password" class="input input-bordered w-full" required />
    </div>

    <button type="submit" class="btn btn-block btn-primary mt-6">Login</button>
    <p class="text-xs mt-2 text-center">Belum punya akun mahasiswa? <a href="{{ route('registration.index') }}" class="link text-blue-500">Registrasi</a></p>
</form>
@endsection