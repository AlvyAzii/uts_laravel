@extends('toko_buku.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Toko Buku</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('toko_buku.create') }}"> Tambah Buku</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $buku)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $buku->judul_buku }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ $buku->penerbit }}</td>
            <td>
                <form action="{{ route('toko_buku.destroy',$buku->id) }}" method="POST">   
                    <a class="btn btn-primary" href="{{ route('toko_buku.edit',$buku->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection