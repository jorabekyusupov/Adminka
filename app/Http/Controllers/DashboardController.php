<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('pages.admin.home.dashboard');
    }
}
