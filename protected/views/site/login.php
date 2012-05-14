
<title>SPM - Login</title>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="login">

            <div class="msg">Sourcing Project Management System Login</div>
        <p>
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
        </p>

        <p>
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password'); ?>
        </p>

        <p>
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </p>

        <p class="ac">
            <?php echo CHtml::submitButton('Login'); ?>
        </p>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->


<style type="text/css">
        /* ------------------
           reset
       ------------------ */
    html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote,
    pre, a, abbr, acronym, address, code, del, dfn, em, img, q, dl, dt,
    dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot,
    thead, tr, th, td { margin:0;padding:0;border:0;font-weight:normal;font-style:inherit;font-size:100%;font-family:inherit;vertical-align:baseline;}
    body {line-height:1.5;font-size:75%;width:100%; height:100%;}
    a img { border:none; }
    a { cursor:pointer; }
    :focus { outline: 0; }
    li { list-style:none; }
    table { border-collapse:collapse; border:none; }
    hr { display:none; }

        /* ------------------
           default
       ------------------ */
    body { margin:0 auto; padding:0; font-family:verdana, arial; color:#222; background:#ddd; text-align:center; }

        /* ------------------
           specific
       ------------------ */
    div.login { background:#fff; border:5px solid #aaa; width:450px; margin: 10em auto 2em auto; text-align:left; }

    div.form.loginform { padding:1.5em 0; }
    div.login input.LoginForm[username] { width:280px; vertical-align:middle; padding:2px; }
    div.login input.LoginForm[password] { width:280px; vertical-align:middle; padding:2px; }
    div.login input.LoginForm[rememberMe] { width:16px;}
    div.login input.submit { width:280px;text-align:center; font-size:1em; width:6em; color:#222; padding:.2em 1em; cursor:pointer; }
    div.login p { text-align:left; color:#333; padding:5px 0; }
    div.login p.ac { text-align:center !important; }
    div.login label { cursor:pointer; width:100px; float:left; display:block; line-height:180%; text-align:right; color:#555; margin-right:10px; }
    .msg { padding:10px 20px; color:#fff; margin:15px 0 0 0; background:#585858; }

</style>