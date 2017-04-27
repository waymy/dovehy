
//自定义js

//公共配置


$(document).ready(function () {

    // MetsiMenu
    $('#side-menu').metisMenu();

    // 打开右侧边栏
    $('.right-sidebar-toggle').click(function () {
        $('#right-sidebar').toggleClass('sidebar-open');
    });

    //固定菜单栏
    $(function () {
        $('.sidebar-collapse').slimScroll({
            height: '100%',
            railOpacity: 0.9,
            alwaysVisible: false
        });
    });


    // 菜单切换
    $('.navbar-minimalize').click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    });


    // 侧边栏高度
    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
    }
    fix_height();

    $(window).bind("load resize click scroll", function () {
        if (!$("body").hasClass('body-small')) {
            fix_height();
        }
    });

    //侧边栏滚动
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0 && !$('body').hasClass('fixed-nav')) {
            $('#right-sidebar').addClass('sidebar-top');
        } else {
            $('#right-sidebar').removeClass('sidebar-top');
        }
    });

    $('.full-height-scroll').slimScroll({
        height: '100%'
    });

    $('#side-menu>li').click(function () {
        if ($('body').hasClass('mini-navbar')) {
            NavToggle();
        }
    });
    $('#side-menu>li li a').click(function () {
        if ($(window).width() < 769) {
            NavToggle();
        }
    });

    $('.nav-close').click(NavToggle);

    //ios浏览器兼容性处理
    if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
        $('#content-main').css('overflow-y', 'auto');
    }

    //bootstrap 插件
    +function ($) {
    "use strict";// 1.使用严格模式ES5支持
    // 2.alert插件类及原型方法的定义
    // 3.在jQuery上定义alert插件,并重设插件构造器
    // 重设插件构造器,可以通过该属性获取插件的真实类函数
    // 4. 防冲突处理
    // 5. 绑定触发事件
        // class
        $(document).on('click', '[data-toggle^="class"]', function(e){
            e && e.preventDefault();
            var $this = $(e.target), $class , $target, $tmp, $classes, $targets;
            !$this.data('toggle') && ($this = $this.closest('[data-toggle^="class"]'));
            $class = $this.data()['toggle'];
            $target = $this.data('target') || $this.attr('href');
          $class && ($tmp = $class.split(':')[1]) && ($classes = $tmp.split(','));
          $target && ($targets = $target.split(','));
          $targets && $targets.length && $.each($targets, function( index, value ) {
            ($targets[index] !='#') && $($targets[index]).toggleClass($classes[index]);
          });
            $this.toggleClass('active');
        });
    }(window.jQuery);


});

$(window).bind("load resize", function () {
    if ($(this).width() < 769) {
        $('body').addClass('mini-navbar');
        $('.navbar-static-side').fadeIn();
    }
});

function NavToggle() {
    $('.navbar-minimalize').trigger('click');
}

function SmoothlyMenu() {
    if (!$('body').hasClass('mini-navbar')) {
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 100);
    } else if ($('body').hasClass('fixed-sidebar')) {
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 300);
    } else {
        $('#side-menu').removeAttr('style');
    }
}

  //确认删除
function ShowDeletingDiv(title, doDelete) {
    var html = "<div class=\"modal fade\" id=\"divDeleting\">\
    <div class=\"modal-dialog\">\
      <div class=\"modal-content\">\
        <div class=\"modal-header\">\
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\
          <h4 class=\"modal-title\" id=\"titleDelete\"><i class=\"fa fa-trash-o\"></i> 确认删除？</h4>\
        </div>\
        <div class=\"modal-body\">\
          <p id=\"TScontent\">确定删除吗？删除后将无法恢复！</p>\
        </div>\
        <div class=\"modal-footer\">\
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">关闭</button>\
          <button type=\"button\" class=\"btn btn-info\" id=\"btnDelete\">确定删除</button>\
        </div>\
      </div>\
    </div>\
    </div>";
    var div = document.getElementById('divDeleting');
    if (div) {
      $('#divDeleting').remove();
    }
    $('body').append(html);
    if (title){
       // $("#titleDelete").html(title);
        $('#TScontent').html(title);
    }
    if (doDelete){
        $("#btnDelete").bind("click", deldata = function () {
            $("#divDeleting").hide();
            eval(doDelete);
        });
    }
    $("#divDeleting").modal('show');
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