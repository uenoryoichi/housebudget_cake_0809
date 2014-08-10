<?
/**
 * 支払収入の入力テーブル
 * @params string $user_account_option   口座名の一覧
 * @params array  $specification_option  分類一覧
 * @params boolean $isEdit               編集か否か
 */
?>
<? if (empty($isEdit)) $isEdit = false ?>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
            <h2><?= $title ?>情報<?= $isEdit ? '編集' : '入力' ?>フォーム</h2>
            <?= $this->Form->create(Inflector::singularize($this->name),array('action'=> $isEdit ? 'edit_action' : 'add','class'=>'form-inline well'))?>
            <?= $this->Form->input('title',array('label'=>'名称'))?>
            <?= $this->Form->input('amount',array('label'=>'金額'))?>
            <?= $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時'))?>
            <?= $this->Form->input('memo',array('label'=>'メモ'))?>
            <?= $this->Form->input('user_account_id',array('label'=>'口座名','options' => h($user_account_option)))?>
            <?= $this->Form->input(Inflector::underscore($this->name) . '_specification_id',array('label'=>'分類','options' => h($specification_option)))?>
            <?= $this->Form->hidden('user_id',array('value'=> AuthComponent::user('id')))?>
            <div class='center'>
            <?= $this->Form->end(($isEdit ? 'Edit ' : 'Save ') . Inflector::singularize($this->name)); ?>
            </div>  
        </div>
    </div>
</div>

