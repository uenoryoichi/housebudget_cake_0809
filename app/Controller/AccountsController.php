
<?php 

class AccountsController extends AppController
{
    public $components = array('Security','Auth');
    public $helper = array('Html','Form');
    public $uses=array('UserAccount','Account','User','AccountClassification');
    
   
   /* 
    public function index()
    {
        $user_account_use = $this->UserAccount->user_account_use('user_account_use');    
        $this->set('user_account_uses', $user_account_use);
        
        $user_account_not_use = $this->UserAccount->user_account_not_use('user_account_not_use');
        $this->set('user_account_not_uses', $user_account_not_use);
    
        $this->set('account_classifications', $this->AccountClassification->find('all'));

        $account_classification_option = $this->AccountClassification->select_option('account_classification');
        $this->set('account_classification_options', $account_classification_option);
   }
    */
    public function test() {
    
    }   


    public function add ($id=null)
    {
        if($this->request->is('post')){
            $data = array(
                'Account'=> array(
                    'user_id' => AuthComponent::user('id'),
                    'account_id' => $this->request->data['UserAccount']['account_id'],
                    'balance' => 0,
                    'use_flag' => 0
                )
            );
            
            if ($this->UserAccount->save($data)){
                $this->Session->setFlash('Success!');
                $this->redirect('index');
            }else {
                $this->Session->setFlash('Fauled!');
                $this->redirect(array('action'=>'index'));
            }
        }else{
            $this->Session->setFlash('Fauled');
            $this->redirect('index');
        }
    }


}
