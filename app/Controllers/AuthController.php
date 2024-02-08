<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        echo view('login');
    }

    public function processLogin()
    {
        helper('url');
        $request = service('request');

        $email = $request->getPost('email');
        $password = $request->getPost('password');

        $db = \Config\Database::connect();

        $query = $db->table('users')->getWhere(['email' => $email]);
        $user = $query->getRow();

        if ($user) {
            if ($password == $user->password) {
                $session = \Config\Services::session();
                $session->set('user', $user);

                return redirect()->to(base_url('/'));
            } else {
                return redirect()->to(base_url('login'))->with('error', 'Invalid password');
            }
        } else {
            return redirect()->to(base_url('login'))->with('error', 'Invalid email');
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove('user');

        return redirect()->to(base_url('login'));
    }
}