<?php 
class PaySpecification extends AppModel
{
        public $name ='PaySpecification';
       	public $belongsTo =array('User');
	
	public function select_option ($pay_specification_option=array())
	{
		$pay_specification_option=array();
        $params=array(
            'conditions'=>array(
                'OR'=>array(
                    'PaySpecification.user_id' => AuthComponent::user('id'),
                    'PaySpecification.user_id' => 0
                )
            )
        );
        foreach ($this->find('all', $params) as $data) {
			$pay_specification_option+=array($data['PaySpecification']['id'] => $data['PaySpecification']['name']);
		}
		return $pay_specification_option;

	}
}	
