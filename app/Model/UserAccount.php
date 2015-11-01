<?php 

class UserAccount extends AppModel
{
    public $components = array(
        'Auth'  
    );
    public $uses= array(
        'Account'
    );
    public $hasMany =array(
        'Income', 
        'Pay',
        'TransferRemitter' => array(
            'className' => 'Transfer',
            'foreignKey' => 'user_account_remitter_id'
        ),
        'TransferRemittee' => array(
            'className' => 'Transfer',
            'foreignKey' => 'user_account_remittee_id'
        )
    );

	public $belongsTo = array('Account','User');

    public $validate = array(
        'name' => array(
            'rule'=>'notEmpty',
            'message'=>'入力してください'
        ),
        'kana' => array(
            'rule'=>'notEmpty',
            'message'=>'入力してください'
        ),
    
    );
/*
 *自分の登録口座を選択しとして表示させるため配列を生成
 *
 */
    public function select_option ($user_account_option=array())
    {
		$user_account_option=array();
		foreach ($this->user_account_use('user_account_use') as $data) {
			$user_account_option+=array($data['UserAccount']['id'] => $data['Account']['name']);
		}
		return $user_account_option;
    }

/*
 *今使っている口座
 */
    public function user_account_use ($user_account_use = array())
    {
        $user_account_use = array();
        $params = array(
            'conditions' => array(
                'UserAccount.user_id' => AuthComponent::user('id'),
                'UserAccount.use_flag' => 0
            )
        );
        $user_account_use = $this->find('all', $params);
        return $user_account_use;
    }

/*
 *使っていない口座
 */
    public function user_account_not_use ($user_account_not_use = array())
    {
        $user_account_use = $this->user_account_use('user_account_use');    
        $user_account_use_id = array();
        for ($i= 0, $count_u_a_u=count($user_account_use);  $i < $count_u_a_u; $i++){
            $user_account_use_id[$i]=$user_account_use[$i]['UserAccount']['account_id'];
        }
        $params = array(
            'conditions' => array(
                'NOT' => array(
                    'Account.id' => $user_account_use_id
                ),
                'OR' => array(
                    'user_id' => 0,
                    'user_id' => AuthComponent::user('id')
                )
            ),
            'order' => array('Account.account_classification_id')
        );
        $user_account_not_use=$this->Account->find('all', $params);
        return $user_account_not_use;
    }

    function getBalance ($userId) {
        $params = array('conditions' => array('UserAccount.user_id' => $userId));
        $userAccounts = $this->find('all',$params);
        foreach($userAccounts as $key => $userAccount) {
            $nowBalance = $userAccount['UserAccount']['balance'];
            $nowBalance += $this->__getBalanceDifffterChecked($userAccount['Income'], $userAccount['UserAccount']['checked']);
            $nowBalance += $this->__getBalanceDifffterChecked($userAccount['TransferRemittee'], $userAccount['UserAccount']['checked']);
            $nowBalance -= $this->__getBalanceDifffterChecked($userAccount['Pay'], $userAccount['UserAccount']['checked']);
            $nowBalance -= $this->__getBalanceDifffterChecked($userAccount['TransferRemitter'], $userAccount['UserAccount']['checked']);
            $userAccounts[$key]['UserAccount']['nowBalance'] = $nowBalance;
        }
        return $userAccounts;
    }

    function __getBalanceDifffterChecked($targets, $checked) {
        $balanceDiff = 0;
        foreach($targets as $target){
            if($target['date'] > $checked) $balanceDiff += $target['amount'];
        }
        return $balanceDiff;
    }
}

