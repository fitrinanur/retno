@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Frequent</h4>
                </div><br>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Freq Item</th>
                                <th>Support</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($freqs as $freq)
                            <tr>
                                <td>{{$freq->code_treatment}}</td>
                                <td>{{$freq->treatment_name}}</td>
                                <td>{{$freq->freq}}</td>
                                <td>{{$freq->support}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
