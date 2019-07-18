<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:add-advertisement', ['only' => ['create']]);
        // $this->middleware('permission:edit-advertisement',   ['only' => ['edit']]);
        // $this->middleware('permission:delete-advertisement',   ['only' => ['destroy']]);

        // $this->advertisement = new AdvertisementService();
    }

    public function index()
    {
        return view ('data.index');
    }
}
