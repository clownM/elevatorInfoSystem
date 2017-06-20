$(function(){
    $(".op-edit").click(function () {
        var index = $(".op-edit").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
	    var username = $.trim($(".username:eq(" + index + ")").text());
        var password = $.trim($(".password:eq(" + index + ")").text());
        $("#username").val(username);
        $("#password").val(password);
 	    $("#id").val(id);
    });
    $(".op-remove").click(function(){
        var index = $(".op-remove").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        $.ajax({
            type:"post",
            url:"../bss/cSQL.php",
            data:"deleteID="+id+"",
            success:function(){
                alert("删除成功！");
                history.go(0);
            }
        });
    });
});