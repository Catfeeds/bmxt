<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 2016/2/17
 * Time: 14:54
 */

?>
<div style="margin-top: 50px;">
    <p style="font-weight: bold;color: #008000;">个人赛事</p>
    <table class="table">
        <thead>
        <th>赛事名</th>
        <th>操作</th>
        </thead>
        <?php foreach($grss as $key=>$val){ ?>
            <tr>
                <td><?php echo $val['event_name'] ?></td>
                <td><a href="index.php?r=relese-event/views&id=<?php echo $val['id'] ?>" >查看详情</a> </td>
            </tr>
        <?php } ?>
    </table>
    <p style="font-weight: bold;color: #008000;">团体赛事</p>
    <table class="table">
        <thead>
        <th>赛事名</th>
        <th>操作</th>
        </thead>
        <?php foreach($ttss as $key=>$val){ ?>
            <tr>
                <td><?php echo $val['event_name'] ?></td>
                <td><a href="index.php?r=relese-team-event/views&id=<?php echo $val['id'] ?>" >查看详情</a> </td>
            </tr>
        <?php } ?>
    </table>
</div>
