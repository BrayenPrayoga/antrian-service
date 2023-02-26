<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Helper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

class Transaksi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'transaksi';
    protected $guarded = [];
    protected $hidden = [
        'id','created_at','updated_at','deleted_at'
    ];
    
    static function getTransaksi()
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d');

            $data = Transaksi::whereNull('deleted_at')->get();

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

    static function saveTransaksi($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $role = Auth::guard()->user()->role;
            $kode_transaksi = $role.''.$request->no_antrian.''.date('dmY');
            $transaksi = Transaksi::where('kode_dealer',$request->kode_dealer)->where('no_antrian', $request->no_antrian)->count();

            if($transaksi == 0){
                $data = [
                    'kode_transaksi'    => $kode_transaksi,
                    'kode_dealer'       => $request->kode_dealer,
                    'no_antrian'        => $request->no_antrian,
                    'status'            => $request->status,
                    'created_at'        => $datenow
                ];
                Transaksi::insert($data);

                $response = 1;
            }else{
                $response = 0;
            }

            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function updateTransaksi($request)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $datenow = date('Y-m-d H:i:s');
            $role = Auth::guard()->user()->role;
            $kode_transaksi = $role.''.$request->no_antrian.''.date('dmY');
            $transaksi = Transaksi::where('kode_dealer',$request->kode_dealer)->where('no_antrian', $request->no_antrian)->count();

            if($transaksi > 0){
                $data = [
                    'kode_transaksi'    => $kode_transaksi,
                    'kode_dealer'       => $request->kode_dealer,
                    'no_antrian'        => $request->no_antrian,
                    'status'            => $request->status,
                    'created_at'        => $datenow
                ];
                Transaksi::where('kode_dealer',$request->kode_dealer)->where('no_antrian', $request->no_antrian)->update($data);

                $response = 1;
            }else{
                $response = 0;
            }
            
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function hapusTransaksi($param)
    {
        try {
            date_default_timezone_set("Asia/Bangkok");
            $kode_transaksi = $param['kode_transaksi'];
            $datenow = date('Y-m-d H:i:s');
            $transaksi = Transaksi::where('kode_transaksi',$kode_transaksi)->count();

            if($transaksi > 0){
                $data = [
                    'deleted_at'    => $datenow
                ];
                Transaksi::where('kode_transaksi',$kode_transaksi)->update($data);

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
