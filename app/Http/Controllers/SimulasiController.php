<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Frequent;
use App\Setting;
use App\Treatment;
use Illuminate\Http\Request;
use Phpml\Association\Apriori;

class SimulasiController extends Controller
{
    private $transaction;
    private $setting;
    private $frequent;
    private $treatment;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Treatment $treatment,Transaction $transaction, Setting $setting, Frequent $frequent)
    {
        // ambil data barang,setting,frequent
        //login only
        $this->middleware('auth');
        $this->transaction = $transaction;
        $this->treatment = $treatment;
        $this->setting = $setting;
        $this->frequent = $frequent;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transactions'] = $this->transaction->groupBy(['transaction_code','code_treatment','treatment_name'])->orderBy('transaction_code','asc')->get(['transaction_code','code_treatment','treatment_name']);
    
        $predicts = [];
        if (session('result')['predicts']) {
            $predicts = session('result')['predicts'];
        }

        $data['predicts'] = $predicts;
        return view('simulasi.simulasi', $data);
    }

    public function proses(Request $request)
    {
        $treatments = $request->treatment;
    
        $min_conf = $this->setting->find('min_conf')->value;
        $min_sup = $this->setting->find('min_sup')->value;
        $associator = new Apriori($min_sup / 100, $min_conf / 100);
        //get data sample dari import barang
        $associator->train($this->transaction->getData(), []);
        // combination
        $predicts = [];
        $num = count($treatments);
        // dd($num);
        $total = pow(2, $num);
        for ($i = 0; $i < $total; $i++) {
            for ($j = 0; $j < $num; $j++) {
                if (pow(2, $j) & $i)
                    $combinations[$i][] = $treatments[$j];
            }
        }

        foreach ($combinations as $combination) {
            $result = $associator->predict($combination);
            if ($result) {
               
                $predicts[] = $result;
            }
        }
        // dd($predicts);

        $collections = collect($predicts)
            // merge array
            ->flatten()
            // remove duplicate items
            ->unique()
            // remove if item is exist in item request
            ->reject(function($value) use ($treatments){
                return in_array($value, $treatments);
            })
            ->mapWithKeys(function($value){
                $values = explode('-', $value);
                return [$values[0] => $values[1]];
            })
            ->all();
            // dd($collections);
            
        $data = [
            'predicts' => $collections,
            'treatments' => $treatments,
            'freqs' => $this->frequent->get(),
            'min_conf' => $min_conf,
            'min_sup' => $min_sup,
            // 'iterations' => array_key_exists('frequent_support', $associator) ? $associator->debug['frequent_support'] : [],
            'rules' => $associator->getRules()
        ];
        // dd($data);
        return redirect('master/simulasi')->with('result', $data);
    }
}
