<?php

// セッションのスタート
session_start(); // セッションの開始

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid(); // idチェック関数の実行



$menuAdmin = menuAdmin();
$menunormal = menunormal();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYpantry</title>

    <link href="https://fonts.googleapis.com/css?family=Barlow:700,700i|M+PLUS+1p&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/my.css">
    <!-- <style>
        div{
            pa  dding: 10px;
            font-size:16px;
            }
    </style> -->
</head>

<body class="body">

    <header class="topimg">
        <nav class="navbar navbar-expand-lg navbar-light ">

            <?php if ($_SESSION['kanri_flg'] == '1') : ?>
                <?= $menuAdmin ?>
            <?php else : ?>
                <?= $menunormal ?>
            <?php endif; ?>
        </nav>
    </header>
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



    <form action="insert.php" method="POST">
        <div class="form-MP">
            <label for="product" class="MG0">商品</label>
            <input type="text" class="form-control" id="product" name="product">
        </div>


        <div class="form-MP">
            <label for="category" class="MG0">カテゴリー</label>
            <select type="example" class="form-control" id="category" name="category">
                <option value="later">えらんでね</option>
                <option value="Daily">日用品</option>
                <option value="Food">食品</option>
                <option value="Cat">しめじ関連</option>
                <option value="Medicine">薬品</option>
                <option value="Other">その他</option>
            </select>
        </div>

        <div class="form-MP">
            <label for="kane_price" class="MG0">だいたいの購入金額</label>
            <input type="number" class="form-control" id="kane_price" name="kane_price" min="0" max="10000" placeholder="いつも買う金額をいれてね" step="0">
        </div>

        <div class="form-MP">
            <label for="basyo_place" class="MG0">いつも買う場所</label>
            <input type="text" class="form-control" id="basyo_place" name="basyo_place">
        </div>

        <div class="form-MP">
            <label for="comment">コメント</label>
            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>

        <div class="form-MP">
            <label for="enough" class="MG0">パントリーストック</label>
            <select type="example" class="form-control" id="enough" name="enough">
                <option value="ON">足りてる</option>
                <option value="OFF">足りない</option>
            </select>
        </div>
        <div class="form-MP">
            <label for="ONOFF" class="MG0">ストックする？</label>
            <select type="example" class="form-control" id="ONOFF" name="ONOFF">
                <option value="必要">ストックしとく</option>
                <option value="不要">ストックしない</option>
            </select>
        </div>


        <div class="form-MP">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>