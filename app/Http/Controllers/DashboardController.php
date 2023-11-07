<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $ebookCount = Ebook::count();
        $userCount = User::count();

        return view('dashboard.index', compact('ebookCount', 'userCount'));
    }
    public function ebooks()
    {
        $ebooks = Ebook::withCount(['likes', 'reviews'])->get();
        return view('dashboard.ebooks', compact('ebooks'));
    }

    public function users()
    {
        $users = User::withCount('likes')->get();
        return view('dashboard.users', compact('users'));
    }
}
