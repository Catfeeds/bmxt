<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/21
 * Time: 10:01
 */
?>
<div class="row">
    <?php foreach($model as $key=>$val){ ?>
    <div class="col-lg-9 table-responsive">

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
                <tr>
                    <td>邮箱</td>
                    <td><?php echo $val['email'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="col-lg-3" style="border:1px solid #cccccc;">
        <img src="<?php echo $val['img'] ?>">
    </div>
    <?php } ?>
</div>