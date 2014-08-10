<?= debug(phpinfo())?>
<h2>支出一覧</h2>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
            <br><h2>支出情報入力フォーム</h2>
            <?= $this->Form->create('Pay',array('action'=>'add','class'=>'form-inline well')); ?>
            <?= $this->Form->input('title',array('label'=>'名称')); ?>
            <?= $this->Form->input('amount',array('label'=>'金額')); ?>
            <?= $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時')); ?>
            <?= $this->Form->input('memo',array('label'=>'メモ')); ?>
            <?= $this->Form->input('user_account_id',array('label'=>'口座名','options' => $user_account_option)); ?>
            <?= $this->Form->input('pay_specification_id',array('label'=>'分類','options' => $pay_specification_option)); ?>
            <?= $this->Form->hidden('user_id',array('value'=> AuthComponent::user('id'))); ?>
            <div class='center'>
            <?= $this->Form->end('Save Pay'); ?>
            </div>  
        </div>
    </div>
</div>
<?= debug($this->name);?>
<div class="container">
    <div class="row"> 		
        <div class="col-md-offset-1 col-xs-10">
            <div class = "center">
                <h2>支出情報</h2>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">日付</th>
                            <th scope="col">金額</th>
                            <th scope="col">分類</th>
                            <th scope="col">口座名</th>
                            <th scope="col">メモ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>   
                    </thead>
                    <? foreach ($pays as $pay) { ?>

                        <tbody>
                            <tr>
                                <td><?= h($pay['Pay']['title']);?></td>
                                <td><?= h($pay['Pay']['date']);?></td>
                                <td><?= h($pay['Pay']['amount']);?></td>
                                <td><?= h($pay['PaySpecification']['name']);?></td> 
                                <td><?= h($pay['UserAccount']['Account']['name']);?></td>
                                <td><?= h($pay['Pay']['memo']);?></td>
                                <td class="center">
                                    <?= $this->Form->create('Pay',array('action'=>'edit'));?>
                                    <?= $this->Form->hidden('id',array('value'=>$pay['Pay']['id']));?>
                                    <?= $this->Form->submit('編集',array('class'=>'btn btn-success btn-xs'));?>
                                    <?= $this->Form->end();?>
                                </td>
                                <td class="center">   
                                    <?= $this->Form->create('Pay',array('action'=>'delete'));?>
                                    <?= $this->Form->hidden('id',array('value'=>$pay['Pay']['id']));?>
                                    <?= $this->Form->submit('削除',array('class'=>'btn btn-danger btn-xs'),array('confirm'=>'削除してよろしいでしょうか？'));?>
                                    <?= $this->Form->end();?>
                                </td>
                            </tr>
                        </tbody>
                    <? } ?>
                </table>    
            </div>
        </div>    
    </div>
</div>

