<?php
require_once(__DIR__ . '/../config/config.php');

$html = 'No data.';
$count = 0;
$tlds = array();

$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];

$thisTimestamp = strtotime($day . '-' . $month . '-' . $year);

$url = 'https://mahsey01.blob.core.windows.net/public/ExpiredDomains/' . $year . '/' . $month . '/' . $day . '.json';
$raw = cacheCall($url);

require_once(__DIR__ . '/../template/header.php');

if($raw){
    $html = '';
    $data = json_decode($raw, true);

    $i = 1;
    $count = count($data);

    foreach($data as $domain){
        //if(!empty($domain)){

            if($i == $count){
                $html .= $domain;
            }else{
                $html .= $domain . "\n";
            }

            $tld = getTLD($domain);
            if(isset($tlds[$tld])){
                $tlds[$tld] = $tlds[$tld] + 1;
            }else{
                $tlds[$tld] = 1;
            }

            $i++;
        }
    //}
}

echo '<div class="row">
<div class="col-xs-12 col-lg-6 pull-right" style="margin-bottom: 10px;">
<h3 style="margin: 0px 0px 5px 0px;">Information</h3>
<div class="table-responsive" style="margin: 0px;">
<table class="table table-bordered" style="margin: 0px;">
<tbody>
<tr>
<td colspan="2">
<div class="row" style="margin-right: -5px; margin-left: -5px;">
<div class="col-xs-6" style="padding-right: 5px; padding-left: 5px;">
<a href="/' . date('Y/m/d', strtotime('-1 day', $thisTimestamp)) . '" class="btn btn-block btn-primary">-1 Day</a>
</div>
<div class="col-xs-6" style="padding-right: 5px; padding-left: 5px;">
<a href="/' . date('Y/m/d', strtotime('+1 day', $thisTimestamp)) . '" class="btn btn-block btn-primary">+1 Day</a>
</div>
</div>
</td>
</tr>
<tr>
<th>Date</th>
<td>' . date('l jS \of F Y', $thisTimestamp) . '</td>
</tr>
<tr>
<th>Domains</th>
<td>' . number_format($count) . '</td>
</tr>
<tr>
<th>Filesize</th>
<td>' . strlen($raw) . '</td>
</tr>
<tr>
<th>Download</th>
<td>
<div class="row" style="margin-right: -5px; margin-left: -5px;">
<div class="col-xs-4" style="padding-right: 5px; padding-left: 5px;">
<a href="/download/' . $year . '-' . $month . '-' . $day . '.json" class="btn btn-block btn-primary">JSON</a>
</div>
<div class="col-xs-4" style="padding-right: 5px; padding-left: 5px;">
<a href="/download/' . $year . '-' . $month . '-' . $day . '.txt" class="btn btn-block btn-primary">TEXT</a>
</div>
<div class="col-xs-4" style="padding-right: 5px; padding-left: 5px;">
<a href="/download/' . $year . '-' . $month . '-' . $day . '.csv" class="btn btn-block btn-primary">CSV</a>
</div>
</div>
</td>
</tr>
<tr>
<th>TLDs</th>
<td>
<div class="table-responsive" style="margin: 0px;">
<table class="table table-bordered" style="margin: 0px;">
<thead>
<tr>
<th>TLD</th>
<th>Domains</th>
</tr>
</thead>
<tbody>';

foreach($tlds as $tld => $tldCount){
echo '<tr><td>.' . $tld . '</td><td>' . number_format($tldCount) . '</td></tr>' . "\n";
}

echo '</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-xs-12 col-lg-6 pull-left" style="margin-bottom: 10px;">
<h3 style="margin: 0px 0px 5px 0px;">Domains</h3>
<textarea class="form-control" style="resize: none;">' . $html . '</textarea>
</div>
</div>
<script>
document.getElementsByTagName("textarea")[0].style.height = document.getElementsByClassName("table-responsive")[0].clientHeight + "px";
</script>';

require_once(__DIR__ . '/../template/footer.php');

function getTLD($domain){
    return str_replace(explode('.', $domain)[0] . '.', '', $domain);
}