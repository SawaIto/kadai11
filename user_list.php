<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーリスト</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100">
    <header class="">
        <?php include 'header.php'; ?>
    </header>

    <div class="w-full md:w-1/3 container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4 mt-15">ユーザーリスト</h1>

        <table class="min-w-full divide-y divide-blue-200 border border-blue-300 rounded-md overflow-hidden">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">名前</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">LoginID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">管理者フラグ</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-blue-200">
                <?php

                // funcs.phpの読み込み
                include "funcs.php";

                // セッションチェック
                sschk();

                // データベース接続
                $pdo = db_conn();

                // SQLクエリの作成
                $sql = "SELECT name, lid, kanri_flg FROM gs_user_table WHERE life_flg = 0";

                // SQLクエリの実行
                $stmt = $pdo->prepare($sql);
                $status = $stmt->execute();

                // クエリ実行結果の処理
                if ($status == false) {
                    // エラー処理
                    sql_error($stmt);
                } else {
                    // 結果の取得
                    $user_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // 結果の出力

                    // 結果の出力
                    echo "<br><strong>登録済みユーザー一覧";
                    foreach ($user_list as $user) {
                        echo "<tr>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . $user['name'] . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . $user['lid'] . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>";
                        if ($user['kanri_flg'] == 1) {
                            echo "管理者";
                        } else {
                            echo "一般";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>