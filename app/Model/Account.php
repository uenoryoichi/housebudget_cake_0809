<?php  

class Account extends AppModel
{
  	public $hasMany ='UserAccount';
	public $belongsTo = array('AccountClassification');
}
