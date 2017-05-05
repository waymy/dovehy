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
                                <input name="username" type="text" class="form-control w-max-300">
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
                                <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 请再次输入您的密码</span> </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Token：</label>
                            <div class="col-sm-8">
                                <div class="input-group m-b">
                                    <input id="setToken" readonly class="form-control" style="width:230px;" type="text" name="token" value="">
                                    <span class="input-group-btn" style="float:left;"> <a class="btn btn-default p-lr-dm" href="javascript:;" onclick="suggestPassword('setToken')">随机</a> </span> </div>
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
                                <input type="text" class="form-control w-max-300" name="email">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">管理组：</label>
                            <div class="col-sm-8">
                                <select class="form-control w-max-300" id="level" name="level" multiple="">
                                    <?php foreach($role as $v){?>
                                        <option value="<?=$v['id'];?>">
                                            <?=$v['rolename'];?>
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
