<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <section class="panel panel-default area">
    <form id="form" action="#" method="post" class="form-horizontal">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th width="30px" onclick="toggle_group('.group_','#on_off_')"><a id="on_off_" class="on_off end" href="javascript:;"><i class="fa fa-folder-open"></i></a></th>
            <th width="50px">顺序</th>
            <th>菜单名称</th>
            <th width="50px" class="yzm-table-width">状态</th>
            <th width="200px" class="yzm-table-width">操作</th>
          </tr>
        </tbody>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="30px" onclick="toggle_group('#group_4','#on_off_4')"><a id="on_off_4" class="on_off" href="javascript:;"><i class="fa fa-folder-open"></i></a></td>
            <td width="50px"><input class="form-control input-sm w-45" type="text" name="order[4]" value="0"></td>
            <td><div class="parentboard">
                <input class="form-control input-sm w-max-100" type="text" name="name[4]" value="微信服务">
              </div></td>
            <td width="50px" style="text-align:center" class="yzm-table-width"><a href="#" onclick="SetDisplay(this,4)" data-toggle="class" class=" active"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>
            <td width="200px" class="operate yzm-table-width"><div class="btn-group">
                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">操 作 <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="javascript:;" onclick="editMenu(4)"><i class="fa fa-edit"></i> 编辑</a></li>
                  <li class="divider m-tb-sm"></li>
                  <li><a href="javascript:;" onclick="delMenu(4)"><i class="fa fa-trash-o"></i> &nbsp;删除</a></li>
                </ul>
              </div></td>
          </tr>
        </tbody>
        <tbody class="group_" id="group_4">
          <tr>
            <td width="30px">&nbsp;</td>
            <td width="50px"><input class="form-control input-sm w-45" type="text" name="order[10]" value="0"></td>
            <td><div class="board">
                <input class="form-control input-sm w-max-100 inline" type="text" name="name[10]" value="自动回复">
                <a onclick="addrow(this,10,3,'添加子菜单')" class="addchildboard " href="javascript:;"><i class="fa fa-plus-square color-2e3e4e"></i> 添加</a> </div></td>
            <td width="50px" style="text-align:center" class="yzm-table-width"><a href="#" onclick="SetDisplay(this,10)" data-toggle="class" class=" active"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>
            <td width="200px" class="operate yzm-table-width"><div class="btn-group">
                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">操 作 <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="javascript:;" onclick="editMenu(10)"><i class="fa fa-edit"></i> 编辑</a></li>
                  <li class="divider m-tb-sm"></li>
                  <li><a href="javascript:;" onclick="delMenu(10)"><i class="fa fa-trash-o"></i> &nbsp;删除</a></li>
                </ul>
              </div></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4"><div class="add"><a onclick="addrow(this,4,2,'新子级菜单')" class="addtr" href="javascript:;"><i class="fa fa-plus-square"></i> 添加子级菜单</a></div></td>
          </tr>
        </tbody>
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4"><div><a onclick="addrow(this,0,1,'新顶级菜单')" class="addtr" href="javascript:;"><i class="fa fa-plus-square"></i> 添加顶级菜单</a></div></td>
          </tr>
        </tbody>
      </table>
      <div class="p-lg">
        <button type="submit" class="btn btn-success" id="SaveEventbtn" onclick="submitForm(this)" ;="">提交</button>
        <i class="fa fa-spin fa-spinner hide" id="spin"></i> </div>
    </form>
  </section>
</div>
<div class="modal fade" id="editMenu">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> 后台菜单编辑</h4>
        </div>
        <div class="modal-body">
          <p>URL: <span id="menuURL"></span></p>
          <form  id="editForm" class="form-horizontal">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
             
              <tbody>
                <tr>
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-1">菜单名称</label></td>
                </tr>
                <tr>
                  <td width="50%">
                    <input type="text" class="form-control" id="input-id-1" name="menuname">
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr>                    
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-2">M(模块)</label></td>
                </tr>
                <tr id="item-2">                    
                  <td width="50%">
                    <input type="text" class="form-control" id="input-id-2" name="m_">
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr>                    
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-3">C(控制器)</label></td>
                </tr>
                <tr id="item-3">                    
                  <td width="50%">
                    <input type="text" class="form-control" id="input-id-3" name="c_">
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr>                    
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-4">A(方法)</label></td>
                </tr>
                <tr id="item-4">                    
                  <td width="50%">
                    <input type="text" class="form-control" id="input-id-4" name="a_">
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr>                    
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-3">remark(备注说明)</label></td>
                </tr>
                <tr id="item-3">                    
                  <td width="50%">
                    <textarea class="form-control" rows="2" data-minwords="2" name="remark"></textarea>
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr class='item-6'>                    
                  <td class="p-b" colspan="2"><label class="control-label" for="input-id-3">style(栏目样式)</label></td>
                </tr>
                <tr class="item-6">                    
                  <td width="50%">
                    <div class="m-b-sm">
                    	<label class="radio-custom select-color c-fb6b5b">
		                    <input id="bg-dange" type="radio"  name="color" value="bg-danger">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
	                	<label class="radio-custom select-color c-8ec165">
		                    <input id="bg-success" type="radio" name="color" value="bg-success">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
	                	<label class="radio-custom select-color c-ffc333">
		                    <input id="bg-warning" type="radio" name="color" value="bg-warning">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
						<label class="radio-custom select-color c-65bd77">
		                    <input id="bg-primary" type="radio" name="color" value="bg-primary">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
	                	<label class="radio-custom select-color c-4cc0c1">
		                    <input id="bg-info" type="radio" name="color" value="bg-info">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
	                	<label class="radio-custom select-color c-48a75b">
		                    <input id="bg-primary-dker" type="radio" name="color" value="bg-primary dker">
		                    <i class="fa fa-circle-o"></i>
	                	</label>
                    </div>
                    <div>
                    <input type="text" class="form-control inline w-max-150 input-sm" placeholder="图标 例如：fa-cogs" name="icon">&nbsp;<a class="btn btn-default btn-sm" href="/index.php?m=Admin&c=Index&a=icons" target="_blank">查看图标</a>
                	</div>
                  </td>
                  <td width="50%">&nbsp;</td>
                </tr>
              </tbody>
            </table>
            <input type="hidden" name="id" >
            <input type="hidden" name="pid" >
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-info" onclick="saveMenu(this)">保存修改</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<script>
//添加栏目
function addrow(obj,pid,type,val){
	var row = [];
	//顶级菜单
	row[1] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="form-control input-sm w-45" type="text" name="newcatorder[]" value="0" /></td><td><div class="parentboard"><input class="form-control input-sm w-max-100 inline" type="text" name="new1level[]" placeholder="'+ val +'" value="" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;"> <i class="fa fa-trash-o"></i> 删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	//子级菜单 2
	row[2] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="form-control input-sm w-45" type="text" name="neworder['+ pid +'][]" value="0" /></td><td><div class="board"><input class="form-control input-sm w-max-100 inline" type="text" name="new2level['+ pid +'][]" placeholder="'+ val +'" value="" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;"> <i class="fa fa-trash-o"></i> 删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	//最小 级别菜单
	row[3] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="form-control input-sm w-45" type="text" name="neworder['+ pid +'][]" value="0" /></td><td><div class="childboard"><input class="form-control input-sm w-max-100 inline" type="text" name="new2level['+ pid +'][]" placeholder="'+ val +'" value="" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;"> <i class="fa fa-trash-o"></i> 删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	//row[4] 管理员
	row[4] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="form-control input-sm w-45" type="text" name="newcatorder[]" value="0" /></td><td><div class="parentboard"><input class="form-control input-sm w-max-100 inline" type="text" name="new1level[]" value="'+ val +'" /> <input class="form-control input-sm w-max-150 inline" type="text" name="new1level[]" placeholder="'+ val +'" value="" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;"> <i class="fa fa-trash-o"></i> 删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	//row[5] 文章栏目
	row[5] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="txt w43" type="text" name="newcatorder['+ pid +'][]" placeholder="'+ val +'" value="" /></td><td><div class="board"><input class="txt w100" type="text" name="new1level['+ pid +'][]" value="'+ val +'" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;">删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	//row[6] 区域
	row[6] = '<tr><td width="30">&nbsp;</td><td width="50"><input class="txt w43" type="text" name="newdisorder['+ pid +'][]" value="0" /></td><td><div class="board"><input class="txt w100" type="text" name="new1level['+ pid +'][]" placeholder="'+ val +'" value="" /><a onclick="deleterow(this)" class="deleterow" href="javascript:;">删除</a></div></td><td colspan="4" class="operate"></td></tr>';
	if(type == 1 || type == 2 || type == 4 || type == 5 || type == 6 ){
		$(obj).parents('tr').before(row[type]);
	}else if(type == 3){
		$(obj).parents('tr').after(row[type])
	}
	
}
//删除栏目
function deleterow(obj){
	$(obj).parents('tr').remove();
}
//折叠栏目
function toggle_group(bodyid,button){
  //全部展开 闭合
  if(bodyid == '.group_'){
    if($(button).hasClass('end')){
      $(button).removeClass('end');
      $(bodyid).hide();
      $('.on_off').html('<i class="fa fa-folder"></i>');
    }else{
      $(button).addClass('end');
      $(bodyid).show();
      $('.on_off').html('<i class="fa fa-folder-open"></i>');
    }
   
    return false;
  }
  //单独展开 闭合
	$(bodyid).toggle();
	if($(bodyid).css('display') == 'none'){
		$(button).html('<i class="fa fa-folder"></i>');
	}else{
		$(button).html('<i class="fa fa-folder-open"></i>');
	}

}

	//编辑
	function editMenu(id){
		//AjaxPost('/index.php?m=Admin&c=Index&a=editMenu' + '&id=' + id,'empty','empty',function(data){
			var data = {"result":1,"action":"empty","msg":{"id":"4","pid":"0","menuname":"\u5fae\u4fe1\u670d\u52a1","url":"index.php?m=Admin&c=Index&a=editMenu","m":"","c":"","a":"","remark":"","child":"1","listorder":"0","is_display":"1","createtime":"1415003692","style":"bg-danger@fa-comments","color":"bg-danger","icon":"fa-comments"}};
			$('#menuURL').html(data.msg.url);
			$('#editForm input[type="text"]').val('');
			$('#editForm textarea').val('');
			$('input[name="menuname"]').val(data.msg.menuname);
			$('input[name="m_"]').val(data.msg.m);
			$('input[name="c_"]').val(data.msg.c);
			$('input[name="a_"]').val(data.msg.a);
			$('textarea[name="remark"]').val(data.msg.remark);
			$('input[name="id"]').val(data.msg.id);
			$('input[name="pid"]').val(data.msg.pid);
			
			$('#' + data.msg.color).attr("checked", true);
			if(data.msg.pid == 0){
				$('input[name="icon"]').val(data.msg.icon);
				$('.item-6').show();
			}else{
				$('.item-6').hide();
			}
			$('#editMenu').modal('show');
		//});
		
	}
	//提交编辑
	function saveMenu(obj){
		AjaxPost('/index.php?m=Admin&c=Index&a=editMenu&act=save','editForm',obj ? obj : '#SaveMenubtn',function(d){
			if(d.result){
				$('#editMenu').modal('hide');
			}
		});
	}
	//提交编辑
	function saveMenu(obj){
		AjaxPost('/index.php?m=Admin&c=Index&a=editMenu&act=save','editForm',obj ? obj : '#SaveMenubtn',function(d){
			if(d.result){
				$('#editMenu').modal('hide');
			}
		});
	}

</script>