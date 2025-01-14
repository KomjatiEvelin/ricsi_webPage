<?php
namespace App\Controllers;

use App\Models\AdminAccount;
use App\Models\Sponsor;

class Login extends BaseController{
    public function index(){
        
        $session=session();
        $model=new Sponsor();

        $data=[
            'datas'=> $model->getData(),
            'title'=>'Login',
        ];
        helper(['form']);

        if($this->request->getMethod()=='post'){
          
                $model=new AdminAccount();
                $user=$model->getUser($this->request->getVar('uname'));

                if($user!=null&&$user['passwd']==md5($this->request->getVar('passwd'))){
                    $session_data = [
                        'username' => $this->request->getVar('uname'),
                        'isLoggedin'=>true]; 

                    $session->set($session_data);  
                    return redirect()->to('/home');
                }
                else{
                    return redirect()->to('/login')->with('msg', 'Sikertelen bejelentkezés, hibás jelszó vagy felhasználónév');
                }
            
           
        }

        echo view('templates/header',$data);
        echo view('pages/login',$data);
        echo view('templates/footer',$data);

    }

    public function modifyPwd(){
        $model=new AdminAccount();
        $oldPwd=$this->request->getPost('oldPwd');
        $newPwd=$this->request->getPost('newPwd');
        $newPwdRepeat=$this->request->getPost('newPwdRepeat');

        try{
            if($model->getUser(session()->get('username'))['passwd']==md5($oldPwd)){
                if($newPwd==$newPwdRepeat){
                    $model->modifyPwd(md5($newPwd),session()->get('username'));
                    return redirect()->to( base_url('/upload'))->with('msg', 'Sikeres módosítás');
                }
            }
            else return redirect()->to( base_url('/upload'))->with('msg', 'A módosítás nem sikerült');
        }
        catch(\Exception $e){
            return redirect()->to( base_url('/upload'))->with('msg', 'A módosítás nem sikerült '.$e->getMessage());
        }
            
    }


     
}
?>