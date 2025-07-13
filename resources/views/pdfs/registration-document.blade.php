<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bukti Pendaftaran {{ $user['full_name'] }}</title>
</head>

<body>
    <h1 style="text-align: center; margin: 2rem 0rem">BUKTI PENDAFTARAN MAHASISWA</h1>

    <hr style="margin: 1rem" />

    <div style="text-align: center; width: 100%; margin: 1.5rem">
        <!-- Inline-block container to hold image + table -->
        <div style="display: inline-block; text-align: left; gap: 2rem;">
            <div style="display: flex; gap: 1rem">
                <img src="{{ $photo }}" width="130" height="150" alt="profile" />
                <table border="0" style="border-collapse: collapse; margin-left: 1rem;">
                    <tr>
                        <td style="vertical-align: top">Nama Lengkap</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['full_name'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-bottom: 1rem">Email</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['email'] }}</td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;">Alamat KTP</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['id_card_address'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Alamat Lengkap Saat Ini</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['address'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Provinsi</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['province'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Kabupaten / Kota</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['regency'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-bottom: 1rem">Kecamatan</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['district'] }}</td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;">Nomor Telepon</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['telephone_number'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-bottom: 1rem">Nomor HP</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['phone_number'] }}</td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;">Kewarganegaraan</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['citizenship'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-bottom: 1rem">Tanggal Lahir</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['birth_of_date'] }}</td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;">Tempat Lahir</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['birth_address'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Provinsi Kelahiran</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['birth_province'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">Kabupaten / Kota Kelahiran</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['birth_regency'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-bottom: 1rem">Negara (jika lahir diluar negeri)</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['other_country'] }}</td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;">Jenis Kelamin</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['gender'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Status Menikah</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['marriage_status'] }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Agama</td>
                        <td style="vertical-align: top; padding: 0 1rem">:</td>
                        <td style="vertical-align: top;">{{ $user['religion'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>