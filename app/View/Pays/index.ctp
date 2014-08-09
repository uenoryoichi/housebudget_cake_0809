<h2>test</h2>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
            <br><h2>test入力フォーム</h2>
            <? 
            $optionPre = array(
                '1' => '10000',
                '2' => '15000',
                '3' => '20000',
            );
            $optionAfter1 = array(
                '1' => '10000',
                '2' => '20000',
                '3' => '30000',
            );
            
            $optionAfter2 = array(
                '1' => '15000',
                '2' => '30000',
                '3' => '45000',
            );
            
            $optionAfter3 = array(
                '1' => '20000',
                '2' => '40000',
                '3' => '60000',
            );
            
            ?>
            <?= $this->Form->create('Test',array('action'=>'add','class'=>'form-inline well')) ?>
            <?= $this->Form->input('number',array('type' => 'radio', 'label'=>'名称', 'options' => $optionPre)) ?>
            <?= $this->Form->input('reward',array('type' => 'radio', 'label'=>'金額', 'options' => $optionAfter1)) ?>
            <?= $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時')) ?>
            <?= $this->Form->input('memo',array('label'=>'メモ')) ?>
            <?= $this->Form->input('user_account_id',array('label'=>'口座名','options' => $user_account_option)) ?>
            <?= $this->Form->input('pay_specification_id',array('label'=>'分類','options' => $pay_specification_option)) ?>
            <?= $this->Form->hidden('user_id',array('value'=> AuthComponent::user('id'))) ?>
            <div class='center'>
            <?= $this->Form->end('Save Pay') ?>
            </div>  
        </div>
    </div>
</div>

<h2>支出一覧</h2>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
            <br><h2>支出情報入力フォーム</h2>
            <?php  
            echo $this->Form->create('Pay',array('action'=>'add','class'=>'form-inline well'));
            echo $this->Form->input('title',array('label'=>'名称'));
            echo $this->Form->input('amount',array('label'=>'金額'));
            echo $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時'));
            echo $this->Form->input('memo',array('label'=>'メモ'));
            echo $this->Form->input('user_account_id',array('label'=>'口座名','options' => $user_account_option));
            echo $this->Form->input('pay_specification_id',array('label'=>'分類','options' => $pay_specification_option));
            echo $this->Form->hidden('user_id',array('value'=> AuthComponent::user('id')));
            ?>
            <div class='center'>
            <?php echo $this->Form->end('Save Pay'); ?>
            </div>  
        </div>
    </div>
</div>

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
                    <?php foreach ($pays as $pay):?>

                    <tbody>
                        <tr>
                            <td><?php echo h($pay['Pay']['title']);?></td>
                            <td><?php echo h($pay['Pay']['date']);?></td>
                            <td><?php echo h($pay['Pay']['amount']);?></td>
                            <td><?php echo h($pay['PaySpecification']['name']);?></td> 
                            <td><?php echo h($pay['UserAccount']['Account']['name']);?></td>
                            <td><?php echo h($pay['Pay']['memo']);?></td>
                            <td class="center">
                            <?php  
                                echo $this->Form->create('Pay',array('action'=>'edit'));
                                echo $this->Form->hidden('id',array('value'=>$pay['Pay']['id']));
                                echo $this->Form->submit('編集',array('class'=>'btn btn-success btn-xs'));
                                echo $this->Form->end();
                            ?>
                            </td>
                            <td class="center">   
                            <?php 
                                echo $this->Form->create('Pay',array('action'=>'delete'));
                                echo $this->Form->hidden('id',array('value'=>$pay['Pay']['id']));
                                echo $this->Form->submit('削除',array('class'=>'btn btn-danger btn-xs'),array('confirm'=>'削除してよろしいでしょうか？'));
                                echo $this->Form->end();
                            ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>    
            </div>
        </div>    
    </div>
</div>

    <script src="js/script.js"></script>
<script >
$(function(){
    $("#TestNumber2").click(function(){
        $("#TestReward1 + label").text("<?= $optionAfter2['1']?>")
        $("#TestReward2 + label").text("<?= $optionAfter2['2']?>")
        $("#TestReward3 + label").text("<?= $optionAfter2['3']?>")
    });

    $("#TestNumber3").click(function(){
        $("#TestReward1 + label").text("<?= $optionAfter3['1']?>")
        $("#TestReward2 + label").text("<?= $optionAfter3['2']?>")
        $("#TestReward3 + label").text("<?= $optionAfter3['3']?>")
    });

    $("#TestNumber1").click(function(){
        $("#TestReward1 + label").text("<?= $optionAfter1['1']?>")
        $("#TestReward2 + label").text("<?= $optionAfter1['2']?>")
        $("#TestReward3 + label").text("<?= $optionAfter1['3']?>")
    });

});
</script>
