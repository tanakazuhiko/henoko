<?php
require_once("./lib/phpQuery-onefile.php");

$url = 'https://petitions.whitehouse.gov/petition/stop-landfill-henoko-oura-bay-until-referendum-can-be-held-okinawa';
$ctx = stream_context_create(array(
  'http' => array(
    'method' => 'GET',
    'header' => 'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko')
  )
);
$html = file_get_contents($url, false, $ctx);
$current_number = phpQuery::newDocument($html)->find('#sidebar-top .signatures-number')->text();
?>
<!-- 署名ボタン -->
<section id="contact" class="sign">
  <div class="container">
    <div class="row">
      <div class="col-md-12 contact-form w">
        <a href="<?php echo $url ?>" class="btn btn-blue btn-effect wow animated fadeInDown" style="font-size: 3rem; width: 100%;" target="_blank">
          署名する
        </a>
        <p class="center wow animated fadeInDown" style="color:black">2019年1月7日までに10万人の署名が必要</p>
        <div id="signatures-number" class="signatures-number wow animated bounceInRight">
          署名数: <?php echo $current_number ?>人<br>
          (達成率: <?php echo round(floatval($current_number)/100.00 * 100.00, 2) ?> %)
        </div>
        <div id="TimeLeft" class="TimeLeft wow animated bounceInLeft"></div>
        <p class="center" style="margin: 0 20%">
          <a class="navy small" href="<?php echo $url ?>" target="_blank">
            ホワイトハウス請願サイトへ
          </a>
        </p>
      </div>
    </div>
  </div>
</section>
