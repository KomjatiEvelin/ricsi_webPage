<?php
namespace App\Controllers;
class Logout extends BaseController{
    public function index(){
        session()->remove('username');
        session()->remove('isLoggedin');
        session()->destroy();
        return redirect()->to('/home');
    }
}
?>