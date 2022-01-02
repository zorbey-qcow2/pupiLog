<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Show user online status.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.onlinepeople', compact('users'));
    }

    /**
     * Show user online status.
     */
    public function status()
    {
        $users = User::all();

        foreach ($users as $user) {

            if (Cache::has('user-is-online-' . $user->id))
                echo $user->username . " şu an online. Son hareket: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
            else {
                if ($user->last_seen != null) {
                    echo $user->username . " şu an offline. Son hareket: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
                } else {
                    echo $user->username . " şu an offline. Son hareket: Veri yok ";
                }
            }
        }
    }

    /**
     * Live status page.
     */
    public function liveStatusPage()
    {
        $users = User::all();
        return view('live', compact('users'));
    }

    /**
     * Live status.
     */
    public function liveStatus($user_id)
    {
        // get user data
        $user = User::find($user_id);

        // check online status
        if (Cache::has('user-is-online-' . $user->id))
            $status = 'Online';
        else
            $status = 'Offline';

        // check last seen
        if ($user->last_seen != null)
            $last_seen = Carbon::parse($user->last_seen)->diffForHumans() . " hareket etti.";
        else
            $last_seen = "Veri yok";

        // response
        return response()->json([
            'status' => $status,
            'last_seen' => $last_seen,
        ]);
    }
}
