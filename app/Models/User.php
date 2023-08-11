<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     * para agregar campos nuevos a users se debe modificar vista, hacer nueva migracion (php artisan make:migration add_more_fields_to_users_table --table=users), cambiar modelo (en filliable
     * ) y app/action/fortyfy/createnewuser.php ->  seguir ejemplo de pantalla para agregar nuevos campos)
     * @var array
     */
    protected $fillable = [ // esto es para que campos se puedan manipular desde el exterior
        'name',
        'apellido',
        'telefono',
        'dni',
        'domicilio',
        'fecha',
        'email',
        'rol',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
// establecer relacion uno a muchos: 1 usuario muchas consultas o estudios
    public function consultas()
    {
        return $this->hasMany('app\Models\Consultas');
    }

    public function estudios()
    {
        return $this->hasMany('app\Models\Estudios');
    }


public function isAdmin(){
    
    if (auth()->check() && auth()->user()-> rol =='2') {
   
   return true;
    }




}
}