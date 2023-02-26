<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use App\Helper;
use App\Constants\ErrorCode as EC;
use App\Constants\ErrorMessage as EM;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login','register']]);
    }

    /**
     * @OA\Post(
     *   tags={"Login"},
     *   path="/auth/login",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="email",
     *                  example="no-reply@gmail.com"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  title="password",
     *                  description="Password",
     *                  example="P@ssw0rd"
     *              ),
     *              @OA\Property(
     *                  property="role",
     *                  title="Role",
     *                  description="Role",
     *                  example="DASHBOARD/SELF_SERVICE/COUNTER"
     *              ),
     *          ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        // Get the user with the email
        $user = User::with('profil','profil.ukuran_layar')->where('email', $request['email'])->where('role', $request['role'])->first();
    
        // check is user exist
        if (!isset($user)) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'User does not exist with this details'
                ]
            );
        }
    
        // confirm that the password matches
        if (!Hash::check($request['password'], $user['password'])) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Incorrect user credentials'
                ]
            );
        }
    
        // Generate Token
        $token = $user->createToken('AuthToken')->accessToken;
    
        // Add Generated token to user column
        User::where('email', $request['email'])->update(array('api_token' => $token));
    
        return response()->json(
            [
                'status' => true,
                'message' => 'User login successfully',
                'data'  => $user,
                'api_token' => $token
            ]
        );
    }

    /**
     * @OA\Post(
     *   tags={"Register"},
     *   path="/auth/register",
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nama",
     *                  title="nama",
     *                  description="nama",
     *                  example=""
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="email",
     *                  example="no-reply@gmail.com"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  title="password",
     *                  description="Password",
     *                  example="P@ssw0rd"
     *              ),
     *              @OA\Property(
     *                  property="role",
     *                  title="Role",
     *                  description="Role",
     *                  example="DASHBOARD/SELF_SERVICE/COUNTER"
     *              ),
     *              @OA\Property(
     *                  property="kode_dealer",
     *                  title="Kode Dealer",
     *                  description="Kode Dealer",
     *                  example=""
     *              ),
     *          ),
     *   ),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function register(Request $request)
    {
        if(!isset($request->nama) || empty($request->nama)){
            $message = 'Parameter Nama Tidak Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
        }
        if(!isset($request->email) || empty($request->email)){
            $message = 'Parameter Email Tidak Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
        }
        if(!isset($request->password) || empty($request->password)){
            $message = 'Parameter Password Tidak Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
        }
        if(!isset($request->role) || empty($request->role)){
            $message = 'Parameter Role Tidak Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
        }
        if(!isset($request->kode_dealer) || empty($request->kode_dealer)){
            $message = 'Parameter Kode Dealer Tidak Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $message);
        }
        $result = User::register($request);

        if($result == 1){
            $response = 'Data Berhasil Disimpan';
            return Helper::responseData($response);
        }else{
            $response = 'Data Sudah Ada';
            return Helper::responseFreeCustom(EC::GENERAL_ERROR, EM::INSUF_PARAM, $response);
        }
    }

    public function profile() 
    {
        $user = Auth::user();

        return response()->json(
            [
                'status' => true,
                'message' => 'User profile',
                'data' => $user
            ]
        );
    }

    public function all()
    {
        $users = User::all();

        return response()->json(
            [
                'status' => true,
                'message' => 'All users',
                'data' => $users
            ]
        );
    }
}