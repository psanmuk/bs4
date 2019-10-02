<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

//$json = "{'state':true,'trnnum':'9001234567','cshpaid':19200,'ccardamt':1500.25,'ccardno':'1234-1234-1234-1234','screens':[{'name':'screenA','width':450,'height':250},{'name':'screenB','width':650,'height':350},{'name':'screenC','width':750,'height':120},{'name':'screenD','width':250,'height':60},{'name':'screenE','width':390,'height':120},{'name':'screenF','width':1240,'height':650}]}";
$json = "{\"state\":true,\"trnnum\":\"9001234567\",\"cshpaid\":19200.0,\"ccardamt\":1500.25,\"ccardno\":\"1234-1234-1234-1234\",\"screens\":[{\"name\":\"screenA\",\"width\":450,\"height\":250},{\"name\":\"screenB\",\"width\":650,\"height\":350}]}";
$decoded = json_decode($json,true); 
//Backwards compatability.
if(!function_exists('json_last_error')){
    if($decoded === false || $decoded === null){
        throw new Exception('Could not decode JSON!(old)');
    }
} else{
    
    //Get the last JSON error.
    $jsonError = json_last_error();
    
    //In some cases, this will happen.
    if(is_null($decoded) && $jsonError == JSON_ERROR_NONE){
        throw new Exception('Could not decode JSON!(new-null)');
    }
    
    //If an error exists.
    if($jsonError != JSON_ERROR_NONE){
        $error = 'Could not decode JSON!(new) ';
        
        //Use a switch statement to figure out the exact error.
        switch($jsonError){
            case JSON_ERROR_DEPTH:
                $error .= 'Maximum depth exceeded!';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                $error .= 'Underflow or the modes mismatch!';
            break;
            case JSON_ERROR_CTRL_CHAR:
                $error .= 'Unexpected control character found';
            break;
            case JSON_ERROR_SYNTAX:
                $error .= 'Malformed JSON'."\n";
            break;
            case JSON_ERROR_UTF8:
                 $error .= 'Malformed UTF-8 characters found!';
            break;
            default:
                $error .= 'Unknown error!';
            break;
        }
        throw new Exception($error);
    }
}
//Attempt to decode the incoming RAW post data from JSON.
//$decoded = json_decode($content, true);
 
//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    throw new Exception('Received content contained invalid JSON!');
}

print_r($decoded);  
//var_dump($decoded);

// foreach ($decoded as $v1) {
//     foreach ($v1 as $v2) {
//         echo "$v2\n";
//     }
// }


echo "0=".$decoded[0]."\n"; 

  
echo "1=".$decoded[1]."\n"; 
echo $decode->screens[0].name;
echo $decode->screens[0].width;

if ($_POST["rec"] != null) {
   //$ret = "{'STKCOD':'" . $_GET["stkcod"] . "','STKDES':'รายละเอียดสินค้า Gift Voucher','SELLPR':200.00}";
   $ret = array('STKCOD' => $_GET["stkcod"], 'STKDES' => 'รายละเอียดสินค้า Gift Voucher','SELLPR' => 200.00);
   
   echo json_encode($ret);
   //exit();
}
