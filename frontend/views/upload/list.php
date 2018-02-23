<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/6
 * Time: 15:25
 */
$connection = Yii::$app->db;

/*
 * 路径存到数据库
 */

$sql = "select img from bm_img";
$command = $connection->createCommand($sql);
$result = $command->queryAll();
//print_r($result);
?>
<div style="width: 60%; margin: 20px auto;">
    <h3 class="text-center">您上传的名单如下</h3>
    <table class="table table-striped table-bordered ">
        <thead><tr>
            <td>姓名</td>
            <td>电话</td>
            <td>性别</td>
            <td>身份证</td>
        </tr></thead>
        <tbody>
<?php
require_once '../excel/PHPExcel/IOFactory.php';
$reader = PHPExcel_IOFactory::createReader('Excel5'); // 读取 excel 文件方式  此方法是读取excel2007之前的版本 excel2007 为读取2007以后的版本 也可以查\Classes\PHPExcel\Reader 文件夹中的类（为所有读取类，需要哪个填上哪个就行）
$gs_id = Yii::$app->user->id;
$connection = Yii::$app->db;
$gs_id = Yii::$app->user->id;
$sql = "select * from bm_img where gs_id='$gs_id'";
$command = $connection->createCommand($sql);
$result = $command->queryAll();
foreach($result as $key=>$val){
}
$a=$val['img'];

$PHPExcel = $reader->load("$a"); // 文件名称
$sheet = $PHPExcel->getSheet(0); // 读取第一个工作表从0读起
$highestRow = $sheet->getHighestRow(); // 取得总行数
//$highestColumn = $sheet->getHighestColumn(); // 取得总列数
// 根据自己的数据表的大小修改
//$arr = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I',10=>'J',11=>'K',12=>'L',13=>'M', 14=>'N',15=>'O',16=>'P',17=>'Q',18=>'R',19=>'S',20=>'T',21=>'U',22=>'V',23=>'W',24=>'X',25=>'Y',26=>'Z');
// 每次读取一行，再在行中循环每列的数值
for ($row = 2; $row <= $highestRow; $row++) {
    $val_1 = $sheet->getCellByColumnAndRow(0, $row)->getValue();
    $val_2 = $sheet->getCellByColumnAndRow(1, $row)->getValue();
    $val_3 = $sheet->getCellByColumnAndRow(2, $row)->getValue();
    $val_4 = $sheet->getCellByColumnAndRow(3, $row)->getValue();
    echo "<tr>";
    echo "<td>".$val_1."</td>";
    echo "<td>".$val_2."</td>";
    echo "<td>".$val_3."</td>";
    echo "<td>".$val_4."</td>";
    echo "</tr>";

    $gs_id = Yii::$app->user->id;
    $connection = Yii::$app->db;
    $sql = "insert into bm_gsemployee SET name='$val_1',phone='$val_2',sex='$val_3',id_card='$val_4',gs_id='$gs_id'";
    $command = $connection->createCommand($sql);
    $result = $command->execute();
};
?>
</tbody></table>
<a class="btn btn-success" href="http://www.51first.cn/index.php?r=site/yonghu">跳转至用户中心</a>
</div>
