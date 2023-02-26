<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Constants\ErrorCode as EC;
use App\Constants\ErrorMessage as EM;
use App\Models\MasterUkuranLayar;

class MasterUkuranLayarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *   tags={"Master Ukuran Layar"},
     *   path="/user/master-ukuran-layar",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function index(){
        try {
            $result = MasterUkuranLayar::getMasterUkuranLayar();
            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @OA\Post(
     *   tags={"Master Ukuran Layar"},
     *   path="/user/master-ukuran-layar/simpan",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="width",
     *                  title="Width",
     *                  description="Width",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="height",
     *                  title="Height",
     *                  description="Height",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="kode_dealer",
     *                  title="kode_dealer",
     *                  description="kode_dealer",
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
            if(!isset($request->width) || empty($request->width)){
                $message = 'Parameter Width Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->height) || empty($request->height)){
                $message = 'Parameter Height Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->kode_dealer) || empty($request->kode_dealer)){
                $message = 'Parameter Kode Dealer Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            $result = MasterUkuranLayar::saveMasterUkuranLayar($request);

            if($result == 1){
                $response = 'Data Berhasil Disimpan';
                return Helper::responseData($response);
            }else{
                $response = 'Data Dengan Kode Dealer Tersebut Sudah Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * @OA\Post(
     *   tags={"Master Ukuran Layar"},
     *   path="/user/master-ukuran-layar/edit",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="width",
     *                  title="Width",
     *                  description="Width",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="height",
     *                  title="Height",
     *                  description="Height",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="kode_dealer",
     *                  title="kode_dealer",
     *                  description="kode_dealer",
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
            if(!isset($request->width) || empty($request->width)){
                $message = 'Parameter Width Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->height) || empty($request->height)){
                $message = 'Parameter Height Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->kode_dealer) || empty($request->kode_dealer)){
                $message = 'Parameter Kode Dealer Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            $result = MasterUkuranLayar::updateMasterUkuranLayar($request);

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
     *   tags={"Master Ukuran Layar"},
     *   path="/user/master-ukuran-layar/hapus",
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
            
            $result = MasterUkuranLayar::hapusMasterUkuranLayar($data);

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