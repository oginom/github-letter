<?php
  date_default_timezone_set('Asia/Tokyo');
  $w = date("w");
  var_dump($w);
  
  $mat = array(
    array(3, 3, 3, 3, 3, 3, 3),
    array(3, 0, 0, 0, 0, 0, 3),
    array(0, 3, 3, 3, 3, 3, 0),
    array(0, 3, 3, 3, 3, 3, 0),
    array(3, 0, 0, 0, 0, 0, 3),
    array(3, 3, 3, 3, 3, 3, 3),
    array(3, 0, 0, 0, 0, 0, 3),
    array(0, 3, 3, 3, 3, 3, 0),
    array(0, 3, 3, 0, 3, 3, 0),
    array(3, 3, 3, 0, 0, 0, 3),
    array(0, 3, 3, 3, 3, 3, 0),
    array(0, 0, 0, 0, 0, 0, 0),
    array(0, 3, 3, 3, 3, 3, 0),
    array(3, 3, 3, 3, 3, 3, 3),
    array(0, 0, 0, 0, 0, 0, 0),
    array(3, 0, 3, 3, 3, 3, 3),
    array(3, 3, 0, 0, 0, 3, 3),
    array(3, 3, 3, 3, 3, 0, 3),
    array(0, 0, 0, 0, 0, 0, 0),
    array(3, 3, 3, 3, 3, 3, 3),
    array(3, 0, 0, 0, 0, 0, 3),
    array(0, 3, 3, 3, 3, 3, 0),
    array(0, 3, 3, 3, 3, 3, 0),
    array(3, 0, 0, 0, 0, 0, 3),
    array(3, 3, 3, 3, 3, 3, 3),
    array(0, 0, 0, 0, 0, 0, 0),
    array(0, 3, 3, 3, 3, 3, 3),
    array(0, 0, 0, 0, 0, 0, 0),
    array(0, 3, 3, 3, 3, 3, 3),
    array(3, 0, 0, 0, 0, 0, 0),
    array(3, 3, 3, 3, 3, 3, 3)
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
    exec("git commit -a -m 'update'", $outpara);
    exec("git push origin master", $outpara);
  } else {
    $s = $f_l."\n".$f_w."\n".$f_c."\n";
    file_put_contents("lastupdate.txt", $s);
  }
?>
