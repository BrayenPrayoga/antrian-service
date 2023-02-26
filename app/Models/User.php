<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use App\Models\Profil;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password','id','api_token','created_at','updated_at'
    ];

    public function profil(){
        return $this->belongsTo('\App\Models\Profil','id','id_users')->withDefault(['kode_dealer'=>NULL]);
    }

    static function register($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $users = User::where('email',$request->email)->count();
            $profil = Profil::where('kode_dealer',$request->kode_dealer)->count();

            if($users == 0 && $profil == 0){
                $data1 = [
                    'name'          => $request->nama,
                    'email'         => $request->email,
                    'password'      => Hash::make($request->password),
                    'role'          => $request->role,
                    'created_at'    => $datenow
                ];
                $id_users = User::create($data1);

                $data2 = [
                    'id_users'      => $id_users->id,
                    'kode_dealer'   => $request->kode_dealer
                ];
                Profil::insert($data2);

                $response = 1;
            }else{
                $response = 0;
            }

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
