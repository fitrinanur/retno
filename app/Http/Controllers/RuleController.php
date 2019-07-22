<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Frequent;
use App\Rule;
use App\Setting;
use Phpml\Association\Apriori;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    private $setting;
    private $transaction;
    private $rule;
    private $frequent;

    public function __construct(Setting $setting, Transaction $transaction, Rule $rule, Frequent $frequent)
    {
        $this->middleware('auth');
        $this->setting = $setting;
        $this->transaction = $transaction;
        $this->rule = $rule;
        $this->frequent = $frequent;
    }

    public function index()
    {
        $data['min_conf'] = $this->setting->find('min_conf')->value;
        $data['min_sup'] = $this->setting->find('min_sup')->value;
        $data['rules'] = $this->rule->paginate(30);
        $data['support'] = $this->info();
        return view('rules.rule', $data);

    }

    public function info()
    {
        $frequents = $this->frequent->get();

        $avg_support = 0;
        if ($frequents) {
            $avg_support = $frequents->avg('support');
        }

        // dd($frequents->avg('support'));
        return $avg_support;
    }

    public function proses(Request $request)
    {
        $min_conf = $this->setting->find('min_conf');
        $min_conf->value = $request->min_conf;
        $min_conf->save();

        $min_sup = $this->setting->find('min_sup');
        $min_sup->value = $request->min_sup;
        $min_sup->save();

        $labels = [];
        $associator = new Apriori($request->min_sup/100, $request->min_conf/100);
        
        $associator->train($this->transaction->getData(), $labels);
       
        $rules = $associator->getRules();
    
        $rules = collect($rules)->map(function($val){
            return [
                'antecedent' => implode(',',$val['antecedent']),
                'consequent' => implode(',',$val['consequent']),
                'support' => $val['support'],
                'confidence' => $val['confidence']
            ];
        })->toArray();

        $this->rule->truncate();
        $this->rule->insert($rules);
        $freqs = $this->transaction->freqItem($request->min_sup);

        $this->frequent->truncate();
        $this->frequent->insert($freqs);

        return redirect('master/rule')->with('status', 'Rule berhasil diperbarui');
    }
}
