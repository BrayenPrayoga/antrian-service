<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

class Profil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'profil';
    protected $guarded = [];
    protected $hidden = [
        'id','id_users'
    ];

    public function ukuran_layar(){
        return $this->belongsTo('\App\Models\MasterUkuranLayar','kode_dealer','kode_dealer');
    }
}
