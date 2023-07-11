<?php
session_start();
if(isset($_POST['user']) && isset($_POST['pwd']))
{
    if($_POST['user'] == 'admin' && $_POST['pwd'] == 'admin888888')
    {
        $_SESSION['admin_log'] = 1;
        $_SESSION['admin_time'] = time();
    }
    header("location:/runtime/log");
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>日志列表</title>
    <link rel="stylesheet" href="/static/12/admin/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/12/admin/css/font-awesome.min.css" media="all" />
    <script src="/static/12/admin/js/jquery-2.0.0.js"></script>
    <script src="/static/12/admin/js/canvg2.js"></script>
    <script src="/static/12/admin/js/html2canvas-0.4.1.js"></script>
    <script src="/static/12/admin/js/jquery-2.1.4.min.js"></script>
    <script src="/static/12/admin/js/jspdf.min.js"></script>
    <script src="/static/layui/layui.js"></script>
    <script src="/static/js/report.js"></script>
    <style type="text/css">
        a{color: #0b9bff;}
    </style>
</head>
<body>
    <?php if(empty($_SESSION['admin_log']) || empty($_SESSION['admin_time']) || $_SESSION['admin_time'] + 3600 < time()){ ?>
        <form action="" method="post">
            <div>
                <span>账号：</span>
                <input type="text" name="user" value="">
                <span>密码：</span>
                <input type="text" name="pwd" value="">
                <button type="submit">登录</button>
            </div>
        </form>
    <?php }else{ ?>
        <div style="font-size: 18px;margin-left: 20px;">
            <ul>
                <?php foreach($files as $val){ ?>
                    <li>
                      <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']. '/'. $val;?>"><?= $val ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div style="font-size: 16px;">
            <pre><?= $file_text ?></pre>
        </div>
    <?php } ?>
</body>
