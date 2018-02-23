<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/2
 * Time: 15:35
 */
//print_r($value);
?>
<div class="row" style="width: 60%; margin: 0 auto;">
    <h3 class="text-center" style="margin-top: 60px; margin-bottom: 20px;">战队组建</h3>
    <form role="form" method="post" action="http://www.51first.cn/index.php?r=site/jianle">
        <div class="form-group">
            <input type="hidden" name="teamid" value="c<?php
            foreach($model as $key=>$val){}
            $i=$val->team_id;
            $i=substr($i,1);
            $a=$i+1;
            for($i;$i<$a;$i++){}
            echo $i;
            ?>" />
            <label for="gsname">战队名称：</label>
            <input class="form-control" type="text" name="gsname" />
        </div>
        <div class="form-group">
            <label for="gsteam">战队人员：</label>
            <input class="form-control" type="text" name="gsteam" value="<?php foreach($value as $key=>$val){echo $val.'，';} ?>" />
        </div>
        <input class="form-control" type="hidden" value="<?php print_r($value);?>" name=""/>
        <button class="btn btn-success" style="margin-top: 10px;" type="submit" onclick="alert(1)">创建战队</button>
    </form>
    <img alt="champion" src="/images/style/champion.png" style="width: 100%; margin-top: 20px;" />
<!--    <marquee behavior="scroll" direction="left" scrolldelay="100" style="font-size: 20px;">Congratulations！恭喜您即将组建战队，预祝您的战队取得好成绩！</marquee>-->
</div>