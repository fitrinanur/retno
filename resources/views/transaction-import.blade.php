@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- <div class="animated fadeIn"> --}}
        <div class="row">
            <div class="col-lg-6 offset-md-3">
                <div class="card">
                    <form action="{{url('/master/transaction/import')}}" enctype="multipart/form-data" method="post"
                        class="form-horizontal">
                        <div class="card-header">
                            <h4><i class="fa fa-align-justify"></i> Import Data Transaksi</h4>
                        </div>
                        <br />
                        <div class="form-group">
                            {{-- <div class="input-group"> --}}
                                {{-- <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span> --}}
                                <input type="file" id="input1-group1" name="import" class="form-control"
                                    placeholder="file"> {{csrf_field()}}
                            {{-- </div> --}}
                        </div>

                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-dot-circle-o"></i> Import</button>
                        <a href="{{ url('transaction.index') }}" class="btn btn-sm btn-inverse pull-right">
                            <i class="fa fa-dot-circle-o"></i> Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
