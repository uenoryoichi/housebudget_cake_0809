<?php 
class IncomeSpecification extends AppModel
{
        public $name ='IncomeSpecification';
       	public $belongsTo =array('User');
	
	public function select_option ($income_specification_option=array())
	{
		$income_specification_option=array();
        $params=array(
            'conditions'=>array(
                'OR'=>array(
                    'IncomeSpecification.user_id' => AuthComponent::user('id'),
                    'IncomeSpecification.user_id' => 0
                )
            )
        );
        foreach ($this->find('all', $params) as $data) {
			$income_specification_option+=array($data['IncomeSpecification']['id'] => $data['IncomeSpecification']['name']);
		}
		return $income_specification_option;
	}
}	
