<?php  

class AccountClassification extends AppModel
{
  	public $hasMany ='Account';
    public $validate = array(
        'name' => array(
            'rule' => 'numeric'
        )
    );


	public function select_option ($account_classification_option=array())
	{
		$account_classification_option=array();
        foreach ($this->find('all') as $data) {
			$account_classification_option+=array($data['AccountClassification']['id'] => $data['AccountClassification']['name']);
		}
		return $account_classification_option;
	}


}
