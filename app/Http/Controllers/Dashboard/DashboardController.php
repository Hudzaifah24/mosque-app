<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kajian;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kajians = Kajian::paginate(5);

        return view('pages.dashboard.contents.dashboard', compact('kajians'));
    }
}
