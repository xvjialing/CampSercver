<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|E站到赢管理平台</title>
    <link href="/onethink1/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/onethink1/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/onethink1/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/onethink1/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/onethink1/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/onethink1/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/onethink1/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/onethink1/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/onethink1/Public/Admin/js/jquery.mousewheel.js"></script>
    
     <script type="text/javascript" src="/onethink1/Public/static/bootstrap/js/bootstrap.min.js"></script>
   <!--  <script type="text/javascript" src="/onethink1/Public/Admin/js/jquery.validator.js"></script>
    <script type="text/javascript" src="/onethink1/Public/Admin/js/local/zh-CN.js"></script> -->
    <script type="text/javascript" src="/onethink1/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/onethink1/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <!--<![endif]-->
    
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_CSS_URL); ?>highslide.css" />
   <style type="text/css">
       
        #container{
	       width: 1000px; 
	       height: 400px; 
	       margin: 0 auto;
        	 background-color:pink;
        }
        #container2{
	       width: 1000px; 
	       height: 400px; 
	       margin: 0 auto;
        background-color:pink;
        }
        #chartdiv{
           background-color:white;
           width:1049px;
           height:400px;
           margin: -.8em auto; 
   	       margin-bottom:1px;
           text-align:center; 
        }

   </style>

</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>

        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('User/updateXinxi');?>">完善信息</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2>所有入驻本平台营地的总订单量</h2>
    </div>   
        <div id="container"></div>

    
    <div class="main-title">
        <h2>各营地类型订单量所占比例</h2>
    </div>
    <div id="container2"></div>
    
    <div class="main-title">
        <h2>各游戏类型订单量所在比例</h2>
    </div>
    <div id="chartdiv"></div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank">E站到赢</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/onethink1", //当前网站地址
            "APP"    : "/onethink1/index.php?s=", //当前项目地址
            "PUBLIC" : "/onethink1/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
<!--     <script type="text/javascript" src="/onethink1/Public/static/think.js"></script> -->
<!--     <script type="text/javascript" src="/onethink1/Public/Admin/js/common.js"></script> -->
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
 <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>highslide-full.min.js"></script>
   <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>highslide.config.js" ></script>

  
   <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>highcharts1.js"></script>
   <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>exporting1.js"></script>
  
   <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>amcharts.js"></script>
   <!-- <script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>my1.js"></script> -->
     
  <script type="text/javascript">
     /* container */
    	var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: '近12个月入驻本平台所有营地的总订单量',
						x: -20 //center
					},
					subtitle: {
						text: 'Source: Ezdy.com',
						x: -20
					},
					xAxis: {
						categories: ['2015.4', '2015.5', '2015.6', '2015.7', '2015.8', '2015.9', 
							'2015.10', '2015.11', '2015.12', '2016.1', '2016.2', '2016.3']
					},
					yAxis: {
						title: {
							text: '订单量/万个'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						formatter: function() {
				                return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y +'万个';
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: '订单量',
						data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					}
						]
				});
				
				
			});
		/* container2 */
		var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container2',
						margin: [50, 200, 60, 170]
					},
					title: {
						text: '截止2016年4月，入驻本平台的各类型营地占总订单量比例'
					},
					plotArea: {
						shadow: null,
						borderWidth: null,
						backgroundColor: null
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								formatter: function() {
									if (this.y > 5) return this.point.name;
								},
								color: 'white',
								style: {
									font: '13px Trebuchet MS, Verdana, sans-serif'
								}
							}
						}
					},
					legend: {
						layout: 'vertical',
						style: {
							left: 'auto',
							bottom: 'auto',
							right: '50px',
							top: '100px'
						}
					},
				    series: [{
						type: 'pie',
						name: 'Browser share',
						data: [
							['丛林型',   45.0],
							['草原型',       26.8],
							{
								name: '海滨型',    
								y: 12.8,
								sliced: true,
								selected: true
							},
							['山地型',    8.5],
							['乡村型',     6.2],
							['湖畔型',   0.7]
						]
					}]
				});
			});
			
			/* chartdiv */
			var chart;
var legend;

var chartData = [{
    country: "策略类",
    value: 240},
{
    country: "冒险类",
    value: 190},
{
    country: "益智类",
    value: 75},
{
    country: "体育类",
    value: 40},
{
    country: "动作类",
    value: 29},
{
    country: "射击类",
    value: 20}];

AmCharts.ready(function() {
    // 饼图
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "country";
    chart.valueField = "value";
    chart.outlineColor = "";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
    // 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // 图形写入
    chart.write("chartdiv");
});

     //导航高亮
        highlight_subnav('<?php echo U('index');?>');
        </script>

</body>
</html>