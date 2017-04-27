<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>角色权限</h5>
          <div class="ibox-tools"> <a data-toggle="modal" href="#addRole" class="btn btn-primary btn-xs">添加角色</a> </div>
        </div>
        <div class="ibox-content">
          <div class="project-list">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="20"></th>
                  <th width="20">ID</th>
                  <th>角色名称</th>
                  <th width="20"></th>
                  <th width="80">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" checked class="i-checks" name="input[]"></td>
                  <td>111</td>
                  <td class="project-title">米莫说｜MiMO Show</td>
                  <td><a href="#" onclick="SetDisplay(this,94)" data-toggle="class" class=""><i class="fa fa-check text-navy text-active"></i><i class="fa fa-times text-danger text"></i></a></td>
                  <td class="project-actions"><div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">操 作 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:;" onclick="editRole(1)"><i class="fa fa-edit"></i> 编辑</a></li>
                        <li class="divider m-tb-sm"></li>
                        <!--<li>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-wrench"></i> 权限设置</li>
                              <li class="divider m-tb-sm"></li>-->
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cogs"></i> 栏目权限</li>
                        <li class="divider m-tb-sm"></li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i> &nbsp;删除</li>
                      </ul>
                    </div></td>
                </tr>
                <tr>
                  <td><input type="checkbox" checked class="i-checks" name="input[]"></td>
                  <td>111</td>
                  <td class="project-title">米莫说｜MiMO Show</td>
                  <td><a href="#" onclick="SetDisplay(this,94)" data-toggle="class" class=""><i class="fa fa-check text-navy text-active"></i><i class="fa fa-times text-danger text"></i></a></td>
                  <td class="project-actions"><div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">操 作 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:;" onclick="editRole(8)"><i class="fa fa-edit"></i> 编辑</a></li>
                        <li class="divider m-tb-sm"></li>
                        <!--<li><a href="javascript:;" onclick="deleting(8)"><i class="fa fa-wrench"></i> 权限设置</a></li>
                              <li class="divider m-tb-sm"></li>-->
                        <li><a href="javascript:;" onclick="menuPriv(8)"><i class="fa fa-cogs"></i> 栏目权限</a></li>
                        <li class="divider m-tb-sm"></li>
                        <li><a href="javascript:;" onclick="deleting(8)"><i class="fa fa-trash-o"></i> &nbsp;删除</a></li>
                      </ul>
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 添加框 -->
<div class="modal fade" id="addRole">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> 添加角色</h4>
        </div>
        <form  id="addForm" class="form-horizontal">
        <div class="modal-body">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="p-b"><label class="control-label" for="input-id-1">角色名称</label></td>
                </tr>
                <tr>
                  <td>
                    <input type="text" class="form-control w-max-300" id="input-id-1" name="rolename" value="" datatype="s" nullmsg="请输入角色名称">
                    <div class="Validform_checktip formError"></div>
                  </td>
                </tr>
                <tr>
                  <td  class="p-b"><label class="control-label" for="input-id-2">remark(备注说明)</label></td>
                </tr>
                <tr>                    
                  <td>
                    <textarea class="form-control w-max-300" rows="3" data-minwords="3" name="remark" id="input-id-2"></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button id="SaveRolebtn" type="submit" class="btn btn-info">确认添加</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<!-- end -->
<!-- 编辑 -->
<div class="modal fade" id="editRole">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> 编辑角色</h4>
      </div>
      <form id="editForm" class="form-horizontal">
        <div class="modal-body">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td class="p-b"><label class="control-label" for="input-id-1">角色名称</label></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control w-max-300" id="input-id-1" name="rolename" value="" datatype="s" nullmsg="请输入角色名称">
                  <div class="Validform_checktip formError"></div></td>
              </tr>
              <tr>
                <td  class="p-b"><label class="control-label" for="input-id-2">remark(备注说明)</label></td>
              </tr>
              <tr>
                <td><textarea class="form-control w-max-300" rows="3" data-minwords="3" name="remark" id="input-id-2"></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        <input type="hidden" name="id" >
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button id="EditRolebtn" type="submit" class="btn btn-info">保存修改</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- end -->
<!-- 栏目设置 -->
<div class="modal fade" id="menuPriv">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cogs"></i> 栏目设置</h4>
      </div>
      <div class="modal-body" style="width:100%; height:400px;">
      <iframe src="" name="iframe" id="iframe" frameborder="false"  style="overflow-y:auto;border:none" width="100%"  height="100%" allowtransparency="true"></iframe>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- end -->
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