<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

class MasterMenu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'master_menu';
    protected $guarded = [];

    static function getMasterMenu()
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d');

            $data = MasterMenu::whereNull('deleted_at')->get();

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

    static function saveMasterMenu($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');

            $data = [
                'kode_menu'     => $request->kode_menu,
                'nama'          => $request->nama,
                'created_at'    => $datenow
            ];
            MasterMenu::insert($data);

            $response = 'Data Berhasil Disimpan';

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function updateMasterMenu($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $master_menu = MasterMenu::where('kode_menu',$request->kode_menu)->count();

            if($master_menu > 0){
                $data = [
                    'kode_menu'     => $request->kode_menu,
                    'nama'          => $request->nama,
                    'updated_at'    => $datenow
                ];
                MasterMenu::where('kode_menu',$request->kode_menu)->update($data);

                $response = 1;
            }else{
                $response = 0;
            }
            
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function hapusMasterMenu($param)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $kode_menu = $param['kode_menu'];
            $datenow = date('Y-m-d H:i:s');
            $master_menu = MasterMenu::where('kode_menu',$kode_menu)->count();

            if($master_menu > 0){
                $data = [
                    'deleted_at'    => $datenow
                ];
                MasterMenu::where('kode_menu',$kode_menu)->update($data);

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
