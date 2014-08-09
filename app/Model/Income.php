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

    public function incomeThisMonth($income_this_month)
    {
        $income_this_month = NULL;
        $year = date('Y');
        $month = date('m');

        $params = array(
            'conditions'=>array(
                'Income.user_id' => AuthComponent::user('id'),
                "YEAR(Income.date) = $year",
                "MONTH(Income.date) = $month"
            ),
            'fields' => array('sum(Income.amount)'),
            'group' => array('Income.user_id')
        ); 
        $income_this_month = $this->find('first', $params);
        
        return $income_this_month;
    }    
}
