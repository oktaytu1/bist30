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
  $data = json_decode($response, true);
  $rates = $data['result'];

  echo '<!doctype html>
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
        </tr>';
$i=0;
  foreach ($rates as $rate) {
    if($i<10)
    {
      echo "<tr>";
      echo "<td>".$rate['rate']."</td>";
      echo "<td>".$rate['lastprice']."</td>";
      echo "<td>".$rate['lastpricestr']."</td>";
      echo "<td>".$rate['hacim']."</td>";
      echo "<td>".$rate['hacimstr']."</td>";
      echo "<td>".$rate['min']."</td>";
      echo "<td>".$rate['minstr']."</td>";
      echo "<td>".$rate['max']."</td>";
      echo "<td>".$rate['maxstr']."</td>";
      echo "<td>".$rate['time']."</td>";
      echo "<td>".$rate['text']."</td>";
      echo "<td>".$rate['code']."</td>";
      echo "</tr>";
      $i++;
    }
  }

  echo "</table>
  </body>
  </html>";
}

?>