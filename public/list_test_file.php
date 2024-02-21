<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../public/css/template.css">
    <title>アクティビティ一覧 | ブルーツーリズム北海道 </title>
</head>
<body>
    <div class="header"><a href="list.php"><img src ="https://blue-tourism-hokkaido.website/img/logo.png"></a></div>
    <div class="flex-container-plans">
    <?php
    // アクティビティプラン(0)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/0";
    $json = file_get_contents($url);
    $plans0 = json_decode($json,true);
    // 日帰りツアー(1)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/1";
    $json = file_get_contents($url);
    $plans1 = json_decode($json,true);
    // 宿泊付きツアー(2)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/2";
    $json = file_get_contents($url);
    $plans2 = json_decode($json,true);
    // 宿泊プラン(3)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/3";
    $json = file_get_contents($url);
    $plans3 = json_decode($json,true);
    // カスタマイズツアー(4)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/4";
    $json = file_get_contents($url);
    $plans4 = json_decode($json,true);
    // 貸切交通手配（タクシー・バス）(5)
    $url = "http://blue-tourism-hokkaido.website/api/plans/json/5";
    $json = file_get_contents($url);
    $plans5 = json_decode($json,true);

    // 配列結合
    $plans = array_merge($plans0, $plans1, $plans2, $plans3, $plans4, $plans5);

    for ($i = 0 ; $i < count($plans) ; $i++) {
        echo '<div class="flex-item-plans"><a href="https://blue-tourism-hokkaido.website/public/detail.php?page_id=2622&plan_id=' . $plans[$i][id] . '"><img src="https://blue-tourism-hokkaido.website/public/uploads/' . $plans[$i][file_path1] . '"><p>' . $plans[$i][name] . '</p></a></div>';
    }
    ?>
    </div>


    <footer class="footer_wrap">
        <a href="company.php">会社概要</a>
       <!-- <a href="tradelaw.php">特定商取引法に基づく表記</a>-->
        <a href="privacy.php">プライバシーポリシー</a>
    </footer>
    <div class="copy">Copyright © BlueTourismHokkaido All rights reserved</div>
</body>
</html>