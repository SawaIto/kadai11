<?php
//0. SESSION開始！！
session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<header class="h-26  fixed top-0 left-0 mb-5 w-full bg-white shadow-md z-50 flex flex-col sm:flex-row justify-between items-center px-5 py-2">
    <div class="flex items-center">
        <a href="http://sakura110.sakura.ne.jp/kadai09_php/index.php" class="flex title-font font-medium items-center text-gray-900 mb-2 sm:mb-0">
            <img src="./img/header_logo.jpg" alt="ひまわりのロゴ"  style="width: 105px; height: 60px;" class="mr-4">
        </a>
        <span class="text-gray-900"><?=$_SESSION["name"]?>さん、こんにちは！</span>
    </div>
    <div class="container-fluid">
        <nav class="flex flex-col sm:flex-row">
            <ul class="flex justify-end items-center space-x-6">
                <li class="text-base hover:text-white hover:bg-yellow-500"><a href="index.php">アンケート登録</a></li>
                <li class="text-base hover:text-white hover:bg-yellow-500"><a href="select.php">データ一覧</a></li>
                <li class="text-base hover:text-white hover:bg-yellow-500"><a href="user.php">管理者登録</a></li>
                <li class="text-base hover:text-white hover:bg-yellow-500"><a href="user_list.php">管理者リスト</a></li>
                <li class="text-base hover:text-white hover:bg-yellow-500"><a href="logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

<script>
    function scrollToComment() {
        // Get the target element
        const commentSection = document.querySelector('.h-32');

        // Scroll to the target element
        commentSection.scrollIntoView({ behavior: 'smooth' });
    }
</script>

</body>

</html>
