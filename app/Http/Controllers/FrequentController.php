<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Frequent;

class FrequentController extends Controller
{
    private $frequent;

    public function __construct(Frequent $frequent)
    {
        $this->middleware('auth');
        $this->frequent = $frequent;
    }

    public function index()
    {
        $data['freqs'] = $this->frequent->get();
        return view('rules.frequent', $data);
    }
}
