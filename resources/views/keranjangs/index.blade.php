<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Keranjang Anda</h3>
                    <h5 class="text-center"><a href="http://localhost/phpmyadmin/index.php?route=/table/structure&db=db_laravel_10&table=keranjangs" target="_blank">Lihat database</a></h5>         
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('keranjangs.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PESANAN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">ID KERAJANG</th>
                                <th scope="col">ID PENGGUNA</th>
                                <th scope="col">ID BARANG</th>
                                <th scope="col">QTY</th>
                                <th scope="col" class="text-center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($keranjangs as $keranjang)
                                <tr>
                                    <td>{{ $keranjang->id_keranjang }}</td>
                                    <td>{{ $keranjang->id_pengguna }}</td>
                                    <td>{{ $keranjang->id_barang }}</td>
                                    <td>{{ $keranjang->qty }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('keranjangs.destroy', $keranjang->id_keranjang) }}" method="POST">
                                            <a href="{{ route('keranjangs.show', $keranjang->id_keranjang) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('keranjangs.edit', $keranjang->id_keranjang) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Keranjang Kosong
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $keranjangs->links() }}
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