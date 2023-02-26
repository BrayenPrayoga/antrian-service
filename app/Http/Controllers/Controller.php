<?php

namespace App\Http\Controllers;

use OpenApi\Annotations\Contact;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;
use OpenApi\Annotations\Server;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     description="This is Documentation of Lumen",
 *     version="3.0.0",
 *     title="Lumen",
 *     @OA\Contact(
 *         email="brayenprayoga41@gmail.com"
 *     )
 * )
 * @Server(
 *     url="http://localhost:8000/",
 *     description= "Localhost"
 * )
 */
/**
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Hubungi Developer Untuk Akun Login",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="Passport",
 *     securityScheme="apiAuth",
 * )
 */
class Controller extends BaseController
{
    //
}
