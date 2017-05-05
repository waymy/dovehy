<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="panel panel-default">
    <form action="<?=Url::to(['menu/adduser'])?>" id="signupForm" method="post" class="form-horizontal">
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
                <input name="username" type="text" class="form-control w-max-300" value="<?=$result['username']?>" readonly="readonly">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">密&nbsp;&nbsp;&nbsp;码：</label>
              <div class="col-sm-8">
                <p class="form-control-static"><a href="javascript:;" style="margin-top:20px;" id='EditPassword'>点击修改</a></p>
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Token：</label>
              <div class="col-sm-8">
                  <input readonly class="form-control w-max-300" type="text" name="token" value="<?=$result['token']?>">
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
                <input type="text" class="form-control w-max-300" name="email" value="<?=$result['email']?>">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">管理组：</label>
              <div class="col-sm-8">
                <select class="form-control w-max-300" id="level" name="level" multiple="">
                  <?php foreach($role as $v){
                      if($v['id'] == $result['level']){
                        echo '<option value="'.$v['id'].'" selected>'.$v['rolename'].'</option>';
                      }else{
                       echo '<option value="'.$v['id'].'">'.$v['rolename'].'</option>';
                      }
                    }
                    ?>
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
              <button class="btn btn-primary" id="SaveEventbtn" type="submit">保存内容</button>
              <button class="btn btn-white" type="reset">取消</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- iCheck -->
<?=Html::cssFile('@web/hAdmin/css/plugins/iCheck/custom.css')?>
<?=Html::jsFile('@web/hAdmin/js/plugins/iCheck/icheck.min.js')?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/iCheck/icheck.min.js",['depends' => 'app\assets\AppAsset']);  ?>
<?=Html::script("$('.i-checks').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green',});", ['defer' => true])?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/validate/jquery.validate.min.js",['depends' => 'app\assets\AppAsset']);?>
<?php $this->registerJsFile("@web/hAdmin/js/plugins/validate/messages_zh.min.js",['depends' => 'app\assets\AppAsset']);?>
<?php $this->registerJsFile("@web/hAdmin/js/form-validate.js",['depends' => 'app\assets\AppAsset']);?>
<?php
$this->registerJs('
$(function () {
});
', \yii\web\View::POS_END);
?>

