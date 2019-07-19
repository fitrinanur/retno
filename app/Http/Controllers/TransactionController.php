<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use App\Member;
use App\Treatment;
use Carbon\Carbon;

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
        if($request->type == 'member'){
            $transaction = new \App\Transaction();
            $transaction->transaction_code = $request->code;
            $transaction->user_id = $request->user;
            $transaction->member_id = $request->member_id;
            $transaction->treatment_id = $request->category;
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
            $transaction->treatment_id = $request->treatment_id;
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
            // $transaction->member()->sync($transaction->member_id);
            
           

            return redirect()->route('transaction.index');

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
        //
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
