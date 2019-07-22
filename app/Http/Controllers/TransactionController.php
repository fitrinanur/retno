<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Member;
use App\Treatment;
use App\Rule;
use App\Frequent;
use Carbon\Carbon;
use App\Http\Imports\TransactionImports;
use App\Exports\TransactionReports;
use Excel;
use PDF;

class TransactionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware ='auth';
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $users   = User::all();
        $treatments = Treatment::all();
        $types      = $this->types();
        $uniqid = strtoupper(substr(uniqid(), -5));
        $code = 'TRS'.$uniqid; 

        return view('transaction.create',compact('members','users','treatments','types','code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       
        $treatments = Treatment::whereIn('id', $request->category)->get();
        // dd($treatments);
        foreach($treatments as $treatment){
            if($request->type == 'member'){
                $transaction = new \App\Transaction();
                $transaction->transaction_code = $request->code;
                $transaction->user_id = $request->user;
                $transaction->member_id = $request->member_id;
                $transaction->member_name = $request->member_name;
                $transaction->treatment_id = $treatment->id;
                $transaction->code_treatment = $treatment->code_treatment;
                $transaction->treatment_name = $treatment->name;
                $transaction->catatan = $request->notes;

                $transaction->extra = $request->extra;
                
                $transaction->total = $request->total;
                $transaction->save();
            }else{
                // dd($request->all());
                $date = Carbon::now()->format('Ymd');
                $uniqid = strtoupper(substr(uniqid(), -5));
                $code = $date.$uniqid;

                $transaction = new \App\Transaction();
                $transaction->transaction_code = $request->code;
                $transaction->user_id = $request->user;
                $transaction->member_id = 0;
                $transaction->member_name = 'UMUM';
                $transaction->treatment_id = $treatment->id;
                $transaction->code_treatment = $treatment->code_treatment;
                $transaction->treatment_name = $treatment->name;
                $transaction->catatan = $request->notes;
                $transaction->extra = $request->extra;
                $transaction->total = $request->total;
                $transaction->save();
                $transaction->member()->create([
                    'name'           => $request->member_name,
                    'no_member'      => 'M'. $code,
                    // 'birthday'       => $request->birthday,
                    'phone_number'   => $request->phone_number,
                    'email'          => $request->email,
                    'address'        => $request->address,
                ]);
            }
        }
        
        return redirect()->route('transaction.index');
        
    }

    public function getCategory()
    {
        $selectedNumbers = request()->get('selectednumbers');
        $treatments = Treatment::whereIn('id',$selectedNumbers)->get();
        $price =[];
        $name = [];
        $code = [];
        foreach($treatments as $treatment){
            $price[] = $treatment->price;
            $code[]   = $treatment->code_treatment;
            $name[]  = $treatment->name;
        }
        $treatment_price = array_sum($price);
        
        return ['price'=>$treatment_price,'code' => $code, 'name'=>$name]; 
    }
    public function getCategory2()
    {
        $selectedNumbers = request()->get('selectednumbers');
        $treatments = Treatment::whereIn('id',$selectedNumbers)->get();
        $price =[];
        $name = [];
        $code = [];
        foreach($treatments as $treatment){
            $price[] = $treatment->price;
            $code[]   = $treatment->code_treatment;
            $name[]  = $treatment->name;
        }
        $treatment_price = array_sum($price);
        
        return ['price'=>$treatment_price,'code' => $code, 'name'=>$name];
    }

    public function import()
    {
        return view('transaction-import');
    }

    public function doImport(TransactionImports $import)
    {
        $results = $import->get();
        // Transaction::truncate();
        Transaction::insert($results->toArray());
        return redirect('transaction')->with('status', 'Import transaksi berhasil');
    }

    public function export(Request $request)
    {
        $transactions = Transaction::all();
        $users = User::all();
        $members = Member::all();
        $rules = Rule::all();
        $treatments = Treatment::all();
        $date = Carbon::now()->format('Y-m-d');
        $userGenerate = Auth()->user()->name;
        if($request->type == 'transactions'){
            $pdf = PDF::loadView('reports.transactions', compact('transactions','date','userGenerate'));
            return $pdf->stream('Transaction Salon.pdf');
        }elseif($request->type == 'users'){
            $pdf = PDF::loadView('reports.users', compact('users','date','userGenerate'));
            return $pdf->stream('Daftar User.pdf');
        }elseif($request->type == 'members'){
            $pdf = PDF::loadView('reports.members', compact('members','date','userGenerate'));
            return $pdf->stream('Daftar Member.pdf');
        }elseif($request->type == 'rules'){
            $pdf = PDF::loadView('reports.rules', compact('rules','date','userGenerate'));
            return $pdf->stream('Table Rules.pdf');
        }else{
            $pdf = PDF::loadView('reports.frequents', compact('frequents','date','userGenerate'));
            return $pdf->stream('Table Frequent.pdf');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('transaction.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index');
    }

    public function types()
    {
        return $types =
        [
            '1' => 'face',
            '2' => 'body',
            '3' => 'hair',
            '4' => 'special'
        ];
    }
}
