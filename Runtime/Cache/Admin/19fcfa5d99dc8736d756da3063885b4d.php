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
*{margin:0;padding:0;list-style-type:none;}

/* star */
#star{width:600px;margin:10px 0 10px 0;height:24px;}
#star ul,#star span{float:left;display:inline;height:19px;line-height:19px;}
#star ul{margin:0 10px;}
#star li{float:left;width:24px;cursor:pointer;text-indent:-9999px;background:url(/onethink1/public/Admin/images/star.png) no-repeat;}
#star strong{color:#f60;padding-left:10px;}
#star li.on{background-position:0 -28px;}
#star p{position:absolute;top:20px;width:159px;height:60px;display:none;background:url(/onethink1/public/Admin/images/icon.gif) no-repeat;padding:7px 10px 0;}
#star p em{color:#f60;display:block;font-style:normal;}
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
        <h2><?php echo isset($info['bivouacID'])?'编辑':'新增';?>活动信息</h2>
    </div>
    <form action="<?php echo U();?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">活动名称<span class="check-tips">（输入活动名称）</span></label>
            <div class="controls">
                <input type="text" id="startTime" class="text input-large" name="campName" value="<?php echo ((isset($info["campName"]) && ($info["campName"] !== ""))?($info["campName"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">所在营地<span class="check-tips">（输入营地具体地址）</span></label>
            <div class="controls">
                <input type="text" id="endTime" class="text input-large" name="bivName" value="<?php echo ($result["bivName"]); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">活动参与人数<span class="check-tips">（输入单次参与活动所需人数）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="campAmount" value="<?php echo ((isset($info["campAmount"]) && ($info["campAmount"] !== ""))?($info["campAmount"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">单人单次活动价格<span class="check-tips">（输入单人单次参与活动的费用）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="campPrice" value="<?php echo ((isset($info["campPrice"]) && ($info["campPrice"] !== ""))?($info["campPrice"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">活动背景<span class="check-tips">（输入活动背景描述）</span></label>
            <textarea name="bivDes"><?php echo ((isset($info["gamesBg"]) && ($info["gamesBg"] !== ""))?($info["gamesBg"]):''); ?></textarea>
            <?php echo hook('adminArticleEdit', array('name'=>$info['name'],'value'=>$info['name']));?>
        </div>
        <div class="form-item">
            <label class="item-label">安全须知<span class="check-tips">（输入活动安全提醒）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="campSafety" value="<?php echo ((isset($info["campSafety"]) && ($info["campSafety"] !== ""))?($info["campSafety"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">冒险度<span class="check-tips">（输入活动冒险度）</span></label>
            
               <div id="star">
					<span style="color:#666;font:12px/1.5 Arial;">星级评论打分</span>
					<ul>
						<li><a href="javascript:;">1</a></li>
						<li><a href="javascript:;">2</a></li>
						<li><a href="javascript:;">3</a></li>
						<li><a href="javascript:;">4</a></li>
						<li><a href="javascript:;">5</a></li>
						<input type="hidden" value="" name="gameRisk" class="gameRisk">
					</ul>
					<span></span>
					<p></p>
				</div>
                           
        </div>
        <div class="form-item">
            <label class="item-label">活动始末时间<span class="check-tips">（用于营地类型搜索标签）</span></label>
            <div class="controls">
                <div>
                <font style="size:12;">开始时间：</font>
                <input type="time" class="text input-small" name="startTime" value="<?php echo ((isset($info["startTime"]) && ($info["startTime"] !== ""))?($info["startTime"]):''); ?>" />
                </div>
                </br>
                <div>
                <font style="size:12;">结束时间：</font>
                <input type="time" class="text input-small" name="endTime" value="<?php echo ((isset($info["endTime"]) && ($info["endTime"] !== ""))?($info["endTime"]):''); ?>" />
                </div>
            </div>
        </div>
        
        <div class="form-item">
            <input type="hidden" name="campID" value="<?php echo ((isset($info["campID"]) && ($info["campID"] !== ""))?($info["campID"]):''); ?>">
            
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    </form>

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
        Think.setValue("pid", <?php echo ((isset($info["pid"]) && ($info["pid"] !== ""))?($info["pid"]): 0); ?>);
        Think.setValue("hide", <?php echo ((isset($info["hide"]) && ($info["hide"] !== ""))?($info["hide"]): 0); ?>);
        Think.setValue("is_dev", <?php echo ((isset($info["is_dev"]) && ($info["is_dev"] !== ""))?($info["is_dev"]): 0); ?>);
        //导航高亮
        highlight_subnav('<?php echo U('glist');?>');
        
        /* //时间
         var str = "";   
    document.writeln("<div id=\"_contents\" style=\"padding:5px;background-color:#ECF7FE;font-size:12px;border:1px solid #CFD1D5;position:absolute;left:?px; top:?px; width:?px; height:?px;z-index:1;visibility:hidden\">");   
    str += "时<select id=\"_hour\">";   
  
    for (h = 0; h <= 23; h++) {   
        if(h >=0 && h<=9)  
           str += "<option value=\"0" + h + "\">0" + h + "</option>";  
        else  
           str += "<option value=\"" + h + "\">" + h + "</option>";   
    }  
  
    str += "</select> 分<select id=\"_minute\">";   
    for (m = 0; m <= 59; m++) {   
        if(m >=0 && m<=9)  
           str += "<option value=\"0" + m + "\">0" + m + "</option>";  
        else  
           str += "<option value=\"" + m + "\">" + m + "</option>";   
            
    }  
  
      
  
    str += "</select> <input type=\"button\" onclick=\"_select()\" value=\"\确定\" /> <input type=\"button\" onclick=\"_clear()\" value=\"\清除\" /></div>";   
    document.writeln(str);  
  
    var _fieldname;   
  
    function _SetTime(tt) {   
        _fieldname = tt;   
        var ttop = tt.offsetTop;    //TT控件的定位点高   
        var thei = tt.clientHeight;    //TT控件本身的高   
        var tleft = tt.offsetLeft;    //TT控件的定位点宽   
        while (tt = tt.offsetParent) {   
            ttop += tt.offsetTop;   
            tleft += tt.offsetLeft;   
        }   
        document.all._contents.style.top = ttop + thei + 4;   
        document.all._contents.style.left = tleft;   
        document.all._contents.style.visibility = "visible";   
    }   
  
    function _select() {   
        _fieldname.value = document.all._hour.value+":"+ document.all._minute.value;   
        document.all._contents.style.visibility = "hidden";   
    }  
      
    function _clear() {   
        document.all._hour.value = document.all._minute.value = "00";  
        _fieldname.value = "";  
        document.all._contents.style.visibility = "hidden";  
    }  
  
    document.onclick = function(e){  
        e = window.event||e;  
        obj = e.srcElement ? e.srcElement : e.target;  
        if(obj.className != "time" && obj.id != "_contents" && obj.id != "_hour" && obj.id != "_minute" && obj.id != "_second"){  
            document.all._contents.style.visibility = "hidden";  
        }  
 
}; */


		//星星打分
		window.onload = function (){
		
		var oStar = document.getElementById("star");
		var aLi = oStar.getElementsByTagName("li");
		var oUl = oStar.getElementsByTagName("ul")[0];
		var oSpan = oStar.getElementsByTagName("span")[1];
		var oP = oStar.getElementsByTagName("p")[0];
		var i = iScore = iStar = 0;
		var aMsg = [
				"很简单|人人都能过关，超简单的",
				"较简单|少部分人可能通不了关，蛮简单",
				"一般|部分人会遇到困难，难度中等",
				"较难 |少部分人能通过，难度较大",
				"很难 |较少人能闯过此关，超难啊"
				]
		
		for (i = 1; i <= aLi.length; i++){
		aLi[i - 1].index = i;
		
		//鼠标移过显示分数
		aLi[i - 1].onmouseover = function (){
			fnPoint(this.index);
			//浮动层显示
			oP.style.display = "block";
			//计算浮动层位置
			oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
			//匹配浮动层文字内容
			oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
		};
		
		//鼠标离开后恢复上次评分
		aLi[i - 1].onmouseout = function (){
			fnPoint();
			//关闭浮动层
			oP.style.display = "none"
		};
		
		//点击后进行评分处理
		aLi[i - 1].onclick = function (){
			iStar = this.index;
			oP.style.display = "none";
			oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")"
		   }
		}
		
		//评分处理
		function fnPoint(iArg){
		//分数赋值
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";	
		}
		$("#star ul li").click(function(){
		var $store = $(this).find("a").text();//获取到评分
		
		$(".gameRisk").val($store);
		})
		};
    </script>

</body>
</html>