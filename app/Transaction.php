<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table ='transactions';
    protected $fillable = [
        'transaction_code',
        'member_name',
        'treatment_name',
        'catatan',
        'extra',
        'total'
    ];

    public function getData()
    {
        $data = Transaction::groupBy('transaction_code')->selectRaw('group_concat(code_treatment) as group_code_treatment, group_concat(treatment_name) as group_treatment_name')
            ->get()->map(function($row) {
                $group_code_treatment = explode(',',$row['group_code_treatment']);
                $group_treatment_name = explode(',',$row['group_treatment_name']);
                $data = [];
                foreach ($group_treatment_name as $key => $value) {
                    $value = trim($value);
                    $kode = trim($group_code_treatment[$key]);
                    $data[] = "$kode-$value";
                }
                return array_values(array_sort($data, function($value) {
                    return $value;
                }));
            })->toArray();
           return $data;
    }

    public function getData2($member_id)
    {

        $data = Transaction::where('member_id',$member_id)->groupBy('transaction_code')->selectRaw('group_concat(code_treatment) as group_code_treatment, group_concat(treatment_name) as group_treatment_name')
            ->get()->map(function($row) {
                $group_code_treatment = explode(',',$row['group_code_treatment']);
                $group_treatment_name = explode(',',$row['group_treatment_name']);
                $data = [];
                foreach ($group_treatment_name as $key => $value) {
                    $value = trim($value);
                    $kode = trim($group_code_treatment[$key]);
                    $data[] = "$kode-$value";
                }
                return array_values(array_sort($data, function($value) {
                    return $value;
                }));
            })->toArray();
            // dd($data);
           return $data; 
    }


    public function freqItem($min_sub)
    {
        $min_sub = $min_sub/100;
        $total_trans = Transaction::groupBy('transaction_code')->get(['transaction_code'])->count();
        // dd($total_trans);
        $data = Transaction::selectRaw('count(code_treatment) as freq,code_treatment,treatment_name')->groupBy('code_treatment','treatment_name')->get();
        // dd($data);
        $result = $data->filter(function($value, $key) use ($total_trans, $min_sub) {
            return ($value['freq']/$total_trans) >= $min_sub;
        })->map(function($value, $key) use ($total_trans){
            $value['support'] = $value['freq'] / $total_trans;
            return $value;
        })->toArray();
        return $result;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function umum()
    {
        return $this->belongsTo(Umum::class);
    }
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
