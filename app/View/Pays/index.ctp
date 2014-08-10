<?//支出一覧?>
<?= $this->element('shared/money_input_form', array(
    'title'                 => '支出', 
    'user_account_option'   => $user_account_option, 
    'specification_option'  => $pay_specification_option
))?>

<?// 支払一覧?>
<?= $this->element('shared/money_table', array(
    'titleName' => '支払一覧',
    'data'      => $pays
))?>
