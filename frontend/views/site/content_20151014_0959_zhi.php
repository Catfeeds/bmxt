<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
$this->registerCssFile('css/header.css');
$this->registerCssFile('css/brief.css');
$this->registerCssFile('css/main.css');
$this->registerCssFile('css/bottom.css');
$this->registerJsFile('js/content.js');
echo '<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Y6F597W87rrsWrmuwUGgEFjy"></script>';
$connection = Yii::$app->db;

?>
<div class="brief">
    <img class="brief_1" src="<?=$basic_model['event_img']; ?>"/>
    <div class="brief_2">
        <p style="font-weight:700;font-size:18px;margin:10px 0px 10px;width: 350px;height: 50px;overflow: hidden " ><?=$basic_model['event_name'];?></p>
        <p style="width: 350px;height: 25px;overflow: hidden ">赛事地点：<?=$basic_model['place'];?></p>
        <p>赛事类型：<?=$basic_model['event_type'];?></p>
        <p>报名开始时间：<?=$basic_model['apply_time_start'];?></p>
        <p>报名结束时间：<?=$basic_model['apply_time_end'];?></p>
        <p>报名费：￥<?=$basic_model['apply_money']; ?>&nbsp;元</p>
        <p>主办方：<span style=""><?=$basic_model['organize_type'];?></span></p>
        <button type="button" class="brief_btn1" id="brief_btn1">报名</button>
        <button type="button" class="brief_btn2" id="brief_btn2">收藏</button>
        <?php
        //收藏 未解决
        if ($_GET['id']== 2)
        {
            $connection = Yii::$app->db;
            $user_id = Yii::$app->user->getId();
            $event_id = $basic_model['id'];
            $sql = "update bm_user set event_id = CONCAT(event_id,',$event_id') WHERE id = $user_id";
            $command = $connection->createCommand($sql);
            $result = $command->execute();
        }
        ?>
    </p>
    </div>
    <div class="share">
        <img src="/frontend/web/css/images/2015-08-18_172527.png" />
        <img src="/frontend/web/css/images/2015-08-18_172629.png"/>
        <img src="/frontend/web/css/images/2015-08-18_172718.png"/>
        <img src="/frontend/web/css/images/2015-08-18_172805.png"/>
        <img src="/frontend/web/css/images/2015-08-18_172851.png"/>
        <img src="/frontend/web/css/images/2015-08-18_172932.png"/>
        <img src="/frontend/web/css/images/2015-08-18_173050.png"/>
    </div>
</div>
<div class="main">
    <ul class="nav_user" id="nav_user">
        <li class="nav1_user" >赛事详情</li>
        <li class="nav2_user" style="background: #EEEEEE;">赛事报名</li>
        <li class="nav3_user" style="background: #EEEEEE;">赛事结果</li>

    </ul>
        <img class="main3" style="width:270px;height:254px;border:#ccc solid 1px;font-size:12px" id="map" />

    <div id="detail_comp">
        <?=$basic_model['wenzhang'] ?>
     </div>

<!--赛事报名-->
    <div id="sign_comp" style="display: none;">
        <?php $form = ActiveForm::begin(['action' => ['site/handle'],'method'=>'post']); ?>
        <input type="hidden" id="info-user_id" class="form-control" name="Info[user_id]" value="<?=Yii::$app->user->isGuest?0: Yii::$app->user->identity->id;?>">
        <?= $form->field($basic, 'bm_name')->textInput(['maxlength' => true,'style'=>'width:200px']) ?>
        <?= $form->field($basic, 'sex')->radioList(['1'=>'男','0'=> '女'])?>
        <?php
        echo '<label>生日</label>';
        echo DatePicker::widget([
        'name' => 'Info[birthday]',
        'id' => 'info-birthday',
        'value' => date('Y-m-d', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
        'format' => 'yyyy-m-d',
        'todayHighlight' => true
        ]
        ]);
        ?>
        <?= $form->field($basic, 'phone')->textInput(['style'=>'width:200px']) ?>
        <input type="hidden" id="info-bm_time" class="form-control" name="Info[bm_time]" value="<?php echo time();?>">
        <?= $form->field($basic, 'email')->textInput(['maxlength' => true,'style'=>'width:200px']) ?>
        <?= $form->field($basic, 'id_number')->textInput(['maxlength' => true,'style'=>'width:200px']) ?>
        <input type="hidden" id="info-status" class="form-control" name="Info[bm_status]" value="0">
        <input type="hidden" id="info-project" class="form-control" name="Info[bm_project]" value="<?php echo Yii::$app->request->get()['id']?>">
        <input type="hidden" name="Info[event_name]" value="<?=$basic_model['event_name'];?>">
        <input type="hidden" name="Info[is_extends]" value="<?=$basic_model['is_extends'];?>">
        <input type="hidden" name="Info[apply_money]" value="<?=$basic_model['apply_money']; ?>">
        <table>
            <?php
            echo $field;
            ?>
        </table>
        <?= Html::submitButton($basic->isNewRecord ? '申请' : '更新', ['class' => $basic->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
        </form>
    </div>

<!--赛事结果-->
    <div id="result_comp">
        <p>主办方尚未上传，敬请期待。</p>
    </div>



<!--以下为友情链接和地图代码-->

        <script type="text/javascript">
            //创建和初始化地图函数：
            function initMap(){
                createMap();//创建地图
                setMapEvent();//设置地图事件
                addMapControl();//向地图添加控件
                addMapOverlay();//向地图添加覆盖物
            }
            function createMap(){
                map = new BMap.Map("map");
                map.centerAndZoom(new BMap.Point(117.015015,36.653886),17);
            }
            function setMapEvent(){
                map.enableScrollWheelZoom();
                map.enableKeyboard();
                map.enableDragging();
                map.enableDoubleClickZoom()
            }
            function addClickHandler(target,window){
                target.addEventListener("click",function(){
                    target.openInfoWindow(window);
                });
            }
            function addMapOverlay(){
                var markers = [
                    {content:"没啥",title:"易健绅",imageOffset: {width:0,height:3},position:{lat:36.653553,lng:117.014979}}
                ];
                for(var index = 0; index < markers.length; index++ ){
                    var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
                    var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
                        imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
                    })});
                    var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
                    var opts = {
                        width: 200,
                        title: markers[index].title,
                        enableMessage: false
                    };
                    var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
                    marker.setLabel(label);
                    addClickHandler(marker,infoWindow);
                    map.addOverlay(marker);
                }
            }
            //向地图添加控件
            function addMapControl(){
                var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
                map.addControl(scaleControl);
                var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
                map.addControl(navControl);
                var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
                map.addControl(overviewControl);
            }
            var map;
            initMap();
        </script>

    <div style="clear: both;margin: 10px 0px;">
</div>


