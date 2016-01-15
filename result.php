<?php
/************************************
FILENAME     : result.php
AUTHOR       : CAHYA DSN
CREATED DATE : 2015-01-14
DEMO SITE    : http://phpindonesia.id1945.com/mbti
SOURCE CODE  : https://github.com/cahyadsn/mbti
*************************************/
header('Expires: '.date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
if(isset($_POST['d'])){
  $a=$b=array();
  for($i=1;$i<=60;$i++){
    $a[$i]=isset($_POST['d'][$i]) && $_POST['d'][$i]==1?1:0;
    $b[$i]=isset($_POST['d'][$i]) && $_POST['d'][$i]==2?1:0;
  }
  $I=($b[60]+$b[52]+$a[45]+$a[38]+$b[35]+$a[31]+$a[29]+$b[28]+$a[20]+$a[15]+$a[11]+$a[10]+$b[7]+$b[5]+$a[2])/15;
  $E=($a[60]+$a[52]+$b[45]+$b[38]+$a[35]+$b[31]+$b[29]+$a[28]+$b[20]+$b[15]+$b[11]+$b[10]+$a[7]+$a[5]+$b[2])/15;
  $S=($a[53]+$a[51]+$a[46]+$a[43]+$a[41]+$a[36]+$a[34]+$a[27]+$a[25]+$b[22]+$b[18]+$a[16]+$a[13]+$a[8]+$b[6])/15;
  $N=($b[53]+$b[51]+$b[46]+$b[43]+$b[41]+$b[36]+$b[34]+$b[27]+$b[25]+$a[22]+$a[18]+$b[16]+$b[13]+$b[8]+$a[6])/15;
  $T=($a[58]+$a[57]+$a[55]+$b[49]+$a[48]+$a[42]+$b[39]+$a[37]+$a[23]+$b[32]+$a[30]+$a[17]+$b[9]+$a[4]+$a[14])/15;
  $F=($b[58]+$b[57]+$b[55]+$a[49]+$b[48]+$b[42]+$a[39]+$b[37]+$b[23]+$a[32]+$b[30]+$b[17]+$a[9]+$b[4]+$b[14])/15;
  $J=($b[59]+$a[56]+$a[54]+$b[50]+$a[47]+$b[44]+$b[40]+$b[33]+$b[26]+$a[24]+$b[21]+$a[19]+$b[12]+$a[3]+$b[1])/15;
  $P=($a[59]+$b[56]+$b[54]+$a[50]+$b[47]+$a[44]+$a[40]+$a[33]+$a[26]+$b[24]+$a[21]+$b[19]+$a[12]+$b[3]+$a[1])/15;
  $result=($I>$E?'I':'E').($S>$N?'S':'N').($T>$F?'T':'J').($J>$P?'J':'P');
  include 'inc/config.php';
  $sql="SELECT * FROM tbl_interprestation WHERE symbol='{$result}' ";
  $result=$db->query($sql);
  $data=$result->fetch_object();
?>
<!doctype html>
<html>
  <head>
    <title>MBTI Result</title>
    <meta http-equiv="expires" content="<?php echo date('r');?>" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel='stylesheet' href='css/mbti.css?<?php echo md5(date('r'));?>' />
  </head>
  <body>
    <header><h1>:: Myer Briggs Type Indicator (MBTI) Test</h1></header>
    <div class='container'>
      <h1><?php echo $data->symbol;?></h1>
      <h2>(<?php echo $data->short;?>)</h2>
      <div class='result'>
        <b>Deskripsi</b><br />
        <li><?php echo implode('</li><li>',explode('|',$data->description));?></li>
      </div>
      <div class='result'>
        <b>Saran Pengembangan:</b><br />
        <ul>
          <li><?php echo implode('</li><li>',explode('|',$data->improvement));?></li>
        </ul>
      </div>
      <div class='result'>
        <b>Saran Profesi:</b><br />
        <li><?php echo implode('</li><li>',explode(',',$data->profession));?></li>
      </div>
      <div class='result'>
        <b>Pasangan/Partner Alami:</b><br />
        <?php echo $data->partner;?>
      </div>
    </div>

    <footer>copyright &copy; 2016<?php echo (date('Y')>2016?date('Y'):'');?> by <a href='mailto:cahyadsn@gmail.com'>cahya dsn</a></footer>
  </body>
</html>
<?php
}