<?
/**
 * 資金移動の入力フォーム
 * @params string $user_account_option   口座名の一覧
 * @params boolean $isEdit               編集か否か
 */
?>
<? if (empty($isEdit)) $isEdit = false ?>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
        <h2>資金移動情報<?= $isEdit ? '修正' : '入力'?>フォーム</h2>
            <?= $this->Form->create('Transfer',array('action'=>'add','class'=>'form-inline well'));?>
            <?= $this->Form->input('title',array('label'=>'名称'));?>
            <?= $this->Form->input('amount',array('label'=>'金額'));?>
            <?= $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時'));?>
            <?= $this->Form->input('memo',array('label'=>'メモ'));?>
            <?= $this->Form->input('user_account_remitter_id',array('label'=>'送金元','options' => $user_account_option));?>
            <?= $this->Form->input('user_account_remittee_id',array('label'=>'送金先','options' => $user_account_option));?>
            <?= $this->Form->hidden('user_id',array('value' => AuthComponent::user('id')));?>
            <div class='center'>
                <?= $this->Form->end(($isEdit ? 'Edit' : 'Save') . ' Transfer'); ?>
            </div>  
        </div>
    </div>
</div>

