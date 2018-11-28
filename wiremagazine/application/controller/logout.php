<?php
class Logout extends Controller
{
    public function index()
    {
        logout_user();
    }

    public function logout_user()
    {
        session_start();
        session_destroy();
        header('location: ' . URL . 'home/index');
    }

    public function logout_admin()
    {
        session_start();
        session_destroy();
        header('location: ' . URL . 'admin/login');
    }
}