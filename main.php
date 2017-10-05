<?php
  date_default_timezone_set('Asia/Tokyo');
  $w = date("w");
  
  $mat = array(
    array(1, 1, 1, 1, 1, 1, 1),
    array(1, 0, 0, 0, 0, 0, 1),
    array(0, 1, 1, 1, 1, 1, 0),
    array(0, 1, 1, 1, 1, 1, 0),
    array(1, 0, 0, 0, 0, 0, 1),
    array(1, 1, 1, 1, 1, 1, 1),
    array(1, 0, 0, 0, 0, 0, 1),
    array(0, 1, 1, 1, 1, 1, 0),
    array(0, 1, 1, 0, 1, 1, 0),
    array(1, 0, 0, 0, 1, 1, 1),
    array(0, 1, 1, 1, 1, 1, 0),
    array(0, 0, 0, 0, 0, 0, 0),
    array(0, 1, 1, 1, 1, 1, 0),
    array(1, 1, 1, 1, 1, 1, 1),
    array(0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 1, 1, 0, 1),
    array(1, 1, 0, 0, 0, 1, 1),
    array(1, 0, 1, 1, 1, 1, 1),
    array(0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 1, 1, 1, 1),
    array(1, 0, 0, 0, 0, 0, 1),
    array(0, 1, 1, 1, 1, 1, 0),
    array(0, 1, 1, 1, 1, 1, 0),
    array(1, 0, 0, 0, 0, 0, 1),
    array(1, 1, 1, 1, 1, 1, 1),
    array(0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 1, 1, 1, 0),
    array(0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 1, 1, 1, 0),
    array(0, 0, 0, 0, 0, 0, 1),
    array(1, 1, 1, 1, 1, 1, 1),
    array(1, 1, 1, 1, 1, 1, 1)
  );
  
  $f = file("lastupdate.txt");
  var_dump($f);
  if(count($f) != 3) {
    $f = array("0", "0", "0");
  }
  $f_l = intval($f[0]);
  $f_w = intval($f[1]);
  $f_c = intval($f[2]);
  if($f_w != $w) {
    if($f_w > $w) {
      $f_l = $f_l + 1;
      if($f_l >= count($mat)) {
        $f_l = 0;
      }
    }
    $f_w = $w;
    $f_c = 0;
  }
  if($f_c < $mat[$f_l][$f_w]) {
    $f_c = $f_c + 1;
    $s = $f_l."\n".$f_w."\n".$f_c."\n";
    file_put_contents("lastupdate.txt", $s);
    exec("git add lastupdate.txt", $outpara);
    exec("git commit -a -m 'update'", $outpara);
    exec("git push origin master", $outpara);
  }
?>
