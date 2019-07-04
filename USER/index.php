<?php
session_start(); // セッションの開始

include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行

// var_dump($_SESSION['kanri_flg']);
// exit();
// ログイン状態のチェック
chk_ssid(); // idチェック関数の実行
kanri_Check(); // idチェック関数の実行

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/my.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body class="body">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">ユーザー登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../select.php">パントリーへ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">ユーザーのみなさん</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">　|　ログアウト</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="insert.php">
        <div class="form-group">
            <label for="Uname">ユーザー名</label>
            <input type="text" class="form-control" id="Uname" name="Uname" placeholder="ユーザー名">
        </div>
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid" placeholder="ログインID">
        </div>
        <div class="form-group">
            <label for="lpw">ログインPW</label>
            <input type="text" class="form-control" id="lpw" name="lpw" placeholder="ログインPW">
        </div>
        <div class="form-MP">
            <label for="kanri_flg" class="MG0">般：0，管理者：1</label>
            <select type="example" class="form-control" id="kanri_flg" name="kanri_flg">
                <option value="0">一般：0</option>
                <option value="1">管理者：1</option>
            </select>
        </div>
        <div class="form-MP">
            <label for="life_flg" class="MG0">アクティブ：0，非アクティブ：1</label>
            <select type="example" class="form-control" id="life_flg" name="life_flg">
                <option value="0">アクティブ：0</option>
                <option value="1">非アクティブ：1</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</body>

</html>