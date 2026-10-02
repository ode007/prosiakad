<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak KRS</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #222;
            background: #f7f7f7;
        }

        .page {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 18px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 0;
        }

        .header small {
            color: #666;
        }

        .info {
            margin: 12px 0 15px 0;
        }

        .info td {
            padding: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 7px;
        }

        th {
            background: #efefef;
            text-align: center;
        }

        .center { text-align: center; }

        .footer {
            margin-top: 25px;
            font-size: 11px;
        }

        .signature {
            width: 100%;
            margin-top: 20px;
        }

        .signature td {
            padding-top: 30px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="page">

    <div class="header">
        <h2>KARTU RENCANA STUDI</h2>
        <small>Tahun Akademik 2025/2026</small>
    </div>

    <table class="info" width="100%">
        <tr>
            <td width="120"><strong>Nama</strong></td>
            <td>: {{ $mahasiswa->nama }}</td>
        </tr>
        <tr>
            <td><strong>NIM</strong></td>
            <td>: {{ $mahasiswa->nim }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Dosen</th>
                <th>Jadwal</th>
                <th>Ruangan</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($krs as $item)
            <tr>
                <td>{{ $item->kelasMk->mataKuliah->nama_mk }}</td>

                <td class="center">
                    {{ $item->kelasMk->kelas }}
                </td>

                <td>
                    {{ $item->kelasMk->dosen->nama ?? '-' }}
                </td>

                <td class="center">
                    {{ $item->kelasMk->hari }},
                    {{ substr($item->kelasMk->jam_mulai,0,5) }} -
                    {{ substr($item->kelasMk->jam_selesai,0,5) }}
                </td>

                <td class="center">
                    {{ $item->kelasMk->ruang }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak otomatis dari sistem — tidak memerlukan tanda tangan manual.
    </div>

</div>

</body>
</html>
