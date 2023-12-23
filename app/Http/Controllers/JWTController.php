<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
class JWTController extends Controller
{
    protected $key;
    protected $iss;
	protected $algorithm;
	protected $iat;
	protected $exp;
	public function __construct()
	{
		$this->key = config('app.jwt_secret'); // Establecer llave secreta
		$this->iss = config('app.app_url'); // Establecer llave secreta
		$this->algorithm = ['HS256']; // Establecer algoritmo de codificación
		$this->iat = time(); // Establecer tiempo de inicio a ahora
		$this->exp = $this->iat + 60 * 60; // Establecer expiración a 1 hora desde ahora
	}

    public function respondToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->exp
        ]);
    }

	public function refreshToken($tokenOriginal)
	{
		$this->validateToken($tokenOriginal);
		$user = Auth::user();
		$token = $this->jwt($user);
		return $this->respondToken($token);
	}

    public function jwt(User $user)
    {
        return JWT::encode([
            'iss' => $this->iss,
            'sub' => $user->id,
            'iat' => $this->iat,
            'exp' => $this->exp
        ], $this->key, $this->algorithm);
    }

    public function validateToken(string $token)
    {
        try {
            $payload = (array) JWT::decode($token, $this->key, $this->algorithm);

        } catch (ExpiredException $e) {

            Auth::logout();

            return response()->json(['error' => 'Token expired'], 400);

        } catch (SignatureInvalidException $e) {

            Auth::logout();

            return response()->json(['error' => 'Invalid token signature'], 400);

        } catch (BeforeValidException $e) {

            Auth::logout();

            return response()->json(['error' => 'Token not valid yet'], 400);

        }
    }
}
