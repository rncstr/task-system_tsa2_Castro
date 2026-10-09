<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set(['logged_in' => true, 'username' => $user['username']]);
            return redirect()->to('/tasks');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}