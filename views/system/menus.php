<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-sm-12 animated fadeInRight">
      <div class="mail-box-header">
        <form method="get" action="index.html" class="pull-right mail-search">
          <div class="input-group">
            <input type="text" class="form-control input-sm" name="search" placeholder="搜索邮件标题，正文等">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-sm btn-primary"> 搜索 </button>
            </div>
          </div>
        </form>
        <h2> 收件箱 (16) </h2>
        <div class="mail-tools tooltip-demo m-t-md">
          <div class="btn-group pull-right">
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i> </button>
            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i> </button>
          </div>
          <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="刷新邮件列表"><i class="fa fa-refresh"></i> 刷新</button>
          <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为已读"><i class="fa fa-eye"></i> </button>
          <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为重要"><i class="fa fa-exclamation"></i> </button>
          <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="标为垃圾邮件"><i class="fa fa-trash-o"></i> </button>
        </div>
      </div>
      <div class="mail-box">
        <table class="table table-striped tbot-none">
          <tbody>
          <thead>
            <tr>
              <th  width="30px"><i class="fa fa-folder-open"></i></th>
              <th width="50px">顺序</th>
              <th>菜单名称</th>
              <th width="50px">状态</th>
              <th width="200px">操作</th>
            </tr>
          </thead>
          </tbody>
        </table>
        <table class="table">
          <tbody>
            <tr>
              <td width="30px" onclick="toggle_group('#group_4','#on_off_4')"><a id="on_off_4" class="on_off" href="javascript:;"><i class="fa fa-folder-open"></i></a></td>
              <td width="50px"><input class="form-control" type="text" name="order[4]" value="0"></td>
              <td><div class="parentboard">
                  <input class="form-control" type="text" name="name[4]" value="微信服务">
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
          <tbody>
            <tr>
              <td>&nbsp;</td>
              <td colspan="4"><div><a onclick="addrow(this,0,1,'新顶级菜单')" class="addtr" href="javascript:;"><i class="fa fa-plus-square"></i> 添加顶级菜单</a></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

