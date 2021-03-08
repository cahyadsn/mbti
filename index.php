<?php
/*
BISMILLAAHIRRAHMAANIRRAHIIM - In the Name of Allah, Most Gracious, Most Merciful
================================================================================
filename 	  : index.php
purpose  	  : main application page
create   	  : 2015-01-14
last edit	  : 2021-03-08
author   	  : cahya dsn
demo site 	: https://psycho.cahyadsn.com/mbti
soure code 	: https://github.com/cahyadsn/mbti
================================================================================
This program is free software; you can redistribute it and/or modify it under the
terms of the MIT License.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

See the MIT License for more details

copyright (c) 2021 by cahya dsn; cahyadsn@gmail.com
================================================================================*/
header('Expires: '.date('r'));
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
include 'inc/config.php';
$sql="SELECT * FROM tbl_statements ORDER BY rand()";
$result=$db->query($sql);
$data=array();
while($row=$result->fetch_object()) $data[]=$row;
?>
<!doctype html>
<html>
  <head>
    <title>MBTI Test</title>
    <meta http-equiv="expires" content="<?php echo date('r');?>" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel='stylesheet' href='css/mbti.css?<?php echo md5(date('r'));?>' />
  </head>
  <body>
    <header><h1>:: Myer Briggs Type Indicator (MBTI) Test</h1></header>
    <div id='container'>
      <div class='info-box'>
        Di bawah ini ada 60 nomor. Masing-masing nomor memiliki dua pernyataan yang bertolak belakang (PERNYATAAN 1 & 2). Pilihlah salah satu pernyataan yang paling sesuai dengan diri Anda dengan men-check pada isian pada kolom yang sudah disediakan (KOLOM PILIHAN). Anda HARUS memilih salah satu yang dominan serta mengisi semua nomor.
      </div>
      <form action='result.php' method='post'>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Pernyataan 1</th>
              <th colspan='2'>Pilihan</th>
              <th>Pernyataan 2</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=0;
            foreach($data as $d){
              echo "
                <tr>
                  <td>".++$no."</td>
                  <td class='right'>{$d->statement1}</td>
                  <td><input type='radio' name='d[{$d->id}]' value='1' required/></td>
                  <td><input type='radio' name='d[{$d->id}]' value='2' required/></td>
                  <td>{$d->statement2}</td>
                </tr>
                   ";
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan='5'>
                <input type='submit' value='proses' class='btn'/>
               </th>
             </tr>
          </tfoot>
        </table>
      </form>
    </div>
    <footer>copyright &copy; 2016<?php echo (date('Y')>2016?date('Y'):'');?> by <a href='mailto:cahyadsn@gmail.com'>cahya dsn</a></footer>
  </body>
</html>
