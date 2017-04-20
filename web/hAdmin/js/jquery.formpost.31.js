/*
需要引用jquery.noty/的js和css
*/
/**
 * [alertNoty description]
 * @param  {[type]} msg     [信息文本]
 * @param  {[type]} type    [alert: 默认的提示样式 success: 成功 error: 错误 warning: 警告 information: 信息]
 * @param  {[type]} timeout [自动关闭时间 默认3000]
 * @param  {[type]} layout  [top: 顶部,长条状
                            topLeft/topCenter/topRight: 顶部的左/中/右位置, 短条状
                            center/centerLeft/centerRight: 正中/中左/中右, 短条状
                            bottomLeft/bottomCenter/bottomRight: 底部左/中/右位置, 短条状
                            bottom: 底部,长条状]
 * @param  {[type]} modal   [是否遮罩 默认 false]                          
 * @return {[type]}         []
 */
function alertNoty(msg,type,timeout,layout,modal) {
    type = type ? type : 'error';
    layout= layout ? layout : 'top';
    timeout = timeout ? timeout : '3000';
    modal = modal ? modal : false;
    var n = noty({
        text        : msg,  //信息文本
        type        : type, //弹出类似
        dismissQueue: true, // 是否添加到队列
        layout      : layout,//布局
        theme       : 'defaultTheme',// 样式主题
        modal       : modal, //遮罩
        timeout     : timeout, //自动关闭
        maxVisible  : 5, // you can set max visible notification for dismissQueue true option,
        buttons     : false // 按钮,用于在弹出的消息框中显示按钮
    });
   console.log('html: ' + n.options.id);
}

function AjaxPost(url, frm, btn, callback) {
    var btnText = $(btn).html();
    $(btn).html('请稍候...').addClass('disabled');
    $('.alert_warning_my').removeClass('alert_warning_my');
    $.post(url, $('#' + frm).serializeArray(), function (json, status, req) {
        var success = json.result;
        var action = json.action;
        var msg = json.msg;
        $('.loading').hide();
        switch (action) {
            case "eval":
                eval(msg);
                break;
            case "alert":
                if (success) alertNoty(msg,'success',2000);
                else alertNoty(msg);
                break;
            case "send_goto":
                alertNoty(msg.msg,'success',2000);
                setTimeout(function () { location.href = msg.url; }, 2000);
                return;
            case "reload":
                alertNoty(msg,'success',2000);
                setTimeout(function () { location.reload(); }, 2000);
                return;
            case "goto":
                location.href = msg;
                return;
            case "errors":
                var s = '';
                for (var o in msg) {
                    $('#e_' + o).addClass('alert_warning_my');
                    s += '<em>' + msg[o] + '</em>';
                }
                alertNoty(s);
                break;
        }

        //回调函数
        if (callback) {
            callback(json);
        }
    }, 'json').always(function () {
        setTimeout(function () { $(btn).html(btnText).removeClass('disabled'); }, 3000);
        
    });
}
