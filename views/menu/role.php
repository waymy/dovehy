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
          <div class="ibox-tools"> <a href="projects.html" class="btn btn-primary btn-xs">创建新项目</a> </div>
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
                  <td><a href="table_basic.html#"><i class="fa fa-check text-navy"></i></a></td>
                  <td class="project-actions"><div class="btn-group open">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">操 作 <span class="caret"></span></button>
                      <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:;" onclick="editRole(6)"><i class="fa fa-edit"></i> 编辑</a></li>
                        <li class="divider m-tb-sm"></li>
                        <!--<li><a href="javascript:;" onclick="deleting(6)"><i class="fa fa-wrench"></i> 权限设置</a></li>
                              <li class="divider m-tb-sm"></li>-->
                        <li><a href="javascript:;" onclick="menuPriv(6)"><i class="fa fa-cogs"></i> 栏目权限</a></li>
                        <li class="divider m-tb-sm"></li>
                        <li><a href="javascript:;" onclick="deleting(6)"><i class="fa fa-trash-o"></i> &nbsp;删除</a></li>
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
