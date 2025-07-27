<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class DashboardAdminController extends Controller
{
    public function index(){
        $informasi = Informasi::first();
        return view('pages.admin.dashboard', compact('informasi'));
    }

}
