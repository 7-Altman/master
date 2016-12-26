/**
 * Created by 13507 on 2016/12/26.
 */
//设置cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
//获取cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}
//清除cookie
function clearCookie(name) {
    setCookie(name, "", -1);
}


function submit_info(url, data, type) {
    $.ajax({
        type: type,
        url: url,
        data: {row:data},
        dataType: 'json',
        success: function (msg) {
            if (msg.code == 1) {
                alert('error');
            } else {
                alert('ok');
                setCookie('user_id', msg.user_id, 30);
                var usr_id = getCookie('user_id');
                console.log(usr_id);
                debugger
                window.location.href = HOST + msg.url;
            }
        }
    })
}

