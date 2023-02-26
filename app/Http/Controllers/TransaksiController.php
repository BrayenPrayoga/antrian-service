<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Constants\ErrorCode as EC;
use App\Constants\ErrorMessage as EM;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *   tags={"Transaksi"},
     *   path="/user/transaksi",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function index(){
        try {
            $result = Transaksi::getTransaksi();
            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @OA\Post(
     *   tags={"Transaksi"},
     *   path="/user/transaksi/simpan",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="kode_dealer",
     *                  title="Kode Dealer",
     *                  description="Kode Dealer",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="no_antrian",
     *                  title="No. Antrian",
     *                  description="No. Antrian",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="status",
     *                  title="Status",
     *                  description="Status",
     *                  example="WAITING/DONE"
     *              ),
     *          ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function simpan(Request $request){
        try {
            if(!isset($request->kode_dealer) || empty($request->kode_dealer)){
                $message = 'Parameter Kode Dealer Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->no_antrian) || empty($request->no_antrian)){
                $message = 'Parameter No. Antrian Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->status) || empty($request->status)){
                $message = 'Parameter Status Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            $result = Transaksi::saveTransaksi($request);

            if($result == 1){
                $response = 'Data Berhasil Disimpan';
                return Helper::responseData($response);
            }else{
                $response = 'Data Sudah Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * @OA\Post(
     *   tags={"Transaksi"},
     *   path="/user/transaksi/edit",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="kode_dealer",
     *                  title="Kode Dealer",
     *                  description="Kode Dealer",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="no_antrian",
     *                  title="No. Antrian",
     *                  description="No. Antrian",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="status",
     *                  title="Status",
     *                  description="Status",
     *                  example="WAITING/DONE"
     *              ),
     *          ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function edit(Request $request){
        try {
            if(!isset($request->kode_dealer) || empty($request->kode_dealer)){
                $message = 'Parameter Kode Dealer Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->no_antrian) || empty($request->no_antrian)){
                $message = 'Parameter No. Antrian Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->status) || empty($request->status)){
                $message = 'Parameter Status Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            $result = Transaksi::updateTransaksi($request);

            if($result == 1){
                $response = 'Data Berhasil Diedit';
                return Helper::responseData($response);
            }else{
                $response = 'Data Tidak Ditemukan';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @OA\Get(
     *   tags={"Transaksi"},
     *   path="/user/transaksi/hapus",
     *   @OA\Parameter(
     *          name="kode_transaksi",
     *          in="query",
     *          required=true,
     *          description="Kode Transaksi",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function hapus(){
        try {
            $data['kode_transaksi'] = isset($_GET['kode_transaksi']) ? $_GET['kode_transaksi'] : null;
            if(!isset($_GET['kode_transaksi']) || empty($_GET['kode_transaksi'])){
                $message = 'Parameter Kode Transaksi Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            
            $result = Transaksi::hapusTransaksi($data);

            if($result == 1){
                $response = 'Data Berhasil Dihapus';
                return Helper::responseData($response);
            }else{
                $response = 'Data Tidak Ditemukan';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
?>