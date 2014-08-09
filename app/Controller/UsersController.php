<?php 
/*
 *index,login,login_form,sign_up,logout
 *
*/
class UsersController extends AppController
{
    public $uses =array('Income', 'UserAccount' ,'User','Pay');
    public $components = array(
        'Auth' => array(
            'allowedActions' => array('login','sign_up','login_form')
        )
    );        
    public $helper = array('Html','Form');


    public function index()
    {
        //todo 支出収入が無いときに文字化けしないような処理
        $this->set('title_for_layout','home');
        $this->set('income_this_month',$this->Income->incomeThisMonth('income_this_month')[0]);
        $this->set('pay_this_month',$this->Pay->payThisMonth('pay_this_month')[0]);
    
        $params = array('conditions' => array('UserAccount.user_id' => AuthComponent::user('id')));
        $this->set('user_accounts', $this->UserAccount->find('all', $params)); 
    }


    
    public function login()
    {
        //postされている
        if ($this->request->is('post')) 
        {
            if ($this->Auth->login()){
                //return $this->redirect(array('controller'=>'users','action'=>'index'));
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Session->setFlash('メールアドレスかパスワードが間違っています');
                $this->set('title_for_layout','ログイン');
                $this->render('login_form');
            }    
        }else{
            $this->redirect(array('action'=>'login_form'));
        }
    }

    public function login_form()
    {
        $this->set('title_for_layout','ログイン');
    }

    public function logout()
    {
        $logoutUrl = $this->Auth->logout();
        $this->redirect($logoutUrl); 
        //$this->redirect('login_form'); 
    }



    public function sign_up()
    {
        //postされている
        if ($this->request->is('post')) 
        {
            //すでに登録されているメールアドレス
            $options=array('conditions' => array('email' => $this->request->data['User']['email']));
            if ($this->User->find('first',$options)){
                $this->Session->setFlash('すでに登録されているメールアドレスです');
                $this->set('title_for_layout','会員登録');
                $this->render(array('sign_up'));
            //登録処理
            }else{
                $sign_up = $this->request->data;
                $password_hash = $this->Auth->password($sign_up['User']['password']);    
                $sign_up['User']['password'] = $password_hash;
                
                $this->User->create();
                $this->User->save($sign_up);
                $this->redirect(array('controller'=>'Users', 'action' => 'login_form'));
            }
        } else {
            $this->set('title_for_layout','会員登録');
        }
    }
}
