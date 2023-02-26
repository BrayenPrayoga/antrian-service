<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

class MasterDealer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'master_dealer';
    protected $guarded = [];

    static function getMasterDealer()
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d');

            $data = MasterDealer::whereNull('deleted_at')->get();

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

    static function saveMasterDealer($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');

            $data = [
                'kode_dealer'   => $request->kode_dealer,
                'nama'          => $request->nama,
                'kode_menu'     => $request->kode_menu,
                'created_at'    => $datenow
            ];
            MasterDealer::insert($data);

            $response = 'Data Berhasil Disimpan';

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function updateMasterDealer($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $master_dealer = MasterDealer::where('kode_dealer',$request->kode_dealer)->count();

            if($master_dealer > 0){
                $data = [
                    'kode_dealer'   => $request->kode_dealer,
                    'nama'          => $request->nama,
                    'kode_menu'     => $request->kode_menu,
                    'updated_at'    => $datenow
                ];
                MasterDealer::where('kode_dealer',$request->kode_dealer)->update($data);

                $response = 1;
            }else{
                $response = 0;
            }
            
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function hapusMasterDealer($param)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $kode_dealer = $param['kode_dealer'];
            $datenow = date('Y-m-d H:i:s');
            $master_dealer = MasterDealer::where('kode_dealer',$kode_dealer)->count();

            if($master_dealer > 0){
                $data = [
                    'deleted_at'    => $datenow
                ];
                MasterDealer::where('kode_dealer',$kode_dealer)->update($data);

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
