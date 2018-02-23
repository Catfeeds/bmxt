<?php

$cssString="
    body{
        background:url(/images/multi_back.png) no-repeat;
        background-attachment:fixed;
        filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')';
        -moz-background-size:100% 100%;
        background-size:100% 100%;
        }
";
$this->registerCss($cssString);
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/21
 * Time: 10:01
 */
?>
<?php foreach($model as $key=>$val){ ?>
<div class="row" style="margin: 40px auto 0px; width: 650px;">
    <div class="row">
        <h3 class="text-center row">赛事发布机构信息</h3><br/>
        <table class="table table-striped">
            <thead></thead>
            <tbody>
                <tr>
                    <td>机构名称</td>
                    <td><?php echo $val['jgname'] ?></td>
                </tr>
                <tr>
                    <td>机构地址</td>
                    <td><?php echo $val['dizhi'] ?></td>
                </tr>
                <tr>
                    <td>机构联系人</td>
                    <td><?php echo $val['jguser'] ?></td>
                </tr>
                <tr>
                    <td>联系电话</td>
                    <td><?php echo $val['phone'] ?></td>
                </tr>
                <tr style="border-bottom: 1px solid #dddddd;">
                    <td>电子邮箱</td>
                    <td><?php echo $val['email'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row" style="overflow: auto;">
        <p class="text-info">相关图片</p>
        <img class="pull-left" style="widht: 300px; height: 200px;" src="<?php echo $val['img'] ?>">
    </div>
</div>
<?php } ?>
