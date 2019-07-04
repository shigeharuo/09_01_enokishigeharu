<?php
// 関数ファイル読み込み

include('functions.php'); //←関数を記述したファイルの読み込み

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['product']) || $_POST['product'] == '' ||
    !isset($_POST['category']) || $_POST['category'] == '' ||
    !isset($_POST['enough']) || $_POST['enough'] == '' ||
    !isset($_POST['ONOFF']) || $_POST['ONOFF'] == ''
) {
    exit('ParamError');
}
// }


//POSTデータ取得
$id = $_POST['id']; //インサートとほぼ一緒＿IDも入れる
$product = $_POST['product'];
$category = $_POST['category'];
$kane_price = $_POST['kane_price'];
$basyo_place = $_POST['basyo_place'];
$comment = $_POST['comment'];
$enough = $_POST['enough'];
$ONOFF = $_POST['ONOFF'];


//DB接続します(エラー処理追加)
$pdo = db_conn(); //←関数実行

//データ登録SQL作成
$sql = 'UPDATE gs_mypantry_table SET product=:mp222, category=:mp333, kane_price=:mp444, basyo_place=:mp555, comment=:mp666, enough=:mp888, ONOFF=:mp999 WHERE id=:id'; //WHERE id=:idを入れないと全てが変わる。「どこの」を入れる

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mp222', $product, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp333', $category, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp444', $kane_price, PDO::PARAM_INT);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp555', $basyo_place, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp666', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp888', $enough, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mp999', $ONOFF, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();


//4 ．デ ータ登録処理後
if ($status == false) {
    errorMsg($stmt);
} else {
    header('Location: select.php'); //一覧画面にリダイレクト
    exit;
}
