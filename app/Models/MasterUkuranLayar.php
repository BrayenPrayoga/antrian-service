<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

class MasterUkuranLayar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'master_ukuran_layar';
    protected $guarded = [];
    protected $hidden = [
        'id','created_at','updated_at','deleted_at'
    ];
    
    static function getMasterUkuranLayar()
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d');

            $data = MasterUkuranLayar::whereNull('deleted_at')->get();

            if (is_countable($data) && count($data) > 0){
                $response = $data;
            }else{
                $response = 'Data Tidak Ditemukan';
            }
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function saveMasterUkuranLayar($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $master_ukuran_layar = MasterUkuranLayar::where('kode_dealer',$request->kode_dealer)->count();

            if($master_ukuran_layar == 0){
                $data = [
                    'width'         => $request->width,
                    'height'        => $request->height,
                    'kode_dealer'   => $request->kode_dealer,
                    'created_at'    => $datenow
                ];
                MasterUkuranLayar::insert($data);

                $response = 1;
            }else{
                $response = 0;
            }

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function updateMasterUkuranLayar($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $master_ukuran_layar = MasterUkuranLayar::where('kode_dealer',$request->kode_dealer)->count();

            if($master_ukuran_layar > 0){
                $data = [
                    'width'         => $request->width,
                    'height'        => $request->height,
                    'kode_dealer'   => $request->kode_dealer,
                    'updated_at'    => $datenow
                ];
                MasterUkuranLayar::where('kode_dealer',$request->kode_dealer)->update($data);

                $response = 1;
            }else{
                $response = 0;
            }
            
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function hapusMasterUkuranLayar($param)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $kode_dealer = $param['kode_dealer'];
            $datenow = date('Y-m-d H:i:s');
            $master_ukuran_layar = MasterUkuranLayar::where('kode_dealer',$kode_dealer)->count();

            if($master_ukuran_layar > 0){
                $data = [
                    'deleted_at'    => $datenow
                ];
                MasterUkuranLayar::where('kode_dealer',$kode_dealer)->update($data);

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
