<?php 

class PaysController extends AppController
{
    public $components = array('Security','Auth');
    public $helper = array('Html','Form');
    public $uses=array('Pay','UserAccount','User','PaySpecification');
    
   
    
    public function index()
    {
        $this->__setData();
    }



    public function add()
    {
        if($this->request->is('post')){
            if ($this->Pay->save($this->request->data)){
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
        //分類の選択肢
        $this->set('pay_specification_option',$this->PaySpecification->select_option('pay_specification_option'));

        //口座の選択肢
        $this->set('user_account_option',$this->UserAccount->select_option('user_account_option'));		
    }



    private function __setData() 
    {
        //一覧表示のデータ
        $params = array(
            'limit' =>30,
            'recursive'=>2
        );
        $this->set('pays', $this->Pay->find('all',$params));
        $this->__optionSet();

        $this->set('title_for_layout','支出一覧');
    }



    public function edit($id=null)
    {
        $payData = $this->Pay->findById($id,'user_id');
        if ($payData['Pay']['user_id'] === AuthComponent::user('id')) {
            $this->set('inputed', $this->Pay->findById($id));
            $this->__optionSet();
            $this->set('title_for_layout','収入情報修正');
        }else{
            $this->Session->setFlash('failed!');
            $this->redirect('index');
        }
        
    }

    public function edit_action($id=null)
    {
        $this->Pay->id=$id;
        if ($this->request->is('post')) {
            if ($this->Pay->save($this->request->data)) {
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
    
    public function delete ($id = null)
    {
        $payData = $this->Pay->findById($id,'user_id');
        if ($payData['Pay']['user_id'] === AuthComponent::user('id')) {
            if ($this->Pay->delete($id)) {
                $this->Session->setFlash('Deleted!');
            }else{
                $this->Session->setFlash('failed!');
            }
            $this->redirect('index');
        }else{
            throw new MethodNotAllowedException();
        }
    }
}
