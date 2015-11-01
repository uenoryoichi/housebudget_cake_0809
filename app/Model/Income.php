<?php 

class Income extends AppModel
{
    public $name ='Income';
    public $belongsTo =array('UserAccount','User','IncomeSpecification');
    public $validate = array(
        'user_id' => array(
            'rule' => 'numeric'
        ),
        /*
        'title'=>array(
            'rule'=>array(
                'maxLength', 45
            )
        ),
         */
        'amount'=>array(
            'rule'=>'numeric',
            'message'=>'数字を入力してください'
        ),
        'date'=>array(
        	'rule'=>'datetime',
        	'message' => '日付を入力してください',
        ),
        /*
        'memo'=>array(
            'rule'=>array(
                'maxLength',255
            )
        ),
         */
        'user_account_id'=>array(
            'rule'=>'numeric'
        ),
        'income_specification_id'=>array(
            'rule'=>'numeric'
        )
    );

    public function incomeThisMonth()
    {
        $nextMonth = new DateTime("now");
        $nextMonth->modify('+ 1 month'); 
        $params = array(
            'conditions'=>array(
                'Income.user_id' => AuthComponent::user('id'),
                "Income.date >= " => date('Y-m'),
                "Income.date < " => $nextMonth->format('Y-m'),
            ),
            'fields' => array('Income.amount'),
        ); 

        $totalIncomeInThisMonth = 0;
        foreach($this->find('list', $params) as $key => $value){
            $totalIncomeInThisMonth += $value;
        }
        return $totalIncomeInThisMonth;
    }    
}
