<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Constants\ErrorCode as EC;
use App\Constants\ErrorMessage as EM;
use App\Models\MasterDealer;
use Illuminate\Support\Facades\Auth;

class MasterDealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *   tags={"Master Dealer"},
     *   path="/user/master-dealer",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function index(){
        try {
            $result = MasterDealer::getMasterDealer();
            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @OA\Post(
     *   tags={"Master Dealer"},
     *   path="/user/master-dealer/simpan",
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
     *                  property="nama",
     *                  title="nama",
     *                  description="nama",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="kode_menu",
     *                  title="Kode Menu",
     *                  description="Kode Menu",
     *                  example=""
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
            if(!isset($request->nama) || empty($request->nama)){
                $message = 'Parameter Nama Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->kode_menu) || empty($request->kode_menu)){
                $message = 'Parameter Kode Menu Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            // if(!is_array($request->kode_menu)){
            //     $message = 'Parameter Kode Menu Harus Format Array';
            //     return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            // }
            $result = MasterDealer::saveMasterDealer($request);

            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * @OA\Post(
     *   tags={"Master Dealer"},
     *   path="/user/master-dealer/edit",
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
     *                  property="nama",
     *                  title="nama",
     *                  description="nama",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="kode_menu",
     *                  title="Kode Menu",
     *                  description="Kode Menu",
     *                  example=""
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
            if(!isset($request->nama) || empty($request->nama)){
                $message = 'Parameter Nama Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->kode_menu) || empty($request->kode_menu)){
                $message = 'Parameter Kode Menu Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            // if(!is_array($request->kode_menu)){
            //     $message = 'Parameter Kode Menu Harus Format Array';
            //     return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            // }
            $result = MasterDealer::updateMasterDealer($request);

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
     *   tags={"Master Dealer"},
     *   path="/user/master-dealer/hapus",
     *   @OA\Parameter(
     *          name="kode_dealer",
     *          in="query",
     *          required=true,
     *          description="Kode Dealer",
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
            $data['kode_dealer'] = isset($_GET['kode_dealer']) ? $_GET['kode_dealer'] : null;
            if(!isset($_GET['kode_dealer']) || empty($_GET['kode_dealer'])){
                $message = 'Parameter Kode Dealer Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            
            $result = MasterDealer::hapusMasterDealer($data);

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