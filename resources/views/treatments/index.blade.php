@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title-header">
        <div class="row">
            <div class="col-lg-6" style="float:left">
                <h3>Daftar Data Treatment</h3>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-sm btn-primary" style="float:right;" href="{{route('treatment.create')}}" > Tambah Data</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="content">
        <table class="table table-hover table-sm table-bordered table-striped">
            <caption>Daftar Data Treatment</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treatments as $treatment)
                <tr>
                    <th scope="row">{{ $treatment->id }}</th>
                    <td>{{$treatment->name}}</td>
                    <td>{{$treatment->category}}</td>
                    <td>{{$treatment->price}}</td>
                    <td>
                        <form action="{{ route('treatment.destroy',$treatment->id) }}" method="POST">
                            {{-- <a class="btn `btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-warning btn-sm" href="{{ route('treatment.edit',$treatment->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

