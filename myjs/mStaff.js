$(function(){
    $(".op-edit").click(function () {
        var index = $(".op-edit").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
	    var name = $.trim($(".name:eq(" + index + ")").text());
        var mcorpid = $.trim($(".getID:eq(" + index + ")").text());
        var staffno = $.trim($(".staffno:eq(" + index + ")").text());
        var gender = $.trim($(".gender:eq(" + index + ")").text());
        var idcardno = $.trim($(".idcardno:eq(" + index + ")").text());
        var phone = $.trim($(".phone:eq(" + index + ")").text());
 	    $("#id").val(id);
        $("#name").val(name);
        $("#staffno").val(staffno);
        $("#gender").val(gender);
        $("#idcardno").val(idcardno);
        $("#phone").val(phone);
        $("#mcorpid").val(mcorpid);

    });
    
    $(".op-remove").click(function(){
        var index = $(".op-remove").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        $.ajax({
            type:"post",
            url:"../../bss/mStaff_bs.php",
            data:"deleteID="+id+"",
            success:function(){
                alert("删除成功！");
                history.go(0);
            }
        });
    });
});