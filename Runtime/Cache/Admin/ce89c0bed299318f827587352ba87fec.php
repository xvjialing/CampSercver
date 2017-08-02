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
    
   <style type="text/css">
      #main2{
	    background-color:white;
      	border:1px solid #b9bbb7;
      	margin:20px;
      	padding:20px;
      }
      .head{
	   margin:10px 0 20px 10px;
      }
      .content{
	    margin:0 0 20px 10px;
   
      }
      .image1{
	     margin:30px 180px;
      	 width:600px;
      	 height:400px;
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
        <h2><?php if(isset($data)): ?>[<?php echo ($list["bivName"]); ?> ] 子<?php endif; ?>营地信息</h2>
    </div>
    
    <div id="main2">
  
         <div>
          <h3 class="head">桐庐纪龙山野营地</h3>
          <div class="content">
          <h3>- 营地简介   -</h3>
          <p>纪龙山位于浙江省桐庐县瑶琳镇（瑶琳仙境附近）路口右转冷坞方向（省道有路牌）、海拔800米，喀斯特地貌、洞穴、森林、水库、峡谷、绝壁、古道、村落分布其间，上下游线10公里。中间山顶是营地，营地面积1平方公里，备有接待数百人露营装备，营区简单，乡土、原始，项目有惊无险，开心好玩、刺激，是年轻人最爱。景区周边拥有农家、2、3、4、5星宾馆、饭店、木屋区、会议室，均可与纪龙山野营景区连线游玩。</p>
          </div>
          <div class="content">
          <h3>- 住宿介绍   -</h3>
          <span>山顶上的帐篷小屋</span>
          <p>出来郊游就是应该多锻炼自己，一路披荆斩棘地登上山顶，领取营地准备好的帐篷。坐在帐篷里，向远方眺望，浓浓绿意尽收眼底还可以欣赏到这里独特的卡斯特地貌呢。晚上躺在宽敞的帐篷里，听着周围树林中偶尔发出的窸窸窣窣的细小声音入睡。</p>
          <img class="image1" src="<?php echo (ADMIN_IMG_URL); ?>/zhusu.jpg">
          </div>
          <div class="content">
            <h3>- 美食介绍  -</h3>
            <span>徒步过最美的风景</span>
            <p>无论是团体还是家庭都应该尝试一次徒步拓展，不是为了终点而是为了增进感情锻炼意志力。每一个不敢上去的坎都会有人搀扶着你，其实我徒步过最美的风景不过是跟着你的脚步一深一浅。</p>
            <img class="image1" src="<?php echo (ADMIN_IMG_URL); ?>/meishi.png">
          </div>
          <div class="content">
            <h3>- 风景介绍  -</h3>
           
            <p>纪龙山野营地四周山林众多，环境幽静远离人烟。在这里进行露营活动有一种丛林探险的感觉，自然是不能错过山林“野味”。在这深山老林中我们的烤架上缓缓飘出的肉香与炊烟突然有一种家的感觉。</p>
            <img class="image1" src="<?php echo (ADMIN_IMG_URL); ?>/fengjing.jpg">
          </div>
          
          <div class="content">
            <h3>- 交通介绍  -</h3>
            <p>上海→杭州绕城（北绕城公路）→转塘（下）→富阳{注意}→（05省道）新登→（不进城直走）淳安方向→瑶琳收费站→瑶琳镇加油站接团（纪龙山山脚）或杭州绕城（北绕城公路）→桐庐出口下第2个红绿灯即→320国道左转→7分钟后过杜济大桥后看右边指路牌：分水方向→过隧道后3公里左转→18公里→瑶琳镇丁字路口即（纪龙山山脚）</p>
            
          </div>
          
          <div class="content">
            <h3>- 营地须知  -</h3>
            <p>    	野外活动不同于一般旅游，队员须听从向导的指挥，对于无视指挥所造成的后果自负，严禁吸烟和擅自野外用火，登山时勿扔垃圾。
    个人自备：手电、双肩背包、运动鞋、运动衣裤、凉、拖鞋、替换内外衣、袜、个人常用药品、洗漱卫生用品，女生勿穿裙子、高跟鞋、硬皮鞋。
    注意保护生态环境，尊重自然，尽量使用现有营地，减少对环境的污染。
    为安全起见，组织者可据天气情况，适当改变行程。
    营地只能接待团队，无法接待散客。 </p>
            
          </div>
    </div>
     <div class="form-item">
            <input type="hidden" name="bivouacID" value="<?php echo ((isset($info["bivouacID"]) && ($info["bivouacID"] !== ""))?($info["bivouacID"]):''); ?>">
<!--            <input class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal" onclick="location.href='<?php echo U('changeStatus?biouacID='.$bivouacID);?>'" value="通过"/>
 -->             <a class="btn submit-btn ajax-get " target-form="form-horizontal" href="<?php echo U('changeStatus?bivouacID='.$bivouacID);?>">通过</a> 
<!--             <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确定</button> -->
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
     </div>

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
    
     <script type="text/javascript">
        $(function() {
            //搜索功能
            $("#search").click(function() {
                var url = $(this).attr('url');
                var query = $('.search-form').find('input').serialize();
                query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
                query = query.replace(/^&/g, '');
                if (url.indexOf('?') > 0) {
                    url += '&' + query;
                } else {
                    url += '?' + query;
                }
                window.location.href = url;
            });
            //回车搜索
            $(".search-input").keyup(function(e) {
                if (e.keyCode === 13) {
                    $("#search").click();
                    return false;
                }
            });
            //导航高亮
            highlight_subnav('<?php echo U('bivouac');?>');
            //点击排序
        	$('.list_sort').click(function(){
        		var url = $(this).attr('url');
        		var ids = $('.ids:checked');
        		var param = '';
        		if(ids.length > 0){
        			var str = new Array();
        			ids.each(function(){
        				str.push($(this).val());
        			});
        			param = str.join(',');
        		}

        		if(url != undefined && url != ''){
        			window.location.href = url + '/ids/' + param;
        		}
        	});
        });
    </script>


</body>
</html>