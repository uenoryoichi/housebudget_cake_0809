<?// 入力フォーム?>
<?= $this->element('shared/transfer_input_form', array('user_account_option' => $user_account_option))?>

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
                    <?php foreach ($transfers as $transfer) {?>

                    <tbody>
                        <tr>
                            <td><?php echo h($transfer['Transfer']['title']);?></td>
                            <td><?php echo h($transfer['Transfer']['date']);?></td>
                            <td><?php echo h($transfer['Transfer']['amount']);?></td>
                            <td><?php echo h($transfer['UserAccountRemitter']['Account']['name']);?></td> 
                            <td><?php echo h($transfer['UserAccountRemittee']['Account']['name']);?></td>
                            <td><?php echo h($transfer['Transfer']['memo']);?></td>
                            <td class="center">
                                <div class="btn btn-xs btn-success">
                                    <?= $this->Html->link(__('編集'), '/' . $this->name . '/edit/' . $transfer['Transfer']['id'])?>
                                </div>
                            </td>
                            <td class="center">   
                                <div class="btn btn-xs btn-danger">
                                <?= $this->Html->link(__('削除'), '/' . $this->name . '/delete/' . $transfer['Transfer']['id'])?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <? } ?>
                </table>    
            </div>
        </div>    
    </div>
</div>

