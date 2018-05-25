<?php

namespace App\Http\Controllers\Admin;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function home()
    {
        $shops = Shop::all();
        return view('admin.dashboard', ['shops' => $shops]);
    }
}
