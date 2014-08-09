<h2>収入一覧</h2>
<div class="container">
    <div class="row"> 		    
        <div class="col-md-offset-3 col-md-6">
            <br><h2>収入情報入力フォーム</h2>
            <?php  
            echo $this->Form->create('Transfer',array('action'=>'add','class'=>'form-inline well'));
            echo $this->Form->input('title',array('label'=>'名称'));
            echo $this->Form->input('amount',array('label'=>'金額'));
            echo $this->Form->input('date',array('class'=>'form-control-dateTime','label'=>'日時'));
            echo $this->Form->input('memo',array('label'=>'メモ'));
            echo $this->Form->input('user_account_remitter_id',array('label'=>'送金元','options' => $user_account_option));
            echo $this->Form->input('user_account_remittee_id',array('label'=>'送金先','options' => $user_account_option));
            echo $this->Form->hidden('user_id',array('value' => AuthComponent::user('id')));
            ?>
            <div class='center'>
            <?php echo $this->Form->end('Save Transfer'); ?>
            </div>  
        </div>
    </div>
</div>

<div class="container">
    <div class="row"> 		
        <div class="col-md-offset-1 col-xs-10">
            <div class = "center">
                <h2>収入情報</h2>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">日付</th>
                            <th scope="col">金額</th>
                            <th scope="col">送金元口座名</th>
                            <th scope="col">送金先口座名</th>
                            <th scope="col">メモ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>   
                    </thead>
                    <?php foreach ($transfers as $transfer):?>

                    <tbody>
                        <tr>
                            <td><?php echo h($transfer['Transfer']['title']);?></td>
                            <td><?php echo h($transfer['Transfer']['date']);?></td>
                            <td><?php echo h($transfer['Transfer']['amount']);?></td>
                            <td><?php echo h($transfer['UserAccountRemitter']['Account']['name']);?></td> 
                            <td><?php echo h($transfer['UserAccountRemittee']['Account']['name']);?></td>
                            <td><?php echo h($transfer['Transfer']['memo']);?></td>
                            <td class="center">
                            <?php  
                                echo $this->Form->create('Transfer',array('action'=>'edit'));
                                echo $this->Form->hidden('id',array('value'=>$transfer['Transfer']['id']));
                                echo $this->Form->submit('編集',array('class'=>'btn btn-success btn-xs'));
                                echo $this->Form->end();
                            ?>
                            </td>
                            <td class="center">   
                            <?php 
                                echo $this->Form->create('Transfer',array('action'=>'delete'));
                                echo $this->Form->hidden('id',array('value'=>$transfer['Transfer']['id']));
                                echo $this->Form->submit(
                                    '削除',
                                    array('class'=>'btn btn-danger btn-xs'),
                                    array('confirm'=>'削除してよろしいでしょうか？')
                                );
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

