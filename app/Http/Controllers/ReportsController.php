<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Transaction;


class ReportsController extends Controller
{
    public function index()
    {
        $transactionChart = $this->TransactionChart();
        $years = $this->year();
        $selectedYear = $this->selectedYear();

        return view ('reports.index',compact('transactionChart','years','selectedYear'));
    }

    public function TransactionChart()
    {
        $months= $this->month();
        $datasets = collect();
        $dataMonthly = collect();
        $dataTransaction =collect();
        $range = $this->getRange();

        if($range != null) {
            $range = $this->label();
            foreach ($range as $value){
                $monthlyTransactionCount = Transaction::whereDate('created_at', $value)->count();
                $dataMonthly->push($monthlyTransactionCount);
            }
        }
        else {
            foreach ($months as $key => $month){
                $monthlyTransactionCount = Transaction::whereMonth('created_at', $key+1)
                    ->whereYear('created_at', $this->selectedYear())
                    ->count();
                $dataMonthly->push($monthlyTransactionCount);
            }
        }


        $dataTransaction->put('label', 'Jumlah Reservasi');
        $dataTransaction->put('borderColor', $this->rand_color());
        $dataTransaction->put('pointHoverBackgroundColor', '#fff');
        $dataTransaction->put('data', $dataMonthly);
        $datasets->push($dataTransaction);

        $chartjs = app()->chartjs
            ->name('reservationLineChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 100])
            ->labels($this->label())
            ->datasets(
                $datasets->toArray()
            )
            ->options([]);

            // dd($dataTransaction);
        return $chartjs;
    }

    public function month() {
        return array(
            'Januari',
            'Februari',
            'Maret',
            'April',
            'May',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
    }

    public function getRange()
    {
        if(request('daterange') != ""){
            $range = explode(' - ',request('daterange'));

            $start = Carbon::createFromFormat('m/d/Y', $range[0])->toDateString();
            $end = Carbon::createFromFormat('m/d/Y', $range[1])->toDateString();
            return [
                'startDate' => $start,
                'endDate' => $end
            ];
        }
        return false;
    }
    public function label()
    {
        $range = $this->getRange();
        if($range != null){
            $startDate = Carbon::parse($range['startDate']);
            $endDate = Carbon::parse($range['endDate']);
            $range = $this->generateDateRange($startDate, $endDate);
            $labels = $range;
        }else{
            $labels = $this->month();
        }

        return $labels;
    }
    public function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }

    public function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public function year()
    {
        $year = collect();

        for($i = 2018; $i < 2030; $i ++){
            $year->push($i);
        }

        return $year->toArray();
    }

    public function selectedYear()
    {
        $year = \request('year') ?: Carbon::now()->year;
        return $year;
    }

}
