<div class="container">
    <div class="row"> 		
        <div class="col-md-offset-3 col-md-6">
            <br><h2>収入情報修正フォーム</h2>
            <?php 
            echo $this->Form->create('Transfer',array('action'=>'edit_action','class'=>'form-inline well'));
            echo $this->Form->input('title',array('
                                        label'=>'名称',
                                        'value'=>$inputed['Transfer']['title']
                                    ));
            echo $this->Form->input('amount',array(
                                        'label'=>'金額',
                                        'value'=>$inputed['Transfer']['amount']
                                    ));
            echo $this->Form->input('date',array(
                                        'class'=>'form-control-dateTime',
                                        'label'=>'日時','selected'=>$inputed['Transfer']['date']
                                    ));
            echo $this->Form->input('memo',array(
                                        'label'=>'メモ',
                                        'value'=>$inputed['Transfer']['memo']
                                    ));
            echo $this->Form->input('user_account_id_remitter',array(
                                        'label'=>'送金元口座名',
                                        'options' => $user_account_option,
                                        'selected' => $inputed['Transfer']['user_account_remitter_id']
                                    ));
            echo $this->Form->input('user_account_id_remittee',array(
                                        'label'=>'送金元口座名',
                                        'options' => $user_account_option,
                                        'selected' => $inputed['Transfer']['user_account_remittee_id']
                                    ));
            ?>
            <div class='center'>
            <?php echo $this->Form->end('Save Transfer'); ?>
            </div>  
        </div>
    </div>
</div>

