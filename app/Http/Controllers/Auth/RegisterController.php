<?php

namespace App\Http\Controllers\Auth;

use App\Models\VRUsers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (in_array('super-admin', auth()->user()->rolesConnectionData()->pluck('id')->toArray())) {
            return '/admin';
        } elseif (in_array('user', auth()->user()->rolesConnectionData()->pluck('id')->toArray())) {
            return '/user/orders/create';
        }
            return '/';

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:vr_users',
            'password' => 'required|string|min:1|confirmed',
            'phone' => 'required|digits:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $record = VRUsers::create([
            'id' => Uuid::uuid4(),
            'email' => $data['email'],
            'user_name' => $data['user_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        $record->rolesConnectionData()->sync('user');
        return $record;
    }
}
