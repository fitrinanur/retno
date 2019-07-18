@extends('layouts.app')

@section('content')
<div class="container">
        <div class="title-header">
            <div class="row">
                <div class="col-lg-6" style="float:left">
                    <h3>Daftar Data Member</h3>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-sm btn-primary" style="float:right;" href="{{route('member.create')}}" > Tambah Data</a>
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
                        <th scope="col">Member ID</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr>
                        <th scope="row">{{ $member->id }}</th>
                        <td>{{$member->name}}</td>
                        <td>{{$member->no_member}}</td>
                        <td>{{$member->birthday}}</td>
                        <td>{{$member->phone_number}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->address}}</td>
                        <td>
                            <form action="{{ route('member.destroy',$member->id) }}" method="POST">
                                {{-- <a class="btn `btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                                <a class="btn btn-warning btn-sm" href="{{ route('member.edit',$member->id) }}">Edit</a>
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