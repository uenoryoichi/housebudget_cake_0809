<!-- View/Users/login_form.ctp -->
<div class="container">
    <div class="row">       
        <div class="col-md-offset-3 col-md-6">
            <h2>メールアドレスとパスワードを記入してログインしてください</h2>
            <?php
            echo $this->Form->create('User',array('action'=>'login','class'=>'form-horizontal well'));
            //echo $this->Form->input('username',array('label'=>'ユーザー名'));
            echo $this->Form->input('email',array('label'=>'メールアドレス'));
            echo $this->Form->input('password');
            echo $this->Form->checkbox('save');
            ?>
            次回からは自動的にログインする
            <div class='center'>
                <?php echo $this->Form->end('login!'); ?>
            </div>  
        </div>
    </div>
</div>


<div class="container">
    <div class="row">       
        <div class="col-md-offset-3 col-md-6">
            <div class="well">
                <dl>
                    <dt>登録されていない方はこちらから</dt>
                    <dd class="center">
                        <?php echo $this->Html->Link('ユーザー登録',array('action'=>'sign_up'),array('class'=>'btn btn-success'));?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
        

<div class="container">
    <div class="row">       
        <div class="col-md-offset-3 col-md-6">
            <div class="well">    
                <dl>
                <dt>登録をせずにデモ用ユーザーとして試す</dt>
<?php
                echo $this->Form->create('User',array('action'=>'login','class'=>'form-horizontal'));
                echo $this->Form->hidden('email',array('value'=>'demo0@demo0.demo0'));
                echo $this->Form->hidden('password',array('value'=>'demo0demo0'));
?>
                <div class="center">
                    <?php echo $this->Form->end('デモ版');?>
                </div>
                </dl>
            </div>
        </div>
     </div>
</div>





