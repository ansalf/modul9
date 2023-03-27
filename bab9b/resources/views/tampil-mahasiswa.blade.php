<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container text-center p-4">
        <h1>Data mahasiswa</h1>
        <div class="row">
            <div class="m-auto">
                <ol class="list-group">
                    @forelse ($mahasiswas as $mahasiswa)
                    <li class="list-froup-item">
                        {{ $mahasiswa->nama }} ({{ $mahasiswa->nim }}),
                        Tanggal Lahir: {{ $mahasiswa->tanggal_lahir }},
                        Tanggal Lahir: {{ $mahasiswa->tanggal_lahir }},
                        IPK: {{ $mahasiswa->ipk }}
                    </li>
                    @empty
                    <div class="alret alert-dark d-inline-block">
                        Tidak Ada Data....
                    </div>
                        
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
</body>
</html>