@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title-header">
        <div class="row">
            <div class="col-lg-6" style="float:left">
                <h3>Daftar Data Treatment</h3>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-sm btn-primary" style="float:right;" href="{{route('transaction.create')}}" > Tambah Data</a>
                <a class="btn btn-sm btn-primary" style="float:right;margin-left:10px" href="{{url('transaction/import')}}" > Import Data</a>
                <a class="btn btn-sm btn-success" style="float:right;" href="{{url('transaction/export')}}" > Export Data</a>
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
                    <th scope="col">Code</th>
                    <th scope="col">Member</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Extra Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">User</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>{{$transaction->transaction_code}}</td>
                    @if($transaction->member_id == 0)
                    <td>UMUM</td>
                    @else
                    <td>  {{ $transaction->member->name }}</td>
                    @endif
                    @if($transaction->member_id == 0)
                    <td>UMUM</td>
                    @else
                    <td>  {{ $transaction->member->no_member }}</td>
                    @endif
                    <td>{{$transaction->treatment->name}}</td>
                    <td>{{$transaction->treatment->category}}</td>
                    <td>{{$transaction->treatment->price}}</td>
                    <td>{{$transaction->extra}}</td>
                    <td>{{$transaction->total}}</td>
                    <td>{{$transaction->catatan}}</td>
                    <td>{{$transaction->user->name}}</td>
                    <td>
                        <form action="{{ route('transaction.destroy',$transaction->id) }}" method="POST">
                            {{-- <a class="btn `btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                            <a class="btn btn-warning btn-sm" href="{{ route('transaction.edit',$transaction->id) }}">Edit</a>
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