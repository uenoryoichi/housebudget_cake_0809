
<div class="container"> 
    <div class="row">
        <div class="col-md-offset-3 col-xs-6 well well-lg" >
            <div class="text-center">
                <h2>今月の収支</h2>
                <p>   出費：<?php echo h($pay_this_month);?>円  収入：<?php echo h($income_this_month);?>円</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-xs-6">
            <div class="center">
                <h2>口座情報</h2>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">口座名</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
                    <?php foreach ($user_accounts as $user_account): ?>
                    <tbody>
                        <tr>
                            <td><?php echo(h($user_account['Account']['name']));?></td>
                            <td><?php echo(h($user_account['UserAccount']['balance']));?></td>
                        </tr>
                    </tbody>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
