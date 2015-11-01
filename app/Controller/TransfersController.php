<?php 

class TransfersController extends AppController
{
    public $components = array('Security','Auth');
    public $helper = array('Html','Form');
    public $uses=array('Transfer','UserAccount','User');
    
   
    
    public function index()
    {
        $this->__setData();
    }



    public function add()
    {
        if($this->request->is('post')){
            if ($this->Transfer->save($this->request->data)){
                $this->Session->setFlash('Success!');
                $this->redirect('index');
            }else {
                $this->Session->setFlash('Fauled!');
                $this->__setData();
                $this->render('index');
            }
        }else{
            $this->Session->setFlash('Fauled');
            $this->redirect(array('index'));
        }
    }



/*
 *入力フォームの選択肢を取得
 */
    private function __optionSet()
    {        
        //口座の選択肢
        $this->set('user_account_option',$this->UserAccount->select_option('user_account_option'));		
    }



    private function __setData() 
    {
        //一覧表示のデータ
        $params = array(
            'limit' =>30,
            'recursive'=>2,
        );
        $allTransfer = $this->Transfer->find('all',$params);
        foreach($allTransfer as $key => $value){
            $transfers[$key]['Transfer'] = $value['Transfer'];
            $transfers[$key]['UserAccountRemitter']['Account']['name'] = $value['UserAccountRemitter']['Account']['name'];
            $transfers[$key]['UserAccountRemittee']['Account']['name'] = $value['UserAccountRemittee']['Account']['name'];
        }
        $this->set('transfers', $transfers);
        $this->__optionSet();

        $this->set('title_for_layout','収入一覧');
    }



    public function edit($id=null)
    {
        $transferData = $this->Transfer->findById($id,'user_id');
        if ($transferData['Transfer']['user_id'] === AuthComponent::user('id')) {
            //元の情報
            $this->data = $this->Transfer->findById($id, 'Transfer.*');
            $this->__optionSet();
            $this->set('title_for_layout','資金移動情報修正');

        }else {
            $this->Session->setFlash('failed!');
            $this->redirect(array('index'));
        }
    }



    public function edit_action($id=null)
    {
        $this->Transfer->id=$id;
        if ($this->request->is('post')) {
            if ($this->Transfer->save($this->request->data)) {
                $this->Session->setFlash('success!');
                $this->redirect('index');
            }else {
                $this->Session->setFlash('failed!');
                $this->render('edit');
            }
        }else {
            $this->Session->setFlash('failed!');
            $this->redirect('index');
        }
    }
    


    public function delete ()
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->request->is('post')) {
            if ($this->Transfer->delete($this->Transfer->delete($this->request->data['Transfer']['id']))) {
                $this->Session->setFlash('Deleted!');
                $this->redirect('index');
            }else{
                $this->redirect('index');
            }
        }else{
            $this->redirect('index');
        }
    }
}
