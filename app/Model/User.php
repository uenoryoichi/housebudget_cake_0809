<?php 
//Model/User.php

class User extends AppModel
{
	public $name ='User';
	public $hasMany ='UserAccount';
	//public $hasMany ='Income';
	
	
    public $validate = array(
        'id' => array(
            'rule' => 'numeric'
        ),
        'username'=>array(
        	'rule'=>'alphaNumeric',
            'message'=>'英数字数字を入力してください'
        ),
        
        'email'=>array(
            'rule1' => array(
                'rule'=>'email',
                'require' => 'true',
                'allowEmpty' => 'false',
                'message' => 'メールアドレスを入力してください'  
            ),
            'rule2' => array(
                'rule' => 'isUnique',
                'message' => 'すでに登録されているメールアドレスです'
            )
        ),
        
        'password' => array(
        	'rule'=>'alphaNumeric',
            'require' => 'true',
            'message' => '必須項目です'
        )
    );
}
