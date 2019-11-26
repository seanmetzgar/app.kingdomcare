<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
        // TODO: If role = sitter, make dob required.
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],

            'city' => ['string', 'max:255'],
            'region' => ['string', 'max:255'],
            'phone' => ['string', new USPhoneNumber],

            'dob' => ['date']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // TODO: Attach role based on registration page.
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],

            'city' => $data['city'],
            'region' => $data['region'],
            'phone' => $data['phone'],

            'dob' => $data['dob']
        ]);
        $user->roles()
            ->attach(Role::where('name', 'unknown')->first());

        return $user;
    }
}
