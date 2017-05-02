<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="panel panel-default">
    <form id="product" action="<?=Url::to(['menu/edituser'])?>" method="post" class="form-horizontal">
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
              <div class="col-sm-5">
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
                  超级管理员</label>
                <label class="checkbox-inline i-checks">
                  <input type="checkbox" value="option1">
                  超级管理员</label>
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <label class="col-sm-4 control-label">状&nbsp;&nbsp;&nbsp;态：</label>
              <div class="col-sm-8">
                <div class="radio i-checks">
                  <label>
                    <input type="radio" value="option1" name="a">
                    <i></i> 选项1</label>
                  <label>
                    <input type="radio" checked="" value="option2" name="a">
                    <i></i> 选项2（选中）</label>
                </div>
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
	$(function(){
    //当弹出框关闭的时候 动作
    $('#addRole').on('hide.bs.modal', function () {
      $('#addForm input').val('');
      $('#addForm textarea').val('');
    })

	})

  //删除角色
	function deleting(id){
		ShowDeletingDiv('','deleteItem('+ id +',"/index.php?m=Admin&c=Index&a=delRole")');
	}

  //编辑状态
	function SetStatus(obj,id){
		var has = $(obj).hasClass('active') ? 0 : 1;
		AjaxPost('/index.php?m=Admin&c=Index&a=editRole&act=status' + '&id=' + id + '&has=' + has,'empty','empty');
	}


	//编辑角色
	function editRole(id){
		//AjaxPost('/index.php?m=Admin&c=Index&a=editRole' + '&id=' + id,'empty','empty',function(data){
			var data = {"result":1,"action":"empty","msg":{"id":"1","pid":"0","rolename":"\u8d85\u7ea7\u7ba1\u7406\u5458","remark":"\u62e5\u6709\u7ad9\u70b9\u7684\u6700\u9ad8\u6743\u9650","status":"1","listorder":"0"}};
		  $('#editForm input').val('');
		  $('#editForm textarea').val('');
		  $('#editForm input[name="rolename"]').val(data.msg.rolename);
		  $('#editForm textarea[name="remark"]').val(data.msg.remark);
		  $('#editForm input[name="id"]').val(data.msg.id);
		  $('#editRole').modal('show');
		//});
	}
  //栏目权限
  function menuPriv(id){
    $('#iframe').attr('src','<?=Url::to(['menu/menu-list'])?>' + '?id=' + id);
    $('#menuPriv').modal('show');
  }
  function closeModal(id){
    $('#' + id).modal('hide');
  }

</script> 
<!-- iCheck -->
<?=Html::cssFile('@web/hAdmin/css/plugins/iCheck/custom.css')?>
<?=Html::jsFile('@web/hAdmin/js/plugins/iCheck/icheck.min.js')?>
<?=Html::script("$('.i-checks').iCheck({checkboxClass: 'icheckbox_square-green',radioClass: 'iradio_square-green',});", ['defer' => true])?>
