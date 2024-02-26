<style>
.types,
.news-list {
    display: inline-block;
    vertical-align: top;
}

.type-item {
    display: block;
}

.news-list {
    width: 600px;
}
</style>
<div class="nav">目前位置: 首頁 > 分類網誌 > <span class="type">健康新知</span></div>
<fieldset class="types">
    <legend>分類網誌</legend>
    <a data-type='1' class="type-item">健康新知</a>
    <a data-type='2' class="type-item">菸害防治</a>
    <a data-type='3' class="type-item">癌症防治</a>
    <a data-type='4' class="type-item">慢性病防治</a>
</fieldset>
<fieldset class="news-list">
    <legend>文章列表</legend>
    <div class="list-item"></div>
    <div class="article"></div>
</fieldset>

<script>
getType(1);
$(".type-item").on("click", function() {
    $(".type").text($(this).text());
    let type = $(this).data('type');
    getType(type);
})

function getType(type) {
    $.get("./api/get_list.php", {
        type
    }, (list) => {
        $(".list-item").html(list);
        $(".list-item").show();
        $(".article").hide();
    })
}

function getNews(id) {
    $.get("./api/get_news.php", {
        id
    }, (news) => {
        $(".article").html(news);
        $(".article").show();
        $(".list-item").hide();
    })
}
</script>