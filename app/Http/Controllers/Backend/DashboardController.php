<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        
    }
    public function index(){
        $template='Backend.home.index';
        return view('Backend.dashboard.layout', compact('template'));
    }
}
