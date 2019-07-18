@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Halaman Admin</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(Auth()->user()->name === "Admin")
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">

                                    <p style="text-align:center;color:gray;font-size:12px;">Data Master</p>
                                    <h3 style="text-align:center"><a href="{{ route('master.dashboard') }}"><i
                                                class="fa fa-2x fa-home"></i></a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:12px;">Transaksi</p>
                                    <h3 style="text-align:center"><a href="{{ route('transaction.index')}}"><i
                                                class="fa fa-2x fa-book"></i></a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:11px;">Laporan</p>
                                    <h3 style="text-align:center"><a href="{{ route('reports.index') }}"><i
                                                class="fa fa-2x fa-file"></i> </a></h3>
                                </div>
                            </div>
                        </div>
                        @elseif(Auth()->user()->name === "Owner")
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:11px;">Laporan</p>
                                    <h3 style="text-align:center"><a href="{{ route('reports.index') }}"><i
                                                class="fa fa-2x fa-file"></i> </a></h3>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:12px;">Transaksi</p>
                                    <h3 style="text-align:center"><a href="{{ route('transaction.index')}}"><i
                                                class="fa fa-2x fa-book"></i></a></h3>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
