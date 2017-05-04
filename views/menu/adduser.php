<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="panel panel-default">
    <form id="signupForm" action="<?=Url::to(['menu/adduser'])?>" method="post" class="form-horizontal">
      <header class="panel-heading bg-light">
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#profile" data-toggle="tab">基础信息</a></li>
          <li class=""><a href="#others" data-toggle="tab">其他设置</a></li>
        </ul>
      </header>
      <div class="panel-body">
        <div class="tab-content">
          <div class="tab-pane active" id="profile">
            <div class="form-group">
              <label class="col-sm-4 control-label">用户名：</label>
              <div class="col-sm-8">
                <input id="cname" name="name" minlength="2" type="text" class="form-control w-max-300" required="" aria-required="true" aria-describedby="cname-error" aria-invalid="true">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">密&nbsp;&nbsp;&nbsp;码：</label>
              <div class="col-sm-8">
                <input id="password" name="password" class="form-control w-max-300" type="password">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">密&nbsp;&nbsp;&nbsp;码：</label>
              <div class="col-sm-8">
                <input id="confirm_password" name="confirm_password" class="form-control w-max-300" type="password">
                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span>
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">手机号：</label>
              <div class="col-sm-8">
                <input type="text" class="form-control w-max-300">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">邮&nbsp;&nbsp;&nbsp;箱：</label>
              <div class="col-sm-8">
                <input type="email" class="form-control w-max-300" name="email" required="" aria-required="true">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">管理组：</label>
              <div class="col-sm-8">
                <select class="form-control w-max-300" name="account" multiple="">
                  <?php foreach($role as $v){?>
                  <option value="<?=$v['id'];?>">
                  <?=$v['title'];?>
                  </option>
                  <?php } ?>
                </select>
                <!--<label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>-->
              </div>
            </div>
          </div>
          <div class="tab-pane" id="others"> </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
              <button class="btn btn-primary" type="submit">保存内容</button>
              <button class="btn btn-white" type="reset">取消</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
	
</script> 
<!-- iCheck -->
<?=Html::cssFile('@web/hAdmin/css/plugins/iCheck/custom.css')?>
<?=Html::jsFile('@web/hAdmin/js/plugins/iCheck/icheck.min.js')?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/iCheck/icheck.min.js",['depends' => 'app\assets\JqueryAsset']);  ?>
<?=Html::script("$('.i-checks').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green',});", ['defer' => true])?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/validate/jquery.validate.min.js",['depends' => 'app\assets\JqueryAsset']);?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/validate/messages_zh.min.js",['depends' => 'app\assets\JqueryAsset']);?>
<?php $this->registerJsFile("@web/hAdmin/js/form-validate.js",['depends' => 'app\assets\JqueryAsset']);?>
<?php
$this->registerJs('
$(function () {
 $("#signupForm").submit(function(){
 });
});
', \yii\web\View::POS_END);
?>