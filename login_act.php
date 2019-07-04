<?php
//最初にSESSIONを開始！！
session_start();

// var_dump($_post);
// exit();
//0.外部ファイル読み込み
include('functions.php'); // 関数ファイル読み込み

//1.  DB接続&送信データの受け取り
$pdo = db_conn();



$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

// var_dump($_POST);
// exit();


//2. データ登録SQL作成P32
$sql = 'SELECT * FROM gs_bm_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();


//3. SQL実行時にエラーがある場合
if ($res == false) {
    queryError($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

// var_dump($val);
// exit();
//5. 該当レコードがあればSESSIONに値を代入
if ($val['id'] != '') {
    $_SESSION = array();
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['Uname'] = $val['Uname'];
    // ログイン成功の場合はセッション変数に値を代入
    header('Location:select.php');
} else {
    //ログイン失敗の場合はログイン画面へ戻る
    header('Location:login.php');
}

exit();
