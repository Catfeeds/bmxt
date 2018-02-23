<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<div style="margin-top: 50px;">
请您输入名次：
    <input type="text" name="huojiang" value=""id="huojiang"/>
    <input type="button" value="确定" onclick="Post()" />
</div>
<script language="javascript">
    jsvar = <?php echo $user_id ?>;
    jsvarl=<?php echo $event_id ?>;
    function Post()
    {
        url = "index.php?r=team-apply-info/huojiang&position="+document.getElementById('huojiang').value+"&user_id="+jsvar+"&event_id="+jsvarl;
        location.href=url;
    }
</script>
