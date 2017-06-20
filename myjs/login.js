function inputCheck() {
    if ($("#username").val() == "") {
        alert("用户名不能为空！");
        $("#username").select();
        return false;
    } else if ($("#username").val() != "" && $("#password").val() == "") {
        alert("密码不能为空！");
        $("#password").select();
        return false;
    }
};