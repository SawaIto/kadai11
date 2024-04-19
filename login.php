<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100 min-h-screen flex items-center justify-center">
    <header class="text-center py-4 bg-blue-500 text-white w-full fixed top-0 z-10">ログイン画面<a href="index.php" class="text-black">(アンケート登録画面へ)</a></header>

    <!-- ログインフォーム -->
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form name="form1" action="login_act.php" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">ID:</label>
                <input class="border border-blue-500 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="username" type="text" name="lid" placeholder="ID">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">PW:</label>
                <input class="border border-blue-500 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" type="password" name="lpw" placeholder="Password">
            </div>
            <div class="flex items-center justify-between">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="ログイン">
            </div>
        </form>
    </div>
</body>

</html>
