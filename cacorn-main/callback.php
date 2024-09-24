<?php

require_once "db.php";
require_once "funtion.php";

//設定的模塊參數
$MerchantID = "MS1482396778";//商店代號
$HashKey = "5Y6dQm2bTQy9njTMzZx3aRadk1HuJN34";//HashKey
$HashIV = "PLco47CLkKVkVAXC";//HashIV

//獲取回傳的參數
$status = $_REQUEST["Status"];
$resultMerchantID = $_REQUEST["MerchantID"];
$tradeInfo = json_decode(create_aes_decrypt($_REQUEST["TradeInfo"], $hashKey, $hashIV),true);
$transData = $tradeInfo['Result'];

//如果數據無誤，添加付款紀錄
if ($status == 'SUCCESS' && $resultMerchantID == $merchantID) {
    $orderid = $transData['MerchantOrderNo'];
    order_paid($orderid, $link);
}
