$(function(){
    $(".op-details").click(function(){
        var index = $(".op-details").index(this);
        var id = $.trim($(".id:eq(" + index + ")").text());
        var eid = $.trim($(".eid:eq(" + index + ")").text());
        var user= $.trim($(".user:eq(" + index + ")").text());
        var location= $.trim($(".location:eq(" + index + ")").text());
        var mcorp= $.trim($(".mcorp:eq(" + index + ")").text());
        var mstaff= $.trim($(".mstaff:eq(" + index + ")").text());
        var mstaffphone= $.trim($(".mstaffphone:eq(" + index + ")").text());
        var optime= $.trim($(".optime:eq(" + index + ")").text());
        var edtime= $.trim($(".edtime:eq(" + index + ")").text());
        var reason= $.trim($(".reason:eq(" + index + ")").text());
        var status= $.trim($(".status:eq(" + index + ")").text());
        
        $("#eid").text(eid);
        $("#user").text(user);
        $("#location").text(location);
        $("#mcorp").text(mcorp);
        $("#mstaff").text(mstaff);
        $("#mstaffphone").text(mstaffphone);
        $("#optime").text(optime);
        $("#edtime").text(edtime);
        $("#reason").text(reason);
        switch(status){
            case "0":
                $("#status").text("故障中");
                break;
            case "1":
                $("#status").text("已处理");
                break;
        };
    });
    
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        if (hour >= 0 && hour <= 9) {
            hour = "0" + hour;
        }
        if (min >= 0 && min <= 9) {
            min = "0" + min;
        }
        if (sec >= 0 && sec <= 9) {
            sec = "0" + sec;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                + " " + hour + seperator2 + min
                + seperator2 + sec;
        return currentdate;
    }
    $("#alldo").click(function(){
        var datetime = getNowFormatDate();
        $.ajax({
            type:"post",
            url:"../bss/fault_all.php",
            data:{datetime:datetime},
            success:function(){
                history.go(0);
//                console.log(datetime);
            }
        });
    });
    $("#done").click(function(){
        var arr = document.getElementsByClassName("cbox");
        var array = [];
        var x=0;
        for(var i=0;i<arr.length;i++){
            if($(".cbox:eq("+i+")").prop("checked")){
                array[x] = $(".id:eq("+i+")").text();
                x++;
            }
        };
        var datetime = getNowFormatDate();
        $.ajax({
            type:"post",
            url:"../bss/fault_done.php",
            data:{
                arr:array,
                datetime:datetime
            },
            success:function(){
                history.go(0);
            }
        });
    });
    $("#dont").click(function(){
        var arr = document.getElementsByClassName("cbox");
        var array = [];
        var x=0;
        for(var i=0;i<arr.length;i++){
            if($(".cbox:eq("+i+")").prop("checked")){
                array[x] = $(".id:eq("+i+")").text();
                x++;
            }
        };
        $.ajax({
            type:"post",
            url:"../bss/fault_dont.php",
            data:{
                arr:array
            },
            success:function(){
                history.go(0);
            }
        });
    });
});