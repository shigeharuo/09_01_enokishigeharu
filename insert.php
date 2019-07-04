<?php
// var_dump($_POST);←データが遅れているかチェックしていた
// exit();←データが遅れているかチェックしていた
// 入力チェック（未入力の場合は弾く，commentのみ任意）
// if (
// !isset($_POST['●●●●']) || $_POST['●●●●]=='' ||
// !isset($_POST['●●●●']) || $_POST['●●●●']==''
// ) {
// exit('ParamError');
// }
include('functions.php'); //←関数を記述したファイルの読み込み
$pdo = db_conn(); //←関数実行
// var_dump($_POST);
// exit();

if (
    !isset($_POST['product']) || $_POST['product'] == '' ||
    !isset($_POST['category']) || $_POST['category'] == '' ||
    !isset($_POST['enough']) || $_POST['enough'] == '' ||
    !isset($_POST['ONOFF']) || $_POST['ONOFF'] == ''
    // || ←ORの意味

) {
    exit('paramError');
}


//POSTデータ取得



//2. DB接続します(エラー処理追加)
$pdo = db_conn(); //←関数実行functions.phpに保管

// var_dump($_POST);
// exit();

// gs_mypantry_table
//  id/ 1 / id主 / int(12) / いいえ / なし / AUTO_INCREMENT /  変更 変更 /  削除 削除 / その他 その他
//  mp222/ 2 / product / varchar(128) / utf8_unicode_ci / いいえ / なし / 商品名 /  変更 変更 /  削除 削除 / その他 その他
//  mp333/ 3 / category / varchar(128) / utf8_unicode_ci / いいえ / なし /  変更 変更 /  削除 削除 / その他 その他
//  mp444/ 4 / kane_price / int(12) / はい / NULL / 安売り価格 /  変更 変更 /  削除 削除 / その他 その他
//  mp555/ 5 / basyo_place / text / utf8_unicode_ci / はい / NULL / 安い場所 /  変更 変更 /  削除 削除 / その他 その他
//  mp666/ 6 / comment / text / utf8_unicode_ci / はい / NULL / 備考 /  変更 変更 /  削除 削除 / その他 その他
//  sysdate()/ 7 / indate / date / いいえ / なし / 登録日時 /  変更 変更 /  削除 削除 / その他 その他
//  mp888/ 8 / enough / varchar(12) / utf8_unicode_ci / いいえ / なし / たりるかたりないか /  変更 変更 /  削除 削除 / その他 その他
//  mp999/ 9 / ONOFF / varchar(12) / utf8_unicode_ci / いいえ / なし / いるかいらないか / 

//データ登録SQL作成
// $sql ='INSERT INTO php02_table(id, task, deadline, comment, indate) VALUES(NULL, :a1, :a2, :a3, sysdate())';
$sql = 'INSERT INTO gs_mypantry_table(id, product, category, kane_price, basyo_place, comment, indate, enough, ONOFF) 
VALUES(NULL, :mp222, :mp333, :mp444,:mp555,:mp666, sysdate(),:mp888,:mp999)';

// var_dump($_POST);
// exit();
// VALUES(NULL, :a1, :a2, :a3, sysdate())';

$stmt = $pdo->prepare($sql);
//  id/ 1 /
$stmt->bindValue(':mp222', $product, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp333', $category, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp444', $kane_price, PDO::PARAM_INT);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp555', $basyo_place, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp666', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//  sysdate()/
$stmt->bindValue(':mp888', $enough, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp999', $ONOFF, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
// var_dump($_POST);
// exit();
// //４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: index.php');
}

//var_dump(●●);←データが遅れているかチェックしていた
//exit(error);←データが遅れているかチェックしていた
