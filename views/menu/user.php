<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
$this->title = 'My Yii Application';
?>
 <div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>用户管理</h5>
          <div class="ibox-tools"> <a data-toggle="modal" href="#addRole" class="btn btn-primary btn-xs">添加用户</a> </div>
        </div>
        <div class="ibox-content">
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'columns' => [
                [
                  'label'=>'用户名',
                  'attribute'=>'username',
                  'headerOptions' => ['width' => '120']
                ],
                [
                  'label'=>'所属角色',
                  'value'=>function($model){
                        $_tag=$model->getRelatedRecords()['access'];
                        if(!empty($_tag)){
                          $tagName="";
                          foreach ($_tag as $key => $val) {
                            foreach ($val['group'] as $v){
                              $tagName .= $v['title'] . ',';
                            }
                          }
                          return rtrim($tagName,',');
                        }else{
                          return '';
                        }
                      },
                  'headerOptions' => ['class'=>'project-title']
                ],
                [
                  'label'=>'登录时间',
                  'value'=>function($model){
                    return  date('Y-m-d H:i:s',$model->lastlogintime);
                  },
                  'headerOptions'=>['width'=>'150']
                ],
                [
                  'label'=>'创建时间',
                  'value'=>function($model){
                    return  date('Y-m-d',$model->lastlogintime);
                  },
                  'headerOptions'=>['width'=>'100']
                ],
                [
                  'format'=>'raw',
                  'value'=>function($model){
                    return '<a href="#" onclick="SetDisplay(this,'.$model->uid.')" data-toggle="class" class="'.($model->status==1?'active':'').'"><i class="fa fa-check text-navy text-active"></i><i class="fa fa-times text-danger text"></i></a>';
                  },
                  'headerOptions'=>['width'=>'20']
                ],
                [
                  'header' => '操作',
                  'format'=>'raw',
                  'value' => function($model){
                        $view = "<div class='btn-group'>
                                  <button class='btn btn-success btn-sm dropdown-toggle' data-toggle='dropdown'>操 作 <span class='caret'></span></button>
                                  <ul class='dropdown-menu pull-right'>
                                    <li>".Html::a('<i class="fa fa-edit"></i> 编辑', ['menu/edituser', 'id' => $model->uid], ['title' => '编辑'])."</li>
                                    <li class='divider m-tb-sm'></li>
                                    <li><a href='javascript:;' onClick='deleting('".$model->uid."')'><i class='fa fa-trash-o'></i> &nbsp;删除</a></li>
                                    </if>
                                  </ul>
                                </div>";
                        return $view;
                  },
                  'headerOptions' => ['width' => '80']
                ],
              ],
              'options'=> ['class' => 'project-list'],
              'tableOptions'=> ['class' => 'table table-hover m-b-none'],
              'layout'=>'{items}{pager}',
          ]); ?>
        </div>
      </div>
    </div>
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