@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="mb-5 flex gap-3 justify-between">
        <a href="{{ route('student.create') }}" class="btn btn-primary"><i class="iconoir-plus text-xl"></i> Registrasi Mahasiswa Baru </a>
        <form action="{{ route('student.index') }}" method="get" class="join">

            <input type="text" name="search" id="search" class="input input-bordered join-item" placeholder="Cari mahasiswa..." />
            <button type="submit" class="btn btn-square btn-neutral join-item"><i class="iconoir-search text-xl"></i></button>
        </form>
    </div>
    <div class="overflow-x-auto rounded shadow">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Provinsi</th>
                    <th>Kabupaten / Kecamatan</th>
                    <th>Tanggal Lahir</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($students) == 0 && $search != '')
                <tr>
                    <td colspan="7" class="text-center">Tidak ada mahasiswa dengan nama <span class="font-bold">{{ $search }}</span></td>
                </tr>
                @endif

                @if(count($students) == 0 && $search == '')
                <tr>
                    <td colspan="7" class="text-center">Belum ada mahasiswa yang terdaftar</td>
                </tr>
                @endif
                @foreach ($students as $student)
                <tr>
                    <th>1</th>
                    <td>{{ $student['full_name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>{{ $student['province'] }}</td>
                    <td>{{ $student['regency'] }} / {{ $student['district'] }}</td>
                    <td>{{ $student['birth_of_date'] }}</td>
                    <td class="flex gap-1">
                        <a href="{{ route('student.show', $student['id']) }}" class="btn btn-neutral">Detail</a>
                        <a href="{{ route('student.edit', $student['id']) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection