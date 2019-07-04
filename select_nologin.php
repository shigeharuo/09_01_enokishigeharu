<?php
// // セッションのスタート
// session_start(); // セッションの開始

// //0.外部ファイル読み込み
// include('functions.php');

// // ログイン状態のチェック
// chk_ssid(); // idチェック関数の実行



// $menuAdmin = menuAdmin();


//1. DB接続
$dbn = 'mysql:dbname=gsf_d03_db01;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = 'root';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
}


//2. データ表示SQL作成
$sql = 'SELECT * FROM gs_mypantry_table ORDER BY indate ASC';
//$sql = 'SELECT * FROM gs_mypantry_table ORDER BY enough ASC LIMIT 5';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
//ページネーション
//https: //manablog.org/php-pagination/
//https: //qiita.com/ShibuyaKosuke/items/0c5c6df1fac218fbca38
//3. データ表示
$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $view .= '<li class="list-group-item">';
    //     $view .= '<p>'.$result['product'].'-'.$result['category'].$result['kane_price'].$result['basyo_place'].$result['comment'].'</p>';
    //     $view .= '</li>';
    // }
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // $view .= '<div class="box_' . $result['enough'] . '_enough">';
        $view .= '<div class="box_content">';
        // $view .= '<div class="box_content_L"><img src="img/happy'.$result['product'].'coin.png" class="coin"></div>';
        $view .= '<div class="box_content_L"><img src="img/' . $result['category'] . '.png" class="coin"></div>';
        $view .= '<div class="box_content_R">';
        $view .= ' <p class="box_R_title">' . $result['product'] . '</p>';
        $view .= ' <p class="box_R_category">' . $result['category'] . '&emsp;&emsp;よく買うお店：' . $result['basyo_place'] . '&emsp;だいたいこのくらいで買う：' . $result['kane_price'] . '円</p>';
        $view .= ' <p class="box_R_indate">' . $result['indate'] . '</p>';
        $view .= ' <p class="box_R_category">' . $result['comment'] . '</p>';
        $view .= '<p class="box_R_comment"><a href="detail_nologin.php?id=' . $result[id] . '" class="badge badge-primary">情報を確認します。</a> </p>'; //更新ボタンを表示
        //$view .= '<a href="delete.php?id=' . $result[id] . '" class="badge badge-danger">Delete</a>';削除ボタンを表示PHPページにIDへ飛ばす






        $view .= '</div>';
        $view .= '</div>';
    }


    // <div class="box_content_L"><img src="img/'.$line[1].'.png" class="coin"></div>
    // <div class="box_content_R">
    //     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $view .= '<div class="box_content">';
    //     $view .= '<div class="box_content_L"><img src="img/happy'.$result['product'].'coin.png" class="coin"></div>';

    // //     <div class="box_content_L"><img src="img/happy'.$line[1].'coin.png" class="coin"></div>
    // //     <div class="box_content_R">
    // // <p class="box_R_title">'.$line[0].'</p>
    // // <p class="box_R_indate">'.$line[2].'</p>
    // // <p class="box_R_comment">'.$line[3].'</p>   
    // $view .= '</div>';
    // $view .= '</div>';
}
?>
<!-- // gs_mypantry_table
//  id/ 1 / id主 / int(12) / いいえ / なし / AUTO_INCREMENT /  変更 変更 /  削除 削除 / その他 その他
//  商品 / mp222/ 2 / product / varchar(128) / utf8_unicode_ci / いいえ / なし / 商品名 /  変更 変更 /  削除 削除 / その他 その他
//  mp333/ 3 / category / varchar(128) / utf8_unicode_ci / いいえ / なし /  変更 変更 /  削除 削除 / その他 その他
//  mp444/ 4 / kane_price / int(12) / はい / NULL / 安売り価格 /  変更 変更 /  削除 削除 / その他 その他
//  mp555/ 5 / basyo_place / text / utf8_unicode_ci / はい / NULL / 安い場所 /  変更 変更 /  削除 削除 / その他 その他
//  mp666/ 6 / comment / text / utf8_unicode_ci / はい / NULL / 備考 /  変更 変更 /  削除 削除 / その他 その他
//  sysdate()/ 7 / indate / date / いいえ / なし / 登録日時 /  変更 変更 /  削除 削除 / その他 その他
//  mp888/ 8 / enough / varchar(12) / utf8_unicode_ci / いいえ / なし / たりるかたりないか /  変更 変更 /  削除 削除 / その他 その他
//  mp999/ 9 / ONOFF / varchar(12) / utf8_unicode_ci / いいえ / なし / いるかいらないか /  -->



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MYPANTRY</title>

    <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/my.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body class="body">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <!-- <a class="navbar-brandMP" href="#">MYpantry</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="login.php">ログイン</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div>
        <ul class="list-group">
            <!-- ここにDBから取得したデータを表示しよう -->
            <?= $view ?>
        </ul>
    </div>

</body>

</html>