<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {


        $rules = [
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Name field is required'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Name field is required',
                    'valid_email' => 'Your Email is not valid'
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[100]|min_length[6]',
                'errors' => [
                    'required' => 'Password field is required',
                    'min_length' => 'Password must be at least 6 characters long',
                    'max_length' => 'password can not be longer than 20 characters'

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[100]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password field is required',
                    'min_length' => 'Password must be at least 6 characters long',
                    'max_length' => 'password can not be longer than 20 characters',
                    'matches' => 'Passwords should match'

                ]
            ],

        ];

        $data = $this->request->getPost(array_keys($rules));

        if (!$this->validate($rules)) {

            return view('register', [
                'validation' => $this->validator,
            ]);
        } else {

            $validatedData = $this->validator->getValidated();
            $validatedData['password'] = Hash::encrypt($validatedData['password']);
            $model = model(AuthModel::class);

            $model->insert($validatedData);

            return redirect()->to('login');
        }
    }

    public function loginUser()
    {
    }
}
