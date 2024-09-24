<?php
//function
function create_mpg_aes_encrypt($parameter = "", $key = "", $iv = "")
{
    $return_str = '';
    if (!empty($parameter)) {
        //將參數經過URL ENCODED QUERY STRING
        $return_str = http_build_query($parameter);
    }
    return trim(bin2hex(openssl_encrypt(addpadding($return_str), 'aes-256-cbc', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));
}

function create_aes_decrypt($tradeInfo, $hashKey, $hashIV) {
    return strippadding(openssl_decrypt(hex2bin($tradeInfo),'AES-256-CBC', $hashKey, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $hashIV)); 
}

function strippadding($string) {
    $slast = ord(substr($string, -1));
    $slastc = chr($slast);
    $pcheck = substr($string, -$slast);
    if (preg_match("/$slastc{" . $slast . "}/", $string)) {
        $string = substr($string, 0, strlen($string) - $slast);
        return $string; 
    } else {
        return false; 
    }
}

function addpadding($string, $blocksize = 32)
{
    $len = strlen($string);
    $pad = $blocksize - ($len % $blocksize);
    $string .= str_repeat(chr($pad), $pad);
    return $string;
}

function order_paid($orderid, $mysql)
{
    // sql語法存在變數中
    $sql = "UPDATE `order` SET `status`='paid' WHERE `orderid`='$orderid';";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($mysql, $sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($mysql) > 0) {
        // 如果有一筆以上代表有更新
        // mysqli_insert_id可以抓到第一筆的id
        $new_id = mysqli_insert_id($mysql);
        return "SUCESS";
    } elseif (mysqli_affected_rows($mysql) == 0) {
    } else {
        return "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($mysql);
    }
}

function order_in($orderid, $name, $devr, $mount, $pay, $note, $email, $total, $tel ,$mysql)
{
    // sql語法存在變數中
    $sql = "INSERT INTO  `order` (`orderid`, `name`,`devr`,`mount`,`pay`, `note`, `email`,`tel`, `total`, `status`) VALUE ('$orderid', '$name','$devr','$mount','$pay','$note','$email','$tel','$total', 'unpaid') ";

    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($mysql, $sql);

    // 如果有異動到資料庫數量(更新資料庫)
    if (mysqli_affected_rows($mysql) > 0) {
        // 如果有一筆以上代表有更新
        // mysqli_insert_id可以抓到第一筆的id
        $new_id = mysqli_insert_id($mysql);
        return "SUCESS";
    } elseif (mysqli_affected_rows($mysql) == 0) {
    } else {
        return "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($mysql);
    }
}
