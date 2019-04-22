<?php
function callBNMAPI($bnmdata, $option = ""){
   $curl = curl_init();

   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
   curl_setopt($curl, CURLOPT_URL, "https://api.bnm.gov.my/public/".$bnmdata . (($option == "") ? "" : "/".$option));
   curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/vnd.BNM.API.v1+json'));

   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
function centRounding($valueCn){
    return number_format(round($valueCn / 0.05) * 0.05, 2);
}
function quaterOzGm($valueGm){
    return number_format($valueGm/7.0873807);
}
function adjustPrice($valueAdj, $val){
    return centRounding($valueAdj + (($valueAdj / 100) * $val)) . " (".$val."%)";
}

$response = json_decode(callBNMAPI("kijang-emas"), true);

echo "<p><strong>Price for date:</strong> " . $response['data']['effective_date'];
echo "</br><strong>Last update:</strong> " . $response['meta']['last_updated'];
echo "</p><p><strong>BNM Data</strong>";
echo "<br>1g (Buying): RM" . centRounding(quaterOzGm($response['data']['quarter_oz']['buying']));
echo "<br>1g (Sell): RM" . centRounding(quaterOzGm($response['data']['quarter_oz']['selling']));
echo "</p><p><strong>Adjusted Data</strong>";
echo "<br>1g (Buying): RM" . adjustPrice(quaterOzGm($response['data']['quarter_oz']['buying']), -28);
echo "<br>1g (Sell): RM" . adjustPrice(quaterOzGm($response['data']['quarter_oz']['selling']), -16);
echo "</p><p><strong>API Response</strong><br><pre>".json_encode($response, JSON_PRETTY_PRINT)."</pre></p>";
echo "<p><small><a href=\"https://api.bnm.gov.my/portal#operation/KELatest\">Source BNM API Kijang Emas</a></small></p>";
