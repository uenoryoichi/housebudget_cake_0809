<?php 

class Pay extends AppModel
{
    public $belongsTo =array('UserAccount','User','PaySpecification');
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
                'maxLength', 255
            )
        ),
         */
        'user_account_id'=>array(
            'rule'=>'numeric'
        ),
        'pay_specification_id'=>array(
            'rule'=>'numeric'
        )
    );

    public function payThisMonth($pay_this_month)
    {
        $pay_this_month = NULL;
        $year = date('Y');
        $month = date('m');

        $params = array(
            'conditions'=>array(
                'Pay.user_id' => AuthComponent::user('id'),
                "YEAR(Pay.date) = $year",
                "MONTH(Pay.date) = $month"
            ),
            'fields' => array('sum(Pay.amount)'),
            'group' => array('Pay.user_id')
        ); 
        $pay_this_month = $this->find('first', $params);
        
        return $pay_this_month;
    }    
}
