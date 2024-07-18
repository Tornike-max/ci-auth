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

            session()->setFlashdata('error', 'Error while registering');
            return view('register', [
                'validation' => $this->validator,
            ]);
        } else {

            $validatedData = $this->validator->getValidated();
            $validatedData['password'] = Hash::encrypt($validatedData['password']);
            $model = model(AuthModel::class);

            $model->insert($validatedData);

            return redirect()->to('login')->with('success', 'User Registered Successfully');
        }
    }

    public function loginUser()
    {
        $rules = [

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
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('login')->with('error', 'Error while login user');
        }

        $validatedData = $this->validator->getValidated();
        $usersModel = model(AuthModel::class)->where('email', $validatedData['email'])->first();
        $hashedPassword = $usersModel['password'];

        if (Hash::check($validatedData['password'], $hashedPassword)) {
            session()->set('loggedInUser', $usersModel['id']);
            return redirect()->to(base_url('dashboard'))->with('success', 'User logged in successfully');;
        };
    }


    public function uploadImage()
    {
        if ($this->request->getMethod() === 'POST') {
            $file = $this->request->getFile('avatar');

            if (is_uploaded_file($file) || !empty($file)) {
                $fileName = $file->getName();
                $nameArray = explode('.', $fileName);
                $newFileName = time() . '.' . end($nameArray);

                if ($file->move('images', $newFileName)) {
                    $loggedInUserId = session()->get('loggedInUser');
                    $model = model(AuthModel::class);

                    $userInfo = $model->find($loggedInUserId);

                    $userInfo['avatar'] = $newFileName;

                    $model->update($loggedInUserId, $userInfo);
                    return redirect()->to(base_url('dashboard'))->with('success', 'Image Uploaded Successfully');
                } else {
                    return redirect()->to(base_url('dashboard'))->with('error', 'Error! while uploading new image');
                }
            } else {
                return redirect()->to(base_url('dashboard'))->with('error', 'Error! Image not found');
            }
        }
    }
}
