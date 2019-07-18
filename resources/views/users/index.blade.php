@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title-header">
        <div class="row">
            <div class="col-lg-6" style="float:left">
                <h3>Daftar Data User</h3>
            </div>
            <div class="col-lg-6">
                {{-- <a class="btn btn-sm btn-primary" style="float:right;" href="{{route('user.create')}}" > Tambah Data</a> --}}
            </div>
        </div>
    </div>
    <hr>
    <div class="content">
        <table class="table table-hover table-sm table-bordered table-striped">
            <caption>Daftar Data User</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                            {{-- <a class="btn `btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-warning btn-sm" href="{{ route('user.edit',$user->id) }}">Edit</a>
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

