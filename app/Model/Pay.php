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

    public function payThisMonth()
    {
        $nextMonth = new DateTime("now");
        $nextMonth->modify('+ 1 month'); 

        $params = array(
            'conditions'=>array(
                'Pay.user_id' => AuthComponent::user('id'),
                "Pay.date >= " => date('Y-m'),
                "Pay.date < " => $nextMonth->format('Y-m'),
            ),
            'fields' => array('Pay.amount'),
        ); 

        $totalPayInThisMonth = 0;
        foreach($this->find('list', $params) as $key => $value){
            $totalPayInThisMonth += $value;
        }
        return $totalPayInThisMonth;
    }    
}
