<?php
session_start(); // セッションの開始
// 関数ファイルの読み込み
include('functions.php'); //←関数を記述したファイルの読み込み


$menuAdmin = menuAdmin();
$menunormal = menunormal();


// getで送信されたidを取得
$id = $_GET['id'];

//DB接続します
$pdo = db_conn(); //←関数実行

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM gs_mypantry_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう
}
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
</head>

<body class="body">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">

            <?php if ($_SESSION['kanri_flg'] == '1') : ?>
                <?= $menuAdmin ?>
            <?php else : ?>
                <?= $menunormal ?>
            <?php endif; ?>
        </nav>
    </header>

    <form method="post" action="update.php">
        <!-- $id = $_POST['id']; //インサートとほぼ一緒＿IDも入れる
        $product = $_POST['product'];
        $category = $_POST['category'];
        $kane_price = $_POST['kane_price'];
        $basyo_place = $_POST['basyo_place'];
        $comment = $_POST['comment'];
        $enough = $_POST['enough'];
        $ONOFF = $_POST['ONOFF']; -->

        <div class="form-group">
            <div class="form-MP">
                <!-- <label for="product" class="MG0">商品</label>
                <div><?= $rs['product'] ?></div> -->

                <label for="product" class="MG0">商品</label>
                <input type="text" class="form-control" id="product" name="product" value="<?= $rs['product'] ?>">

            </div>
            <div class="form-MP">
                <label for="category" class="MG0">カテゴリー</label>
                <select type="example" class="form-control" id="category" name="category">
                    <option value="<?= $rs['category'] ?>">変更なし（<?= $rs['category'] ?>）</option>
                    <option value="Daily">日用品</option>
                    <option value="Food">食品</option>
                    <option value="Cat">しめじ関連</option>
                    <option value="Medicine">薬品</option>
                    <option value="Other">その他</option>
                </select>
            </div>
            <div class="form-MP">
                <label for="kane_price" class="MG0">だいたいの購入金額</label>
                <input type="number" class="form-control" id="kane_price" name="kane_price" min="0" max="10000" value="<?= $rs['kane_price'] ?>" step="0">
            </div>
            <div class="form-MP">
                <label for="basyo_place" class="MG0">いつも買う場所</label>
                <input type="text" class="form-control" id="basyo_place" name="basyo_place" value="<?= $rs['basyo_place'] ?>">
            </div>

            <div class="form-MP">
                <label for="comment">コメント</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"><?= $rs['comment'] ?></textarea>
            </div>
            <div class="form-MP">
                <label for="enough" class="MG0">パントリーストック</label>
                <select type="example" class="form-control" id="enough" name="enough">
                    <option value="<?= $rs['enough'] ?>">変更なし（<?= $rs['enough'] ?>）</option>
                    <option value="ON">足りてる</option>
                    <option value="OFF">足りない</option>
                </select>
            </div>
            <div class="form-MP">
                <label for="ONOFF" class="MG0">ストックする？</label>
                <select type="example" class="form-control" id="ONOFF" name="ONOFF">
                    <option value="<?= $rs['ONOFF'] ?>">変更なし（ストック<?= $rs['ONOFF'] ?>！）</option>
                    <option value="必要">ストックしとく</option>
                    <option value="不要">ストックしない</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button> <a href="select.php?" class=" btn btn-primary">戻 る</a>
            </div>


            <?php if ($_SESSION['kanri_flg'] == '1') : ?>
                <div class="form-group">
                    <a href="delete.php?id=<?= $rs['id'] ?>" class="badge badge-danger">データ削除する場合クリック</a>
                </div>

            <?php endif; ?>




            <!-- idは変えたくない = ユーザーから見えないようにする重要重要重要-->
            <input type="hidden" name="id" value="<?= $rs['id'] ?>">
        </div>
    </form>

</body>

</html>