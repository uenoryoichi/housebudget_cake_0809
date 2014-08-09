<?php 

class IncomesController extends AppController
{
    public $components = array('Security','Auth');
    public $helper = array('Html','Form');
    public $uses=array('Income','UserAccount','User','IncomeSpecification');
    
   
    
    public function index()
    {
        $this->__setData();
    }



    public function add()
    {
        if($this->request->is('post')){
            if ($this->Income->save($this->request->data)){
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
        $this->set('income_specification_option',$this->IncomeSpecification->select_option('income_specification_option'));

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
        $this->set('incomes', $this->Income->find('all',$params));
        $this->__optionSet();

        $this->set('title_for_layout','収入一覧');
    }



    public function edit($id=null)
    {
        $this->Income->id=$id;
        if ($this->request->is('post')) {
            //元の情報
            $this->set('inputed', $this->Income->find('first', array('conditions'=> array('Income.id'=>$this->request->data['Income']['id']))));
            $this->__optionSet();
            $this->set('title_for_layout','収入情報修正');

        }else {
            $this->Session->setFlash('failed!');
            $this->redirect(array('index'));
        }
    }



    public function edit_action($id=null)
    {
        $this->Income->id=$id;
        if ($this->request->is('post')) {
            if ($this->Income->save($this->request->data)) {
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
            if ($this->Income->delete($this->Income->delete($this->request->data['Income']['id']))) {
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
