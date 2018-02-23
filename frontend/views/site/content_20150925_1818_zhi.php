<?php
use yii\helpers\Html;

$this->registerCssFile('css/header.css');
$this->registerCssFile('css/brief.css');
$this->registerCssFile('css/main.css');
$this->registerCssFile('css/bottom.css');
$this->registerJsFile('js/content.js');
echo '<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Y6F597W87rrsWrmuwUGgEFjy"></script>';
$connection = Yii::$app->db;

?>
<div class="brief">
    <p class="title"><?=$basic_model['event_name'];?></p>
    <div class="left"></div>
    <p class="right">
        目的地：<?=$basic_model['place'];?><br/>
        类型：<?=$basic_model['event_type'];?><br/>
        报名时间：<?=$basic_model['apply_time_start'];?>—<?=$basic_model['apply_time_end'];?><br/>
        报名费：￥100&nbsp;￥50&nbsp;￥0<br/>
        主办方：<?=$basic_model['organize_name'];?><span style="color: red;">[<?=$basic_model['organize_type'];?>]</span><br/>
        <button type="button" class="one">报名</button>
        <button type="button" class="two">收藏</button>
    </p>
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
        <li class="nav2_user" style="background: #cccccc;">赛事报名</li>
    </ul>

    <div id="detail_comp">
        <p class="main2">2015&nbsp;青岛国际马拉松</p>
        <img class="main3" style="width:270px;height:254px;border:#ccc solid 1px;font-size:12px" id="map" />

        <p class="main4">
            一、主办单位<br/>
            世界休闲组织、中国田径协会 、青岛市人民政府<br/>
            <br/>
            二、承办单位<br/>
            莱西市人民政府、青岛市体育局 、青岛市体育总会<br/>
            <br/>
            三、参赛单位<br/>
            各国家、地区单项协会与国内各省、自治区、直辖市及青岛市<br/>
            <br/>
            四、比赛时间、地点:<br/>
            （一）比赛时间：2015年9月19日上午8点整。<br/>
            （二）比赛地点：青岛·莱西市<br/>
            <br/>
            五、比赛项目<br/>
            （一）男、女马拉松（42.195公里）<br/>
            （二）男、女半程马拉松（21.0975公里）<br/>
            （三）男、女迷你马拉松（5公里）<br/>
            <br/>
            六、参赛年龄要求
            （一）马拉松项目年龄限20岁以上（1995年当年出生）。<br/>
            （二）半程马拉松项目年龄限18岁以上（1997年当年出生）。<br/>
            （三）迷你马拉松项目年龄限13岁以上（2002年当年出生），18岁以下参赛者至少须有一名监护人共同报名参加。<br/>
            <br/>
            七、比赛路线<br/>
            马拉松：起终点设在体育中心南大门（北京路路口），北京路—扬州路—上海东路—上海西路—沽河大道—辇止头桥—东堤顶路—孙受桥—西堤顶路—上海西路—沽河大道—北京西路—北京东路—东行至终点。<br/>
            半程马拉松：起终点设在体育中心南大门（北京路路口），北京路—扬州路—上海东路—上海西路—沽河大道—至半程转折点（11公里处）—沿沽河大道—北京西路—北京东路—东行至终点。<br/>
            迷你马拉松：起终点设在体育中心南大门（北京路路口），北京路—扬州路—上海东路—烟台路—至终点人民广场东门。<br/>
            <br/>
            八、竞赛办法<br/>
            （一）采用中国田径协会审定的最新田径竞赛规则。<br/>
            （二）比赛检录：按竞赛项目在规定时间及区域内进行检录。参加马拉松的特邀运动员、中国田协注册运动员、国际优秀运动员须在赛前40分钟到体育中心南门专门检录区进行检录。特邀运动员需出示护照原件，注册运动员需出示注册卡，否则不能参赛。<br/>
            （三）起跑顺序：按马拉松特邀运动员、国际优秀运动员、注册运动员、其他马拉松运动员、半程马拉松运动员、迷你马拉松运动员顺序往后排列。各项目起点距前方方队20米。<br/>
            （四）本次比赛采用一枪发令所有项目同时起跑的办法。<br/>
            （五）计时办法<br/>
            1、本次比赛采取“净计时”方法，从每位选手通过起点计时毯开始独立计时。组委会为所有参加马拉松、半程马拉松的选手提供感应计时芯片服务，除起点外，两个芯片在其他计时点的误差少于1秒，将取消相关参赛者的成绩。<br/>
            2、本次比赛使用回收性计时芯片，运动员报到时收取100元芯片押金，赛后到芯片回收处领回芯片押金，若芯片损坏则押金不予退还。<br/>
            （六）关门距离和时间<br/>
            为了保证参赛选手比赛安全、顺利，比赛期间比赛线各段设关门时间，限时对社会交通封闭。关门时间后，相应路段恢复社会交通。在规定的关门时间内，未跑完对应距离的参赛运动员须立即停止比赛，退出赛道，以免发生危险。退出比赛的运动员可乘坐组委会提供的收容车到终点处。<br/>
            （七）存取衣<br/>
            马拉松、半程马拉松运动员在起点指定区域按号段进行存衣，到达终点后，请到指定区域按对应号码取衣。贵重物品不要存放在包内（如手机、有效证件、现金、各种钥匙、信用卡、掌上电脑等）。<br/>
            比赛当天起点存衣于7点45分截止，请运动员安排存衣时间。马拉松运动员在比赛当日15:00前，半程马拉松运动员在比赛当日12:00前，到各自终点指定存衣处领取个人存放物品。如超过领取时间没有领取的，可于赛后5天内到组委会（莱西市市委党校院内）领取。逾期不领取者，组委会将按无人领取处理。<br/>
            （八）饮水、饮料补给区<br/>
            饮料、饮水/用水站：自起点开始至5公里处设置第一个饮料站，以后每隔5公里设置一个饮料站，两个饮料站中间间隔2.5公里处均设置一个饮水/用水站。<br/>
            （九）医疗救护<br/>
            组委会沿马拉松赛道每5公里设立一个固定医疗点，医疗点前50米有明显的标志。沿途有急救车跟随。起终点处设救护车。<br/>
            （十）组委会将对起点、终点及关键路点进行录像监控，出现以下违反比赛规定的参赛者将被取消参赛成绩，其个人资料录入报名识别系统，两年内不准参加青岛﹒莱西国际马拉松赛，并报请中国田径协会追加处罚。情节严重的，终身禁赛。<br/>
            1、以虚假年龄或虚假身份报名的；<br/>
            2、未按要求穿着比赛服装和佩戴号码布的；<br/>
            3、运动员携带他人（包括男运动员携带女运动员）感应计时芯片或一名运动员同时携带两枚或两枚以上感应计时芯片参加比赛的；<br/>
            4、不按规定的起跑顺序在非报名项目的起跑点起跑的；<br/>
            5、起点活动中不按规定时间出发抢跑的；<br/>
            6、运动员的教练员乘任何车辆进入比赛跑道的；<br/>
            7、没有沿规定路线跑完各个项目的全程，绕近道或途中插入的；<br/>
            8、伪造号码布参赛的；多人交替替跑的；<br/>
            9、比赛中采用挤人、推人、撞人、绊人等犯规行为的；<br/>
            10、在终点不按规定要求重复通过终点领取纪念品的；<br/>
            11、未跑完全程私自通过终点领取纪念品的；<br/>
            12、不服从赛事工作人员指挥的；<br/>
            13、其他违反比赛规定的行为，按照比赛有关规定进行处理。<br/>
            （十一）有关竞赛的具体要求和安排，请详细阅读各项目《参赛须知》。<br/>
            <br/>
            九、录取名次及奖励办法<br/>
            （一）马拉松<br/>
            男、女第1至第8名运动员分别颁发奖金，前三名颁发奖牌。<br/>
            （二）半程马拉松<br/>
            男、女第1至第8名运动员分别获得奖金，前三名颁发奖牌。<br/>
            （三）上述奖金将按照中国税法规定，需扣除20%个人所得税。<br/>
            （四）获奖选手被抽查到兴奋剂检测，如果发现兴奋剂检测有问题者，取消该名次，后面名次不递增。<br/>
            （五）所有获奖者名单将在官网公示一周，如无疑义，外地获奖运动员奖金将直接打入预留的银行卡，本市获奖运动员奖金打入预留银行卡或凭本人二代身份证原件到大会组委会领取。<br/>
            （六）迷你马拉松<br/>
            1、迷你马拉松不设奖金，男、女分别录取前20名，凭两块完赛号码布可领取精美奖品。<br/>
            2、凡参加比赛者均发号码布并赠送纪念衫和盛衣包（赛前在报到处领取），迷你马拉松参赛者不提供纪念衫和盛衣包。<br/>
            （七）组委会对获奖运动员进行兴奋剂抽检。<br/>
            <br/>
            十、报名与名额<br/>
            （一）名额限定<br/>
            本次比赛赛事规模10000人，马拉松限报1000人，半程马拉松限报2000人，迷你马拉松7000人。各参赛项目报名额满为止。<br/>
            （二）报名办法<br/>
            1、网站报名：请登陆2015青岛.莱西国际马拉松赛官方网站：http://www.qingdaoleisure.com；http://www.qingdaoleisure.cn<br/>
            团体或个人参赛的，按以下程序完成报名（详细操作方法见网站公告栏）：<br/>
            2、注册<br/>
            （1）各团体单位需要用有效的电子邮箱注册登录帐号，帐号激活后完善单位和联系人信息，由单位管理员统一注册参赛人员。若参赛者兼任领队（或教练员），则无需注册领队（或教练员）。<br/>
            （2）个人参赛者可以直接注册，激活后完善个人信息。<br/>
            （3）注册信息需要提交正确完整的个人信息，电子照片格式为二英寸证件照，背景色为蓝色，分辩率为300像素/平方英寸(dpi)，宽413像素、高626像素（宽35mm高53mm），大小不超256K。<br/>
            3、报名要求<br/>
            （1）团体报名：以单位名义集体报名，注册后，可分别选择领队、教练、运动员等报名参赛。<br/>
            （2）个人报名：以单位注册的运动员必须以代表单位集体报名，不得以个人名义报名，以个人名义注册后可以进行个人报名。<br/>
            （3）报名后，需要完善代表单位、运动员曾经参加的比赛及获得荣誉信息和抵离信息。参赛信息将作为资格审核的必要条件。<br/>
            （三）报名费用<br/>
            1、马拉松报名费 :特邀运动员不收取报名费并负责食宿；中国田径协会注册运动员每人收取200元人民币，外籍参加过2次同等级赛事并获得前8名的运动员每人收取33美金，负责食宿；其他参赛者每人收取100元人民币，不负责食宿；<br/>
            2、半程马拉松报名费：特邀运动员不收取报名费并负责食宿；中国田径协会注册运动员每人收取200元人民币，外籍参加过2次同等级赛事并获得前8名的运动员每人收取33美金，负责食宿；其他参赛者每人收取100元人民币，不负责食宿；<br/>
            3、迷你马拉松报名费：迷你马拉松不收取报名费；<br/>
            4、运动员报名同时缴费，然后进行安全审核，审核成功后获参赛资格，若安全审核不通过，报名费不予退还。请随时登录代表单位（或个人）账户或注册时邮箱查看资格获得情况；<br/>
            5、代表单位须以单位集体缴费，以个人名义报名缴费，汇款备注栏标明单位名称（或汇款人姓名），注明参加的比赛项目和联系方式；<br/>
            组委会收款开户行：莱西农行济南路分理处；<br/>
            户名：莱西市2015年世界休闲体育大会组委会；<br/>
            帐号：38150601040002597<br/>
            6、报名表<br/>
            缴费成功后自行下载打印单位（俱乐部）和个人报名表，单位盖章（领队签字）有效；<br/>
            7、一经报名成功，不可更改参赛项目。<br/>
            （四）报名时间<br/>
            1、网上报名时间：从竞赛规程下发之日起截止到2015年8月10日。各项目按限定报名人数，额满为止。<br/>
            2、参赛者以个人或集体报名的，每人必须填写个人报名资料(见附件一)。团体报名须填写团体报名资料(见附件二)，加盖单位的公章，并附上个人报名资料。<br/>
            3、健康要求<br/>
            参赛者要求身体健康，有一定的马拉松训练基础。有以下疾病患者不宜参加比赛：<br/>
            （1）先天性心脏病和风湿性心脏病患者；<br/>
            （2）高血压和脑血管疾病患者；<br/>
            （3）心肌炎和其它心脏病患者；<br/>
            （4）冠状动脉病患者和严重心律不齐者；<br/>
            （5）血糖过高或过低的糖尿病患者；<br/>
            （6）其它不适合运动的疾病患者。<br/>
            （五）报到<br/>
            （1）报到时间：9月17日8:00-24:00，逾期视为弃权，提前报到赛会不予接待，请自行安排。<br/>
            （2）报到地点：青岛2015世界休闲体育大会运动员村北100米处停车场南端（北京路与扬州路交界处）。<br/>
            （3）提交的资料：有效证件（二代身份证、护照、士兵证、军官证）原件、复印件，团体参赛单位需要提交单位报名表、成员统计表、运动员（领队、教练员）报名表（含免责声明）；个人参赛者提交个人报名表（含免责声明）。手续不全者不准参赛。<br/>
            <br/>
            十一、仲裁与裁判<br/>
            由中国田径协会选派技术代表、技术官员和部分裁判长，裁判员由大会组委会统一选调。<br/>
            <br/>
            十二、其他事项<br/>
            （一）组委会购买的保险为人身意外伤害险，但由于自身疾病、身体原因所引起的不良后果，不属于意外伤害保险，例如，中暑、昏厥等情况不在组委会购买的人身意外伤害保险范围。因此，请大家审慎报名参赛。<br/>
            （二）组委会在比赛期间提供免费现场急救性质的医务治疗，但在医院救治等发生的相关费用由参赛选手自理。<br/>
            （三）参赛人员在比赛时必须将号码布按规定的要求正确配带，四角钉牢。<br/>
            （四）参赛人员应自觉遵守竞赛规程，注意安全。对可能引起自己或他人受伤害的行为，大会组委会有权采取警告、禁止比赛、取消成绩等措施。<br/>
            <br/>
            十三、本竞赛规程解释权属于2015青岛国际马拉松赛组委会。<br/>
            <br/>
            十四、未尽事项，另行通知。<br/>
        </p>
        <ul>
            <?php
            $sql='select name,link from bm_friends_link';
            $data = $connection->createCommand($sql);
            $links = $data->queryAll();
            foreach ($links as $link) {
                foreach($link as $name){
                    echo '<li style="float: left;list-style:none;padding: 10px ">'.$name.'</li>';
                }
            }

            ?>
        </ul>
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

    </div>   
    
    <div id="sign_comp" style="display: none;">
        <table>
            <tr>
                <td class="cell_l">赛事组别：</td>
                <td class="cell_r">
                    <input type="radio" name="years" value="1" />青年组（18-35）
                    <input type="radio" name="years" value="2" />老年组（50-60）
                </td>
            </tr>
        </table>
        <?php
            var_dump($field);
        ?>
    </div>
    
</div>

