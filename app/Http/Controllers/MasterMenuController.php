<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Constants\ErrorCode as EC;
use App\Constants\ErrorMessage as EM;
use App\Models\MasterMenu;

class MasterMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @OA\Get(
     *   tags={"Master Menu"},
     *   path="/user/master-menu",
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found"),
     *   security={{ "apiAuth": {} }}
     * )
     */
    public function index(){
        try {
            $result = MasterMenu::getMasterMenu();
            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @OA\Post(
     *   tags={"Master Menu"},
     *   path="/user/master-menu/simpan",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="kode_menu",
     *                  title="Kode Menu",
     *                  description="Kode Menu",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="nama",
     *                  title="nama",
     *                  description="nama",
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
            if(!isset($request->kode_menu) || empty($request->kode_menu)){
                $message = 'Parameter Kode Menu Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->nama) || empty($request->nama)){
                $message = 'Parameter Nama Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            // if(!is_array($request->kode_menu)){
            //     $message = 'Parameter Kode Menu Harus Format Array';
            //     return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            // }
            $result = MasterMenu::saveMasterMenu($request);

            return Helper::responseData($result);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    /**
     * @OA\Post(
     *   tags={"Master Menu"},
     *   path="/user/master-menu/edit",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="kode_menu",
     *                  title="Kode Menu",
     *                  description="Kode Menu",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="nama",
     *                  title="nama",
     *                  description="nama",
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
            if(!isset($request->kode_menu) || empty($request->kode_menu)){
                $message = 'Parameter Kode Menu Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            if(!isset($request->nama) || empty($request->nama)){
                $message = 'Parameter Nama Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            // if(!is_array($request->kode_menu)){
            //     $message = 'Parameter Kode Menu Harus Format Array';
            //     return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            // }
            $result = MasterMenu::updateMasterMenu($request);

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
     *   tags={"Master Menu"},
     *   path="/user/master-menu/hapus",
     *   @OA\Parameter(
     *          name="kode_menu",
     *          in="query",
     *          required=true,
     *          description="Kode menu",
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
            $data['kode_menu'] = isset($_GET['kode_menu']) ? $_GET['kode_menu'] : null;
            if(!isset($_GET['kode_menu']) || empty($_GET['kode_menu'])){
                $message = 'Parameter Kode Menu Tidak Ada';
                return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
            }
            
            $result = MasterMenu::hapusMasterMenu($data);

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