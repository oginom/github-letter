<?php
  //if(!file_exists('')) {
  //}
  $f = file("lastupdate.txt");
  var_dump($f);
  $d = date();
  file_put_contents("lastupdate.txt", $d);
  exec("git add lastupdate.txt", $outpara);
  exec("git commit -a -m 'update'", $outpara);
  exec("git push origin master", $outpara);
?>
