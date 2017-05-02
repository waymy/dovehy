<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="panel panel-default">
    <form id="product" action="<?=Url::to(['menu/adduser'])?>" method="post" class="form-horizontal">
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
                <input type="text" class="form-control w-max-300">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">密&nbsp;&nbsp;&nbsp;码：</label>
              <div class="col-sm-8">
                <input type="password" class="form-control w-max-300" name="password">
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
                <input type="text" class="form-control w-max-300">
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
              <button class="btn btn-white" type="submit">取消</button>
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
<?=Html::script("$('.i-checks').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green',});", ['defer' => true])?>
