@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="card">
            <div class="card-header" style="color: #636b6f;
            padding: 10 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;">
                <h3>Form Data Jalan</h3>
            </div>
            <div class="card-body" style="padding:30px">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" class="form-control" id="inputName" name="name"
                            placeholder="Jl. Re Martapura"
                    value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="email" class="form-control" id="inputName" name="email"
                            placeholder="Jl. Re Martapura"
                    value="{{ $user->email }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Password</label>
                            <input type="password" class="form-control" id="inputEmail4" name="password" placeholder="0.28 m"
                        value="{{ $user->password }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="confirm_password"
                            value="{{ $user->password }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush
