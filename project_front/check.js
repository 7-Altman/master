/**
 * Created by 13507 on 2016/12/26.
 */





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
var flag = getCookie('user_id');

console.log(flag);
if(!flag){
    debugger
    $.ajax({
        type: 'get',
        url: API,
        data: {},
        dataType: 'json',
        success:function(msg){
            var url = location.href;
            if(msg.code == 0){
                //window.location.href = url;
            }else{
                //window.location.href = HOST;
            }
        },

    })
}else{
    //window.location.href = HOST;
}
