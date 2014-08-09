<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <div class = "center">
                <br><br><h2>使用中の口座</h2>       
                <div class="alert alert-warning alert-dismissable">
                    <?php $this->Form->button('&times;', array('class' => 'close', 'date-dismiss' => 'alert', 'aria-hidden' => 'true'))?>
                    <strong >口座情報を削除すると関連する収入支出情報も削除されます</strong>
                </div>
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">削除</th>
                            <th scope="col">口座名</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
						
                    <?php foreach ($user_account_uses as $user_account_use):?>
                    <tbody>
                        <tr>
                            <td>
                                <?php 
                                echo $this->Form->create('UserAccount',array('action'=>'hidden'));
                                echo $this->Form->hidden('id',array('value'=>h($user_account_use['UserAccount']['id'])));
                                echo $this->Form->submit('削除',array('class'=>'btn btn-danger btn-xs'),array('confirm'=>'削除してよろしいでしょうか？'));
                                echo $this->Form->end();
                                ?>
                            </td>
                            <td><?php echo h($user_account_use['Account']['name']);?></td> 	
                            <td><?php echo h($user_account_use['UserAccount']['balance']);?></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>

                </table>
            </div>
        </div>
	
	<?php //===========================================================?>
	
	<?php //使用してない口座一覧?>
        <div class="col-md-offset-2 col-md-4">
            <div class = "center">
                <br><br><h2>登録されている口座から選択</h2>
                <?php //echo $this->Form->create('UserAccount', array('controller'=>'UserAccountsController', 'action' => 'siyou', 'class' => 'form-horizontal well'))?>
             	<?php //foreach $account_classifications as $account_classification: // #1 ?>
                <br><h2><?php //echo $account_classification['AccountClassification']['name']?></h2>
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr >
                            <th scope="col" class="text-center">使用</th>
                            <th scope="col">口座名</th>
                        </tr>
                    </thead>
							
                    <?php //foreach ($user_account_not_uses as $user_account_not_use): // #2 ?>
                    <?php for ($i=0, $count=count($user_account_not_uses); $i <$count; $i++): // #2 ?>
                    <?php //if ($user_account_not_use['Account']['account_classification_id']==$account_classification['AccountClassification']['id']):?>
					<tbody> 
                       <tr>
                            <td class="center">
                                <?php /*echo $this->Form->checkbox(
                                       'account_id][',  //##### 
                                        array(
                                            'label' => false,
                                            'hiddenField' => false,
                                            'multiple' => 'checkbox', 
                                            'value' => $user_account_not_uses[$i]['Account']['id']
                                        )
                                    ) */?>
<?php ?>
                                <?php 
                                echo $this->Form->create('UserAccount',array('action'=>'add'));
                                echo $this->Form->hidden('account_id',array('value'=>h($user_account_not_uses[$i]['Account']['id'])));
                                echo $this->Form->submit('追加',array('class'=>'btn btn-primary btn-xs'));
                                echo $this->Form->end();
                                ?>
                            </td>
                            <td><?php echo h($user_account_not_uses[$i]['Account']['name']);?></td>
                        </tr>
                    </tbody>
							<?php //endif;?>
							<?php //endforeach;?>
							<?php endfor;?>
                </table>
                <!--<div class="row">
                    <div class="center">
                        <?php  
                        //echo $this->Form->submit('選択',array('class'=>'btn btn-primary'));
                        //echo $this->Form->end();
                        ?>
                    </div>
                </div>-->
                    <?php //endfor;?>
			</div>
		</div>
	</div>
</div>	
	<?php //===========================================================?>
	<?php //口座追加?>
<div class="container">
	<div class="row"> 		
		<div class="col-md-offset-3 col-md-6">
		    <br><h2 class="center">上記にない口座を登録</h2>
            <?php 
            echo $this->Form->create('account', array('action'=>'test', 'class' => 'form-horizontal well'));
            echo $this->Form->input(
                'account_classification_id', 
                array(
                    'label'=>'口座種別', 
                    'options'=>h($account_classification_options)
                )
            );
            echo $this->Form->input('name', array('label' => '名称'));    
            echo $this->Form->input('kana', array('label' => 'かな（全角ひらがな）'));    
?>
            <div class="center">
<?php
            echo $this->Form->submit('追加', array('class'=> 'btn btn-success'));
            echo $this->Form->end();
            ?>
            </div>
        </div>
    </div>
</div>
				
