@extends('layouts.theme')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Simulasi Pembelian</h3>
                    <form action="{{url('master/simulasi/proses')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pilih Treatment</label>
                            <select id="multiple-select" name="treatment[]" multiple class="form-control" size="40">
                                @foreach($transactions as $transaction)
                                <option value="{{$transaction->code_treatment.'-'.$transaction->treatment_name}}">
                                    {{$transaction->treatment_name}}</option>
                                @endforeach
                            </select>
                            {{csrf_field()}}
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                            Proses</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Perhitungan --}}
        <div class="col-lg-12">
            <div class="card" style="margin-top:10px;">
                <div class="card-body">
                    <h3>Perhitungan</h3>
                    <div>
                        @if (session('result'))
                        <h4>Setting</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Min Support</td>
                                    <td>Min Confidence</td>
                                </tr>
                                <tr>
                                    <td>{{session('result')['min_sup']/100}}</td>
                                    <td>{{session('result')['min_conf']/100}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Frequent Item</h4>
                        <p>Kemunculan banyaknya barang yang memenuhi min support</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Treatment</th>
                                    <th>Nama Treatment</th>
                                    <th>Freq Item</th>
                                    <th>Support</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('result')['freqs'] as $freq)
                                <tr>
                                    <td>{{$freq->code_treatment}}</td>
                                    <td>{{$freq->treatment_name}}</td>
                                    <td>{{$freq->freq}}</td>
                                    <td>{{$freq->support}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <h4>Iteration</h4>
                        <p>combinasi dari frequent item yang memenuhi min support</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Treatment</th>
                                    <th>Support</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $iterations = session('result')['iterations']; @endphp
                                @foreach($iterations as $iteration)
                                <tr>
                                    <td>{{implode(' ', $iteration['item'])}}</td>
                                    <td>{{number_format($iteration['support'], 2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4>Rules</h4> --}}
                        <p>assosiatif rule dari iteration yang memenuhi min support</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Assosiatif</th>
                                    <th>Support</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $rules = session('result')['rules']; @endphp
                                @foreach($rules as $rule)
                                <tr>
                                    <td>{{implode(' ', $rule['antecedent'])}} -> {{implode(' ', $rule['consequent'])}}
                                    </td>
                                    <td>{{number_format($rule['support'], 2)}}</td>
                                    <td>{{number_format($rule['confidence'], 2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- rekomendasi --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>Hasil rekomendasi</h3>
                    @if (session('result'))
                    <h4>Data Pembelian</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Code Treatment</th>
                                <th>Nama Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('result')['treatments'] as $treatment)
                            @php $row = explode('-', $treatment)@endphp
                            
                            <tr>
                                <td>{{$row[0]}}</td>
                                <td>{{$row[1]}}</td>
                            </tr>
                            @endforeach
                            {{-- @dd(session('result')['treatments']); --}}
                        </tbody>
                    </table>
                    <h4>Data Rekomendasi</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Treatment</th>
                                <th>Nama Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($predicts as $no => $treatment)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$treatment}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="application/javascript">
    $(document).ready(function () {
        $('#multiple-select').select2();
    })

</script>
@endpush
