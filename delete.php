<?php
//1. POSTデータ取得
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//3. データ削除の確認
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    //はいの場合、データを削除
    //データ登録SQL作成
    $stmt = $pdo->prepare("DELETE FROM sawa_an_table09 WHERE id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //実行

    //４．データ登録処理後
    if ($status == false) {
        sql_error($stmt);
    } else {
        redirect("select.php");
    }
} else {
    //確認画面を表示
    echo "<script>
        var confirmDelete = confirm('本当に削除しますか？');
        if (confirmDelete) {
            window.location.href = '?id=$id&confirm=yes';
        } else {
            window.location.href = 'select.php';
        }
    </script>";
    exit;
}
?>