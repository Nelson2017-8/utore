<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UtilsController;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }

    public function login(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // authentication passed
            return response()->json(['message' => 'Login successful'], 200);
        }

    }

    public function register(UserRegisterRequest $request)
    {
        $userData = $request->all();
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);


        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }

	public function refresh()
    {
        return response()->json(['message' => 'Refresh token'], 200);
    }

    public function userProfile() {
        $user = Auth::user();

        // si es admin
        $admin = AdminUser::where("user_id", $user->id)->first();
        if($admin) {
            $user->admin = true;
            $user->rol = $admin->rol;
        } else {
            $user->admin = false;
        }

		if (!$user) {
			return response()->json(['error' => 'Unauthenticated'], 401);
		}

		// Data to be sent to the front end
		// $user->token = $user->createToken('authToken')->accessToken;
		$edit = [
			/**'username' => [
				'name' => 'username',
				'label' => 'forms.username',
				'value' => $user->username,
				'editing' => false,
				'type' => 'input',
				'validation' => [
					'minLength' => 3,
					'maxLength' => 50,
				]
			],**/
            'first_name' => [
				'name' => 'first_name',
				'label' => 'forms.first_name',
				'value' => $user->first_name,
				'editing' => false,
				'type' => 'input',
				'validation' => [
					'minLength' => 3,
					'maxLength' => 50,
				]
			],
			'last_name' => [
				'name' => 'last_name',
				'label' => 'forms.last_name',
				'value' => $user->last_name,
				'editing' => false,
				'type' => 'input',
				'validation' => [
					'minLength' => 3,
					'maxLength' => 50,
				]
			],
			/**'email' => [
				'name' => 'email',
				'label' => 'forms.email',
				'value' => $user->email,
				'editing' => false,
				'type' => 'input|email',
				'validation' => [
					'required' => true,
					'email' => true,
					'minLength' => 8,
					'maxLength' => 255,
				]
			],**/
			'gender' => [
				'name' => 'gender',
				'label' => 'forms.gender',
				'value' => $user->gender,
				'editing' => false,
				'type' => 'select',
				'options' => [
					'Hombre' => 'Hombre',
					'Mujer' => 'Mujer',
					'No definido' => 'No definido'
				]
			],
			'address' => [
				'name' => 'address',
				'label' => 'forms.address',
				'value' => $user->address,
				'editing' => false,
				'type' => 'textarea',
				'validation' => [
					'required' => true,
					'email' => true,
					'minLength' => 5,
					'maxLength' => 255,
					'number' => true,
				]
			],
			'phone1' => [
				'name' => 'phone1',
				'label' => 'forms.phone1',
				'value' => $user->phone1,
				'editing' => false,
				'type' => 'input|phone'
			],
			'phone2' => [
				'name' => 'phone2',
				'label' => 'forms.phone2',
				'value' => $user->phone2,
				'editing' => false,
				'type' => 'input|phone'
			],
			'type_document' => [
				'name' => 'type_document',
				'label' => 'forms.type_document',
				'value' => $user->type_document,
				'editing' => false,
				'type' => 'select',
				'options' => [
					'CI' => 'CI',
                    'Pasaporte' => 'Pasaporte',
                    'RIF' => 'RIF',
                    'OTRO' => 'OTRO'
				]
			],
		];
		$user->fullname = $user->fullname();
		$user->edit = UtilsController::StandardFormComponent($edit);

		return response()->json($user, 200);
    }


}
