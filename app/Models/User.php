<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function posts()    {
        return $this->hasMany(Post::class);
    }

    //metodos apra establecer las relaciones con los modelos
    public function from(){
        return $this->belongsToMany(User::class, 'friends','from_id', 'to_id');
    }

    public function to(){
        return $this->belongsToMany(User::class, 'friends','to_id', 'from_id');
    }

    //filtramos a los amigos
    public function friendsFrom(){
        return $this->from()->wherePivot('accepted', true);
    }

    public function friendsTo(){
        return $this->from()->wherePivot('accepted', true);
    }

    //solicitudes de amistad
    public function pendingFrom(){
        return $this->from()->wherePivot('accepted', false);
    }
    public function pendingTo(){
        return $this->to()->wherePivot('accepted', false);
    }

}
