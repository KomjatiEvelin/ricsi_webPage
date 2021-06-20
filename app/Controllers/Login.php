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
                    return redirect()->to('/login');
                }
            
           
        }

        echo view('templates/header',$data);
        echo view('pages/login',$data);
        echo view('templates/footer',$data);

    }


     
}
?>