<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\DonateHistory;
use App\Models\User;
use Illuminate\Http\Request;

class DonateHistoryController extends Controller
{
    public function index()
    {
        $donations = DonateHistory::with('user', 'blood', 'district', 'upazila', 'union')->latest()->paginate(20);

        return view('admin.donate.index', compact('donations'));
    }
}
