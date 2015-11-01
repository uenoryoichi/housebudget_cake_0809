<?// 収入入力?>
<?= $this->element('shared/money_input_form', array(
    'title'                 => '収入', 
    'user_account_option'   => $user_account_option, 
    'specification_option'  => $income_specification_option
))?>

<?// 収入一覧?>
<?= $this->element('shared/money_table', array(
    'titleName' => '収入一覧',
    'data'      => $incomes
))?>

