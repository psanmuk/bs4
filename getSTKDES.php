<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

if ($_GET["stkcod"]) {
   //$ret = "{'STKCOD':'" . $_GET["stkcod"] . "','STKDES':'รายละเอียดสินค้า Gift Voucher','SELLPR':200.00}";
   $ret = array('STKCOD' => $_GET["stkcod"], 'STKDES' => 'รายละเอียดสินค้า Gift Voucher','SELLPR' => 200.00);
   
   echo json_encode($ret);
   //exit();
}
?>
