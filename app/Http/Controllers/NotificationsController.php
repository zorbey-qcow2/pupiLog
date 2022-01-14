<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('login.notifications.index', compact('user'));
    }

}
