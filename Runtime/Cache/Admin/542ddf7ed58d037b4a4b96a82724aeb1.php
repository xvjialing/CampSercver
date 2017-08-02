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
        <h2><?php echo isset($info['bivouacID'])?'编辑':'新增';?>营地信息</h2>
    </div>
    <form action="<?php echo U('cupdate');?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">营地名称<span class="check-tips">（输入营地名称）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="bivName" value="<?php echo ((isset($info["bivName"]) && ($info["bivName"] !== ""))?($info["bivName"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">营地地址<span class="check-tips">（输入营地具体地址）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="bivAdd" value="<?php echo ((isset($info["bivAdd"]) && ($info["bivAdd"] !== ""))?($info["bivAdd"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">营地介绍<span class="check-tips">（输入营地详细描述）</span></label>
            <textarea name="bivDes"><?php echo ((isset($info["bivDes"]) && ($info["bivDes"] !== ""))?($info["bivDes"]):''); ?></textarea>
            <?php echo hook('adminArticleEdit', array('name'=>$info['name'],'value'=>$info['name']));?>
        </div>
        <div class="form-item">
            <label class="item-label">特色美食<span class="check-tips">（当地特色美食描述）</span></label>
            <div class="controls">
                <input type="text" class="text input-small" name="bivFood" value="<?php echo ((isset($info["bivFood"]) && ($info["bivFood"] !== ""))?($info["bivFood"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">露营特色<span class="check-tips">（露营方式及营地详细介绍）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="content" value="<?php echo ((isset($info["content"]) && ($info["content"] !== ""))?($info["content"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">营地类型<span class="check-tips">（用于营地类型搜索标签）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="bivType" value="<?php echo ((isset($info["bivType"]) && ($info["bivType"] !== ""))?($info["bivType"]):''); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">露营方式<span class="check-tips">（用于露营方式搜索标签）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="campType" value="<?php echo ((isset($info["campType"]) && ($info["campType"] !== ""))?($info["campType"]):''); ?>">
            </div>
        </div>
       
      
        <div class="form-item">
            <input type="hidden" name="bivouacID" value="<?php echo ((isset($info["bivouacID"]) && ($info["bivouacID"] !== ""))?($info["bivouacID"]):''); ?>">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确定</button>
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
        highlight_subnav('<?php echo U('clist');?>');
    </script>

</body>
</html>