<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.collectapi.com/economy/hisseSenedi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: apikey 0QqfjfJTDGnPZNfPaXGCly:2EEy9pn44n7HttJSJmkhLG",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  
  $oku=false;
  $karakter=0;
  $sonuc="";

echo'<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<table class="table table-striped table-dark">
    <tr>
      <th> rate </th>
      <th> lastprice	</th>
      <th> lastpricestr	</th>
      <th> hacim	</th>
      <th> hacimstr	</th>
      <th> min	</th>
      <th> minstr	</th>
      <th> max	</th>
      <th> maxstr	</th>
      <th> time	</th>
      <th> text	</th>
      <th> code	</th>
    </tr>
    <tr>';

  for($i = 26; $i < strlen($response); $i++)
  {
    if(substr($response,$i,2)=='":')
    {
      $i+=2;
      $oku=true;
    }
    else if(substr($response,$i,1)==',')
    {
      $oku=false;
    }

    if($oku==true)
    {
      $karakter++;
    }

    if($oku==false)
    { 
      $sonuc=substr($response , $i-$karakter , $karakter);
      echo "<td>".$sonuc."</td>";
      $karakter=0 ;
    }

    if(substr($response,$i,1)=='}')
    {
      echo "</tr><tr>";
    }

  }

  echo"
</tr>
</table>


</body>
</html>
  ";



}
?>