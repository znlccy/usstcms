<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>错误界面</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
</head>
<body>

<div class="container" style="margin-top: 120px">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php echo $msg;?>
            </div>
            <div class="panel-body">
                <img src="/static/images/error.png" width="96px" height="96px" alt="">

                <p class="jump">
                    页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
                </p>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</html>