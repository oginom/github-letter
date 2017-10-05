<?php
  date_default_timezone_set('Asia/Tokyo');
  $d = date(z);
  $f = file("lastupdate.txt");
  var_dump($f);
  $a = $b = 0;
  try {
    $a = intval($f[0]);
    $b = intval($f[1]);
  } catch(Exception $e) {
    echo "error\n";
  }
  file_put_contents("lastupdate.txt", $d);
  exec("git add lastupdate.txt", $outpara);
  exec("git commit -a -m 'update'", $outpara);
  exec("git push origin master", $outpara);
?>
