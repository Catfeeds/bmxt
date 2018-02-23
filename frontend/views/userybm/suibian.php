<?php
//计算上一个月的今天 
function last_month_today($time){
    $last_month_time = mktime(date("G", $time), date("i", $time),date("s", $time), date("n", $time), 0, date("Y",$time));
    $last_month_t = date("t", $last_month_time);
    if ($last_month_t < date("j", $time)) {
        return date("Y-m-t H:i:s", $last_month_time);
    }
    return date(date("Y-m", $last_month_time) . "-d", $time);
}
?>

<?php
//include dirname(dirname(dirname(__FILE__))).'/config.php';
$endDate = date('Y-m-d');
$date = strtotime($endDate);
$beginDate= last_month_today($date);

//查询最近一个月的总的数据条数 
$sql = 'select count(*) from bm_user where id>\''.$beginDate.'\' and p_date<\''.$endDate.'\'';
//$sql = "select count(*) from newpro where p_date>'$beginDate' and p_date <'$endDate'";//这条语句也可以 
$d = db()->query($sql)->fetch(PDO::FETCH_NUM);
//echo "总的数据条数：".$d[0]; 

//查询审核通过的数据条数 
$sql2=$sql.' and is_pa_check_first=1 and is_pa_check_second=1 and is_pa_check_third=1';
$d2 = db()->query($sql2)->fetch(PDO::FETCH_NUM);
//echo "审核通过的数据条数：".$d2[0]; 

//查询一次审核通过的条数 
$sql3=$sql.' and is_pa_check_first=1';
$d3 = db()->query($sql3)->fetch(PDO::FETCH_NUM);

//查询二次审核通过的条数 
$sql4=$sql.' and is_pa_check_first=1 and is_pa_check_second=1';
$d4 = db()->query($sql4)->fetch(PDO::FETCH_NUM);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <style>
        table{
            cellpadding:0px;
            cellspacing:0px;
        }
        p{
            padding:0px;
            margin:0px;
        }
        div{
            background-color:#669900;
            width:50px;
        }
        #div1{
            height:200px;
        }
    </style>
    <script type="text/javascript" src="../../../js/jquery-1.7.2.min.js"></script>
</head>
<body>
<table border="0" >
    <tr align="center" valign="bottom">
        <td>
            <p><?php echo $d[0]?></p>
            <div id="div1"></div>
        </td>
        <td >
            <p><?php echo $d3[0]?></p>
            <div style="height:<?php $str=floor(($d3[0]/$d[0])*200); echo $str.'px'?>"></div>
        </td>
        <td >
            <p><?php echo $d4[0]?></p>
            <div style="height:<?php $str=floor(($d4[0]/$d[0])*200); echo $str.'px'?>"></div>
        </td>
        <td >
            <p><?php echo $d2[0]?></p>
            <div style="height:<?php $str=floor(($d2[0]/$d[0])*200); echo $str.'px'?>"></div>
        </td>
    </tr>
    <tr align="center" valign="top">
        <td><p>总计</p></td>
        <td><p>一审通过</p></td>
        <td><p>二审通过</p></td>
        <td><p>审核通过</p></td>
    </tr>
</table>
</body>
</html>