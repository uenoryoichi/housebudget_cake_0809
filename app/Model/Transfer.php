<?php 

class Transfer extends AppModel
{
    public $belongsTo =array(
        'UserAccountRemitter' => array(
            'className' => 'UserAccount',
            'foreingKey' => 'user_account_id'
        ),
        'UserAccountRemittee' => array(
            'className' => 'UserAccount',
            'foreingKey' => 'user_account_id'
        ),
        'User'
    );
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
        'user_account_id_remitter'=>array(
            'rule'=>'numeric'
        ),
        'user_account_id_remittee'=>array(
            'rule'=>'numeric'
        ),
    );
}
