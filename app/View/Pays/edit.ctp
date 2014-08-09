<div class="container">
    <div class="row"> 		
        <div class="col-md-offset-3 col-md-6">
            <br><h2>収入情報修正フォーム</h2>
            <?php 
            echo $this->Form->create('Pay',array('action'=>'edit_action','class'=>'form-inline well'));
            echo $this->Form->input('title',array('label'=>'名称','value'=>$inputed['Pay']['title']));
            echo $this->Form->input('amount',array('label'=>'金額','value'=>$inputed['Pay']['amount']));
            echo $this->Form->input('date',array(
                                        'class'=>'form-control-dateTime',
                                        'label'=>'日時',
                                        'selected'=>$inputed['Pay']['date']
                                    ));
            echo $this->Form->input('memo',array(
                                        'label'=>'メモ',
                                        'value'=>$inputed['Pay']['memo']
                                    ));
            echo $this->Form->input('user_account_id',array(
                                        'label'=>'口座名',
                                        'options' => $user_account_option,
                                        'selected' => $inputed['Pay']['user_account_id']
                                    ));
            echo $this->Form->input('pay_specification_id',array(
                                        'label'=>'分類',
                                        'options' => $pay_specification_option,
                                        'selected'=>$inputed['Pay']['pay_specification_id']
                                    ));
            ?>
            <div class='center'>
            <?php echo $this->Form->end('Save Pay'); ?>
            </div>  
        </div>
    </div>
</div>

