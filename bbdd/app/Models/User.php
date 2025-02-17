<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // protected $table = 'users'; //esto puedes ponerlo de forma opcional si no te adhieres a la convención de nombres de laravel.
    /*
    Una clase User tendría una tabla users. Una clase ExampleUser tendría una tabla example_users. Si sigues ese estilo, no necesitas poner esa variable.
    Si no lo sigues, entonces sí necesitas meter esa variable para especificar el nombre de la tabla.
    */

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

    /*
    protected $guarded = [ //los metidos aqui no permite tocarlos para nada a menos que se pida de forma forzosa
        'remember_token',
    ];
    */

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

    //Relacion uno a muchos
    public function post() {
        return $this->hasMany(Post::class);
    }

    public function getJWTIdentifier () {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims () {
        return [];
    }
}
