<fieldset>
    <legend>新增問卷</legend>

    <form action="./api/add_que.php" method="post">
        <div>
            <label class="clo" for="">問卷名稱</label>
            <input type="text" name="subject" id="">
        </div>
        <div class="clo" id="opt">
            選項
            <input type="text" name="option[]" id="">
            <input type="button" value="更多" onclick="more()">
        </div>


        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>

    </form>
</fieldset>

<fieldset>
    <legend>問卷列表</legend>

    <table style="width:100%;text-align:center">
        <tr>
            <td class="clo" style="width:80%">問卷名稱</td>
            <td class="clo" style="width:10%">投票數</td>
            <td class="clo" style="width:10%">開放</td>
        </tr>
        <?php
        $rows = $Que->all(['subject_id' => 0]);
        foreach ($rows as $idx => $row) {
        ?>
        <tr>
            <td style="text-align:left"><?= ($idx + 1) . $row['text']; ?></td>
            <td><?= $row['vote']; ?></td>
            <td>
                <button class="show-btn" data-id="<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? '開放' : '關閉'; ?></button>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
<script>
function more() {
    let opt = `
                <div class="clo">
                    選項
                    <input type="text" name="option[]" id="">
                   
                </div>`
    $("#opt").before(opt);
}


$(".show-btn").on("click", function() {
    let id = $(this).data('id');
    $.post("./api/show.php", {
        id
    }, () => {
        location.reload();
    })
})
</script>