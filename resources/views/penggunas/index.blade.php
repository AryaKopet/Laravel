<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pengguna</h3>
                    <h5 class="text-center"><a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=db_laravel_10&table=penggunas" target="_blank">Lihat database</a></h5>         
                    <hr>
                </div>  
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('penggunas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA PENGGUNA</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID PENGGUNA</th>
                                <th scope="col">NAMA LENGKAP</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">PASSWORD</th>
                                <th scope="col" class="text-center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($penggunas as $pengguna)
                                <tr>
                                    <td>{{ $pengguna->id_pengguna }}</td>
                                    <td>{{ $pengguna->nama_lengkap }}</td>
                                    <td>{{ $pengguna->alamat }}</td>
                                    <td>{{ $pengguna->jenis_kelamin }}</td>
                                    <td>{{ $pengguna->username }}</td>
                                    <td>{{ $pengguna->password }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penggunas.destroy', $pengguna->id_pengguna) }}" method="POST">
                                            <a href="{{ route('penggunas.show', $pengguna->id_pengguna) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('penggunas.edit', $pengguna->id_pengguna) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mt-2">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Tidak ada data pengguna
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $penggunas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>