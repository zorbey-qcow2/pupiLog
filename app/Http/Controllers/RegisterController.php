<?php

namespace App\Http\Controllers;

use App\Models\User;
use FurqanSiddiqui\BIP39\BIP39;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $mnemonic = BIP39::Generate(15);

        $attributes = request()->validate([
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'email|max:255|nullable|unique:users,email',
            'password' => 'required|min:7|max:255',
            'captcha' => 'required|captcha',
        ]);

        $attributes['reg_ip'] = request()->ip();

        $attributes['mnemonica'] = $mnemonic->entropy;

        unset($attributes['captcha']);

        $user = User::create($attributes);

        auth()->login($user);
        session()->put('agreed', 'false');
        session()->regenerate();

        session()->flash('success', 'Hesap başarıyla oluşturuldu.');

        return redirect('hosgeldin');
    }

    public function welcome()
    {
        if (auth()->user()->agreed === 1) {
            return redirect('/');
        }

        $mneEntropy = request()->user()->mnemonica;
        $mnemonic = BIP39::Entropy($mneEntropy);
        $mnemonicWords = implode(" ", $mnemonic->words);
        $mnemonicEntropy = $mnemonic->entropy;

        return view('register.createdone', compact('mnemonicWords', 'mnemonicEntropy'));
    }

    public function accept()
    {

        if (request()->submit == "Save") {
            request()->user()->update(
                [
                    'agreed' => 1,
                    'mnemonica' => password_hash(request()->user()->mnemonica, PASSWORD_DEFAULT),
                ]);

            session()->put('agreed', 'true');
            session()->regenerate();

            return redirect('/');
        }

    }

}
