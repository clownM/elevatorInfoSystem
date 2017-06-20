$(function(){
    $(".op-edit").click(function () {
        var index = $(".op-edit").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        var vendor= $.trim($(".vendor2:eq(" + index + ")").text());
        var user= $.trim($(".user2:eq(" + index + ")").text());
        var mcorp= $.trim($(".mcorp2:eq(" + index + ")").text());
        var wuyecorp= $.trim($(".wuyecorp2:eq(" + index + ")").text());
        var installcorp= $.trim($(".installcorp2:eq(" + index + ")").text());
        var mstaff= $.trim($(".mstaff2:eq(" + index + ")").text());
        var wuyestaff= $.trim($(".wuyestaff2:eq(" + index + ")").text());
        var model= $.trim($(".model:eq(" + index + ")").text());
        var type= $.trim($(".type:eq(" + index + ")").text());
        var location= $.trim($(".location:eq(" + index + ")").text());
        var capacity= $.trim($(".capacity:eq(" + index + ")").text());
        var speed= $.trim($(".speed:eq(" + index + ")").text());
        var usingdate= $.trim($(".usingdate:eq(" + index + ")").text());
        var mdate= $.trim($(".mdate:eq(" + index + ")").text());
        var mcycletime= parseInt($.trim($(".mcycletime:eq(" + index + ")").text()));
        $("#id2").val(id);
        $("#id2").attr("readonly",true);
        $("#model2").val(model);
        $("#user2 option[value = "+user+"]").attr("selected","selected");
        $("#location2").val(location);
        $("#capacity2").val(capacity);
        $("#speed2").val(speed);
        switch(type){
            case "0":  
                $("#type2 option[value = '0']").attr("selected","selected");
                break;
            case "1":
                $("#type2 option[value = '1']").attr("selected","selected");
                break;
            case "2":
                $("#type2 option[value = '2']").attr("selected","selected");
                break;
            case "3":
                $("#type2 option[value = '3']").attr("selected","selected");
                break;
            case "4":
                $("#type2 option[value = '4']").attr("selected","selected");
                break;
        };
        $("#usingdate2").val(usingdate);
        $("#installcorp2 option[value = "+installcorp+"]").attr("selected","selected");
        $("#vendor2 option[value = "+vendor+"]").attr("selected","selected");
        $("#mcorp2 option[value = "+mcorp+"]").attr("selected","selected");
        $("#mstaff2 option[value = "+mstaff+"]").attr("selected","selected");
        $("#wuyecorp2 option[value = "+wuyecorp+"]").attr("selected","selected");
        $("#wuyestaff2 option[value = "+wuyestaff+"]").attr("selected","selected");
        $("#mdate2").val(mdate);
        $("#mcycletime2").val(mcycletime);
    });
    
    $(".op-remove").click(function(){
        var index = $(".op-remove").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        $.ajax({
            type:"post",
            url:"../../bss/elevBInfo_bs.php",
            data:"deleteID="+id+"",
            success:function(){
                alert("删除成功！");
                history.go(0);
            }
        });
    });
    $(".op-details").click(function(){
        var index = $(".op-details").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        var vendor= $.trim($(".vendor:eq(" + index + ")").text());
        var user= $.trim($(".user:eq(" + index + ")").text());
        var mcorp= $.trim($(".mcorp:eq(" + index + ")").text());
        var wuyecorp= $.trim($(".wuyecorp:eq(" + index + ")").text());
        var installcorp= $.trim($(".installcorp:eq(" + index + ")").text());
        var mstaff= $.trim($(".mstaff:eq(" + index + ")").text());
        var mstaffno= $.trim($(".mstaff2:eq(" + index + ")").text());
        mstaff = mstaff + "(" + mstaffno +")";
        var wuyestaff= $.trim($(".wuyestaff:eq(" + index + ")").text());
        var wuyestaffno= $.trim($(".wuyestaff2:eq(" + index + ")").text());
        wuyestaff = wuyestaff + "(" + wuyestaffno +")";
        var model= $.trim($(".model:eq(" + index + ")").text());
        var type= $.trim($(".type:eq(" + index + ")").text());
        var location= $.trim($(".location:eq(" + index + ")").text());
        var capacity= $.trim($(".capacity:eq(" + index + ")").text());
        var speed= $.trim($(".speed:eq(" + index + ")").text());
        var usingdate= $.trim($(".usingdate:eq(" + index + ")").text());
        var mdate= $.trim($(".mdate:eq(" + index + ")").text());
        var mcycletime= parseInt($.trim($(".mcycletime:eq(" + index + ")").text()));
        $("#id1").text(id);
        $("#model1").text(model);
        $("#user1").text(user);
        $("#location1").text(location);
        $("#capacity1").text(capacity);
        $("#speed1").text(speed);
        switch(type){
            case "0":  
                $("#type1").text("自动扶梯");  
                break;
            case "1":
                $("#type1").text("住宅电梯");  
                break;
            case "2":
                $("#type1").text("载货电梯");  
                break;
            case "3":
                $("#type1").text("商务电梯");  
                break;
            case "4":
                $("#type1").text("观光电梯");  
                break;
        };
        $("#usingdate1").text(usingdate);
        $("#installcorp1").text(installcorp);
        $("#vendor1").text(vendor);
        $("#mcorp1").text(mcorp);
        $("#mstaff1").text(mstaff);
        $("#wuyecorp1").text(wuyecorp);
        $("#wuyestaff1").text(wuyestaff);
        $("#mdate1").text(mdate);
        $("#mcycletime1").text(mcycletime);
    });
    
});