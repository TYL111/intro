<?php

require_once "db.php";
require_once "funtion.php";

//前端回傳變數
$mount = $_POST['amount']; //訂購數量
$name = $_POST['name']; //訂購人姓名
$email = $_POST['email']; //電子信箱
$tel = $_POST['tel']; //電話號碼
$pay = $_POST['Payment']; //付款方式
$devr = $_POST['devr']; //送貨地址
$note = $_POST['note']; //備註事項
$price = 100;



//固定變數(金流)
$date_now = gmdate("Y-m-d H:i:s",strtotime("+8 hours"));
$date_now = strtotime($date_now);//時間
$MerchantID = "MS1482396778";//商店代號
$HashKey = "5Y6dQm2bTQy9njTMzZx3aRadk1HuJN34";//HashKey
$HashIV = "PLco47CLkKVkVAXC";//HashIV
$total = $price*$mount;//訂單金額
$ItemDesc = "咖啡玉米脆片";//商品資訊
$OrderComment = $note;//商店備註
$Email = $email;//付款人電子信箱
$ReturnURL = "https://cacorn.ncse.tw/";
$CustomerURL = "https://cacorn.ncse.tw/getnumber.php";
$NotifyURL = "https://cacorn.ncse.tw/callback.php";

order_in($date_now, $name, $devr, $mount, $pay, $note, $email, $mount*100, $tel ,$link);

if ($pay == "CVS") {
    $pay = "CSV";
} elseif ($pay == "BANK") {
    $pay = "BANK";
} elseif ($pay == "card") {
    $pay = "CARD";
} else {
    $pay = "N";
}

//交易資料加密
$trade_info_arr = array( 
    'MerchantID' => $MerchantID, 
    'RespondType' => 'JSON',
    'TimeStamp' => $date_now, 
    'Version' => 1.5,
    'MerchantOrderNo' => $date_now, 
    'ItemDesc' => $ItemDesc, 
    'HashKey' => $HashKey, 
    'HashIV' => $HashIV, 
    'Amt' => $total, 
    'ItemDesc' => $ItemDesc, 
    'OrderComment' => $OrderComment, 
    'Email' => $Email, 
    'LoginType' => $LoginType, 
    'NotifyURL' => $NotifyURL,
    'ReturnURL' => $ReturnURL,
    'ClientBackURL' => $ReturnURL,
    'EmailModify' => '0',
    
    ); 
//交易資料經AES加密後取得TradeInfo
$TradeInfo = create_mpg_aes_encrypt($trade_info_arr, $HashKey, $HashIV);
//交易資料再經由SHA256加密後發送的安全碼
$sha256 = strtoupper(hash("sha256", "HashKey=$HashKey&".$TradeInfo."&HashIV=$HashIV"));
?>
<!DOCTYPE>
<html lang="zh_TW">
    <head>
        <title>Cacorn線上訂購系統</title>
    </head>
    <body onload="document.forms['Spgateway'].submit()">
    <h1>系統處理中！請稍後~</h1>
    <form name='Spgateway' method='post' action='https://core.newebpay.com/MPG/mpg_gateway'>
        <input type='hidden' id='MerchantID' name='MerchantID' value='<?php echo $MerchantID ?>'><!--商店代號--><br>
        <input type='hidden' id='TradeInfo' name='TradeInfo' value='<?php echo$TradeInfo ?>'><!--交易資料AES 加密-->
        <input type='hidden' id='TradeSha' name='TradeSha' value='<?php echo$sha256 ?>'><!--交易資料SHA256 加密-->
        <input type='hidden' id='Version' name='Version' value='1.5'><!--串接程式版本-->
    </form>
    </body>
</html>
