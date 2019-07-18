@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header" style="color: #636b6f;
                                padding: 10 25px;
                                font-size: 13px;
                                font-weight: 600;
                                letter-spacing: .1rem;
                                text-decoration: none;
                                text-transform: uppercase;">
                    <h3>Form Edit Member</h3>
                </div>
                <div class="card-body" style="padding:30px">
                    <form action="{{ route('member.update',$member) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputAddress">Nama</label>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Anang"
                                value="{{ $member->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <div class="input-group date datepicker">
                                <input type="text" name="birthday"
                                    class="form-control {{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                    value="{{ $member->birthday }}">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Nomor Handphone</label>
                            <input type="text" class="form-control" id="inputName" name="phone_number"
                                value="{{$member->phone_number}}" placeholder="085768192xxx">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Email</label>
                            <input type="text" class="form-control" id="inputName" name="email"
                            value="{{$member->email}}"
                                placeholder="raka@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="address">{{ $member->address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="application/javascript">
    $(document).ready(function ($) {
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d',
            autoClose: true,
            todayHighlight: true,
        });
    });

</script>

@endpush
