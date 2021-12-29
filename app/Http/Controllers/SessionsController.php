<?php

namespace App\Http\Controllers;

use App\Models\Iplogger;
use App\Models\User;
use FurqanSiddiqui\BIP39\BIP39;
use Illuminate\Support\Carbon;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);

        unset($attributes['captcha']);

        if (auth()->attempt($attributes)) {
            Iplogger::create([
                'user_id' => auth()->user()->id,
                'logged_ip' => request()->ip(),
                'logged_date' => Carbon::now(),
            ]);
            session()->regenerate();
            return redirect('/')->with('success', 'Hoşgeldin!');
        } else {
            return back()->with('success', 'Bilgilerde hata var!');
        }

    }

    public function destroy()
    {
        auth()->logout();
        session()->flush();
        return redirect('/')->with('success', 'Hoşçakal!');
    }

    public function renewPassPage()
    {
        return view('login.passrecover');
    }

    public function renewPassLogic()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'mnemonic' => 'required',
            'captcha' => 'required|captcha',
        ]);

        //** yapılacak */

        if ($attributes['mnemonic'] < 12) {
            return back()->withErrors(['mnemonic' => 'Hatalı Mnemonic'])->withInput();
        }

        unset($attributes['captcha']);

        $username = request()->input('username');
        if (password_verify(BIP39::Words($attributes['mnemonic'])->entropy, User::where('username', $username)->get('mnemonica')->toArray()[0]['mnemonica'])) {
            return view('login.newpass', ['username' => $username]);
        } else {
            return back()->with('success', 'Hatalı Deneme!');
        }

    }

    public function newPass(User $user)
    {
        $attributes = request()->validate([
            'username' => $user->username,
            'password' => 'required|min:7|max:255',
        ]);

        $user->update(['password' => $attributes['password']]);

        return redirect('/')->with('success', 'Şifren yenilendi!');
    }

}
