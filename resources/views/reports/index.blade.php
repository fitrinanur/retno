@extends('layouts.theme')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="text-center">
                <div class="row">
                    <div class="col-md-6">
                        <form method="get" id="apply_filter">
                            <div class="input-group mb-3">

                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Year</label>
                                </div>
                                <input type="hidden" name="daterange" value="{{ request('daterange') }}">
                                <select class="custom-select" id="inputGroupSelect02" name="year">
                                    <option selected>Choose...</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year }}" @if(request('year')==$year) selected @endif>{{ $year }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="input-group-append">
                                    <button class="btn btn-primary default" type="submit">Apply Year Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="get" id="apply_filter">
                            <div class="input-group">
                                <input type="hidden" name="year" value="{{ request('year') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button"><span
                                            class="simple-icon-calendar"></span></button>
                                </div>
                                <input type="text" class="form-control" name="daterange"
                                    value="{{ request('daterange') }}" id="range">
                                <div class="input-group-append">
                                    <button class="btn btn-primary default" type="submit">Apply Date Filter</button>
                                    <a class="btn btn-danger default" href="{{ route('reports.index') }}">Clear Date
                                        Filter</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('master/transaction/export') }}" method="">
                <button type="submit" name="type" value="transactions" class="btn btn-success"
                    style="float:right;margin-bottom:10px;"> <i class="fa fa-print"></i> Export Data Transaksi</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h3>Jumlah Total Transaksi @if(request('daterange') == null ) Tahun {{ $selectedYear }} @endif</h3>
                    {!! $transactionChart->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Download Laporan Data Master
                </div>
                <div class="card-body">
                    <form action="{{ url('master/transaction/export') }}" method="">
                        <button type="submit" name="type" value="treatments" class="btn btn-info"
                            style="float:right;margin:10px">
                            <i class="fa fa-print"></i> Export Data Treatment
                        </button>
                    </form>
                    <form action="{{ url('master/transaction/export') }}" method="">
                        <button type="submit" name="type" value="users" class="btn btn-info"
                            style="float:right;margin:10px">
                            <i class="fa fa-print"></i> Export Data User
                        </button>
                    </form>
                    <form action="{{ url('master/transaction/export') }}" method="">
                        <button type="submit" name="type" value="members" class="btn btn-info"
                            style="float:right;margin:10px">
                            <i class="fa fa-print"></i> Export Data Member
                        </button>
                    </form>
                    <form action="{{ url('master/transaction/export') }}" method="">
                        <button type="submit" name="type" value="rules" class="btn btn-dark"
                            style="float:right;margin:10px">
                            <i class="fa fa-print"></i> Export Data Rule
                        </button>
                    </form>
                    <form action="{{ url('master/transaction/export') }}" method="">
                        <button type="submit" name="type" value="frequents" class="btn btn-dark"
                            style="float:right;margin:10px">
                            <i class="fa fa-print"></i> Export Data Frequent
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(function () {
        $('#range').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
        }, function (start, end, label) {
            // $( "#apply_filter" ).submit();
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    });

</script>
@endpush
