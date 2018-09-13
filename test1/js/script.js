var end = false;
$(document).ready(function () {
    $('table.game td').on('click', function (e) {
        if (!end)
            if ($(e.target).hasClass("f")) {
                $(e.target).addClass('win');
                $('.result').html('<h3>Победа</h3><br><img src="/images/tryagain.png" width="200" height="50" alt="try again" onclick="location.reload()">');
                end = true;
            }
            else {
                $(e.target).addClass('fail');
                $('.f').addClass('win');
                $('.result').html('<h3>Поражение</h3><br><img src="/images/tryagain.png" width="200" height="50" alt="try again" onclick="location.reload()">');
                end = true;
            }

    });
});