<fieldset>
    <legend>目前位置: 首頁 > 人氣文章區</legend>
    <table style="width:100%;margin:auto;text-align:center">
        <tr>
            <th style="width:30%">標題</th>
            <th style="width:50%">內容</th>
            <th>人氣</th>

        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($rows as $idx => $row) {
        ?>
            <tr>

                <td class="clo title" data-id='<?= $row['id']; ?>'>
                    <?= $row['title']; ?>
                </td>
                <td>
                    <div id="s<?= $row['id']; ?>"><?= mb_substr($row['text'], 0, 25); ?>...</div>
                    <div id="p<?= $row['id']; ?>" class="pop">
                        <h3 style="color:skyblue"><?= $row['title']; ?></h3>
                        <?= $row['text']; ?>
                    </div>
                </td>
                <td>

                    <span><?= $row['good']; ?>個人說<img style="width:25px" src="./icon/02B03.jpg" alt=""></span>

                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php

        }

        ?>

    </table>
    <div class="ct">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=pop&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($i == $now) ? 'font-size:22px' : 'font-size:16px';
            echo "<a href='?do=pop&p=$i' style='$fontsize'> $i </a>";
        }

        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'> > </a>";
        }
        ?>
    </div>


</fieldset>

<script>
    $(".title").hover(function() {
        $(".pop").hide()
        let id = $(this).data("id");
        $(`#p${id}`).show();
    })
</script>