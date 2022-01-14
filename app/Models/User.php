<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Contracts\Likeable;
use App\Models\Message\Conversation;
use App\Models\Message\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'reg_ip',
        'last_ip',
        'last_login_at',
        'mnemonica',
        'agreed',
        'epigram',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

//    public function setMnemonicaAttribute($mnemonica)
//    {
//        $this->attributes['mnemonica'] = bcrypt($mnemonica);
//    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function iploggers()
    {
        return $this->hasMany(Iplogger::class);
    }


    // likelikelikelike...

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like(Likeable $likeable): self
    {
        if ($this->hasLiked($likeable)) {
            return $this;
        }

        (new Like())
            ->user()->associate($this)
            ->likeable()->associate($likeable)
            ->save();

        return $this;
    }

    public function hasLiked(Likeable $likeable): bool
    {
        if (!$likeable->exists) {
            return false;
        }

        return $likeable->likes()
            ->whereHas('user', fn($q) => $q->whereId($this->id))
            ->exists();
    }

    public function unlike(Likeable $likeable): self
    {
        if (!$this->hasLiked($likeable)) {
            return $this;
        }

        $likeable->likes()
            ->whereHas('user', fn($q) => $q->whereId($this->id))
            ->delete();

        return $this;
    }

    // end of likelikelikelike... /////

    // message

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function comtocoms()
    {
        return $this->hasMany(Comtocom::class);
    }

}
