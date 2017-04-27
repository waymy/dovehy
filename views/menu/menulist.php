<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<?=Html::cssFile('@web/hAdmin/css/bootstrap.min.css?v=3.3.6')?>
<?=Html::cssFile('@web/hAdmin/css/font-awesome.min.css?v=4.4.0')?>
<?=Html::cssFile('@web/hAdmin/css/style.css?v=4.1.0')?>
<?=Html::jsFile('@web/hAdmin/js/jquery.min.js?v=2.1.4')?>
<style type="text/css">
html {
	background: #FFF
}
.area {
	font-size: 14px
}
.area td, .area th {
	height: 25px;
	padding: 5px 8px;
	border-bottom: #e4e4e4 dashed 1px;
	text-align: left
}
.area th {
	height: 45px;
}
/*子栏目 样式*/
.area .board {
	padding-left: 55px;
	background: url(/hAdmin/img/bg_repno.gif) no-repeat -240px -550px;
}
.addchildboard {
	margin-right: 5px;
	padding-left: 3px;
	color: #FFF;
	zoom: 1;
}
.childboard {
	padding-left: 110px;
	background: url(/hAdmin/img/bg_repno.gif) no-repeat -185px -550px;
}
.color-2e3e4e {
	color: #2e3e4e
}
.modal-footer {
	width: 100%;
	position: fixed;
	bottom: 0px;
	background: #FFF;
	z-index: 999
}
</style>
<form id="form" class="form-horizontal">
  <table class="area" width="100%" style="overflow-y: auto;" border="0" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th width="20"><input type="checkbox"></th>
        <th onclick="toggle_group('.group_',this)"><span class="th-sort fl-n on_off"> <i class="fa fa-folder-open"></i></span>选择栏目</th>
      </tr>
    </thead>
    <?php foreach($menus as $level){?>
    <tr>
      <td><input class="che-all che-top-<?=$level['id']?>" type="checkbox" value="<?=$level['id']?>" name="post[]" <?php if($level['priv']){?>checked="checked"<?php }?>></td>
      <td data-toggle="class" class="th-sortable active" onclick="toggle_group('#group_<?=$level['id']?>',this)"><span class="th-sort fl-n"> <i class="fa fa-folder-open"></i></span>
        <?=$level['menuname']?></td>
    </tr>
    <tbody class="group_" id="group_<?=$level['id']?>">
      <?php foreach($level['data'] as $level1){?>
      <tr>
        <td><input class="che " data-pid="<?=$level['id']?>" type="checkbox" value="<?=$level1['id']?>" name="post[]" <?php if($level1['priv']){?>checked="checked"<?php }?>></td>
        <td><div class="board">
            <?=$level1['menuname']?>
          </div></td>
      </tr>
      <?php foreach($level1['data'] as $level2){?>
      <tr>
        <td><input class="che" data-pid="<?=$level['id']?>" type="checkbox" value="<?=$level2['id']?>" name="post[]" <?php if($level2['priv']){?>checked="checked"<?php }?>></td>
        <td><div class="childboard">
            <?=$level2['menuname']?>
          </div></td>
      </tr>
      <? }?>
      <? }?>
    </tbody>
    <?php }?>
  </table>
  <input type="hidden" name="roleid" value="<?=$roleid?>">
  <div class="modal-footer" style="">
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="parent.closeModal('menuPriv')">关闭</button>
    <button id="EditRolebtn" type="submit" class="btn btn-info" onclick="submitForm(this)">保存</button>
  </div>
  <div style="height:80px; background:#FFF"></div>
</form>
<!-- my --> 
<?=Html::jsFile('@web/hAdmin/js/noty/jquery.noty.min.js')?>
<?=Html::jsFile('@web/hAdmin/js/jquery.formpost.31.js')?>
<script type="text/javascript">
  $(function(){
    $('#form').submit(function(){
      return false;
    });

    $('.che-all').change(function(){
        var id = $(this).val();
        if($(this).is(':checked')){
          $('#group_' + id + ' .che').prop("checked", true);
        }else{
          $('#group_' + id + ' .che').prop("checked", false);
        }
       
    })

    $('.che').change(function(){
      var id = $(this).attr('data-pid');
      if($(this).is(':checked')){
        $('.che-top-' + id).prop("checked", true);
      }else{
        
        if($('#group_' + id + ' .che').is(':checked')){
          $('.che-top-' + id).prop("checked", true);
        }else{
          $('.che-top-' + id).prop("checked", false);
        }
        
      }
      
    })
  })
  function submitForm(obj){
    AjaxPost('<?=Url::to(['/menu/menu-list'])?>','form',obj ? obj : '#EditRolebtn');
    return false;
  }
  
//折叠栏目
function toggle_group(bodyid,obj){
  if(bodyid == '.group_'){
	if($(obj).find('span').hasClass('closer')){
		$(obj).find('span').removeClass('closer');
		$('.th-sort').html('<i class="fa fa-folder-open"></i>');
		$(bodyid).show();
	}else{
		$(obj).find('span').addClass('closer');
		$('.th-sort').html('<i class="fa fa-folder"></i>');
		$(bodyid).hide();		
	}
	return;
  }
  //单独展开 闭合
  $(bodyid).toggle();
  if($(bodyid).css('display') == 'none'){
    $(obj).find('span').html('<i class="fa fa-folder"></i>');
  }else{
    $(obj).find('span').html('<i class="fa fa-folder-open"></i>');
  }
}

</script> 
