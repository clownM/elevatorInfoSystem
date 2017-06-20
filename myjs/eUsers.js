$(function(){
    $(".op-edit").click(function () {
        var index = $(".op-edit").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
	    var name = $.trim($(".name:eq(" + index + ")").text());
        var address = $.trim($(".address:eq(" + index + ")").text());
        var boss = $.trim($(".boss:eq(" + index + ")").text());
        var phone = $.trim($(".phone:eq(" + index + ")").text());
        var email = $.trim($(".email:eq(" + index + ")").text());
        
        $("#name").val(name);
        $("#address").val(address);
 	    $("#id").val(id);
        $("#boss").val(boss);
        $("#phone").val(phone);
        $("#email").val(email);
    });
    $(".op-remove").click(function(){
        var index = $(".op-remove").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        $.ajax({
            type:"post",
            url:"../../bss/eUsers_bs.php",
            data:"deleteID="+id+"",
            success:function(){
                alert("删除成功！");
                history.go(0);
            }
        });
    });
});