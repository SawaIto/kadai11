<?php
//0. SESSION開始！！
session_start();

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();
//２．データ登録SQL作成
$sql = "SELECT * FROM sawa_an_table09";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
$values = "";
if ($status == false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values, JSON_UNESCAPED_UNICODE);
//JSONに値を渡す場合に使う
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <title>アンケートフォーム</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- 円チャートに必須 -->
  <style>
    div {
      padding: 4px;
      font-size: 14px;
    }

    td {
      border-bottom: 1px solid blue;
      padding-left: 3px;
      padding-right: 5px;
      margin-left: 5px;
    }

    th {
      background-color: blue;
      color: white;

    }
  </style>
</head>

<body class="bg-blue-100"> <!-- 背景を水色に設定 -->

  <!-- ヘッダー部分 -->
  <?php include 'header.php'; ?>


  <!-- メインコンテンツ -->
  <div class="container mx-auto p-8 mt-10 flex flex-col md:flex-row justify-center flex-wrap">
  <div class="w-full md:w-2/3">
    <table class="w-full">
      <thead>
        <tr>
          <th>ID</th>
          <th>名前</th>
          <th>メールアドレス</th>
          <th>年齢</th>
          <th>満足度</th>
          <th>内容</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($values as $v) { ?>
        <tr>
          <td><?= h($v["id"]) ?></td>
          <td><?= h($v["name"]) ?></td>
          <td><?= h($v["email"]) ?></td>
          <td><?= h($v["age"]) ?></td>
          <td><?= h($v["satisfaction"]) ?></td>
          <td><?= h($v["naiyou"]) ?></td>
          <?php if($_SESSION["kanri_flg"]=="1"){ ?>
          <td><a href="detail.php?id=<?= h($v["id"]) ?>">更新</a></td>
          <td><a href="delete.php?id=<?= h($v["id"]) ?>">削除</a></td>
        </tr>
        <?php } ?>
      </tbody>
      <?php } ?>
    </table>
  </div>

  <!-- 満足度で円グラフを作成し表示 -->
  <div class="w-full md:w-1/3 mt-8 md:mt-0">
    <div class="w-4/5 mx-auto">
    <canvas id="satisfactionChart"></canvas>
    </div>
  </div>
</div>
  <!-- Main[End] -->

  <script>
    // JSONデータを受け取る
    const jsonData = <?php echo $json; ?>;
    console.log(jsonData); // デバッグ用：JSON データをコンソールに出力

    const satisfactionData = jsonData.map(item => item.satisfaction);
    const satisfactionCounts = {};
    satisfactionData.forEach(satisfaction => {
      satisfactionCounts[satisfaction] = (satisfactionCounts[satisfaction] || 0) + 1;
    });


    const chartData = {
      labels: Object.keys(satisfactionCounts).map(label => parseInt(label)), // キーを数値に変換
      datasets: [{
        data: Object.values(satisfactionCounts),
        backgroundColor: [
          '#FF6384',
          '#36A2EB',
          '#FFCE56',
          '#8BC34A',
          '#9C27B0'
        ]
      }]
    };

    const ctx = document.getElementById('satisfactionChart').getContext('2d');
    new Chart(ctx, {
      type: 'pie',
      data: chartData
    });
  </script>

</body>
<footer class="mt-10" >
<?php include 'footer.php'; ?>
</footer>
</html>
