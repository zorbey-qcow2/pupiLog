<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function newsletter()
    {
        $attributes = request()->validate([
            'email' => 'email|max:255|required|unique:newsletters,email',
        ]);

        $attributes['ip_comment'] = request()->ip();

        Newsletter::create($attributes);


        return back()->with('success','E-posta adresiniz bilgilendirilmek üzere kaydedildi.');

    }
}
