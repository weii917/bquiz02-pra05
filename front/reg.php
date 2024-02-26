<fieldset>
    <legend>會員註冊</legend>

    <table>
        <span style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)</span>
        <tr>
            <td class="clo">Step:1登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step:2登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step:3再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step:4信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>

            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clean()">清除</button>
            </td>
        </tr>
    </table>

</fieldset>
<script>
function reg() {
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val(),
    };
    if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
        if (user.pw == user.pw2) {
            $.post("./api/chk_acc.php", {
                acc: user.acc
            }, (res) => {
                if (parseInt(res) == 1) {
                    alert("帳號重複")
                } else {
                    $.post("./api/reg.php", user, (res) => {
                        alert("註冊完成，歡迎加入");
                        location.href = '?do=login';
                    })
                }
            })
        } else {
            alert("密碼錯誤")
        }
    } else {
        alert("不可空白");
    }


}
</script>