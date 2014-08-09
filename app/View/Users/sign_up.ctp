<!-- View/Users/sign_up.ctp -->
<div class="container">
     <div class="row">       
         <div class="col-md-offset-3 col-md-6">
            <br><h2>次のフォームに入力してください</h2>
            <?php
            echo $this->Form->create('User',array('action'=>'sign_up','class'=>'form-horizontal well'));
            echo $this->Form->input('username',array('label'=>'ユーザー名'));
            echo $this->Form->input('email',array('label'=>'メールアドレス'));
            echo $this->Form->input('password');
            ?>
            <div class='center'>
            <?php echo $this->Form->end('登録'); ?>
            </div>  
        </div>
    </div>
</div>
