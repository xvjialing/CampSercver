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
    
    <style>
        body{padding: 0}
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
            

            
    <!-- 主体 -->
    <div id="indexMain" class="index-main">
       <!--插件块 -->
       <!-- <div class="container-span"><?php echo hook('AdminIndex');?></div> -->
    </div>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery全国城市网点分步地图 - 源码之家</title>
<script type="text/javascript" src="<?php echo (ADMIN_JS_URL); ?>jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_CSS_URL); ?>style1.css">
</head>

<body>
<div class="m_map">
	<div class="tait">目前覆盖全国<span>50+</span>个城市，共有<span>6000+</span>合作门店</div>
    <div class="mp mp2">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：西安市未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">西安</div>
    </div>
    <div class="mp mp3">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：成都未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">成都</div>
    </div>
    <div class="mp mp4">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：重庆未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">重庆</div>
    </div>
    <div class="mp mp5">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：贵阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">贵阳</div>
    </div>
    <div class="mp mp6">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：南宁未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">南宁</div>
    </div>
    <div class="mp mp7">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：昆明未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">昆明</div>
    </div>
    <div class="mp mp8">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：西安未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">西安</div>
    </div>
    <div class="mp mp9">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：郑州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">郑州</div>
    </div>
    <div class="mp mp10">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：太原未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">太原</div>
    </div>
    <div class="mp mp11">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：武汉未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">武汉</div>
    </div>
    <div class="mp mp12">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：长沙未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">长沙</div>
    </div>
    <div class="mp mp13">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：南昌未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">南昌</div>
    </div>
    <div class="mp mp14">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：杭州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">杭州</div>
    </div>
    <div class="mp mp15">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：厦门未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">厦门</div>
    </div>
    <div class="mp mp16">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：广州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">广州</div>
    </div>
    <div class="mp mp17">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：深圳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">深圳</div>
    </div>
    <div class="mp mp18">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：合肥未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">合肥</div>
    </div>
    <div class="mp mp19">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：南京未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">南京</div>
    </div>
    <div class="mp mp20">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：上海未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">上海</div>
    </div>
    <div class="mp mp21">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：济南未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">济南</div>
    </div>
    <div class="mp mp22">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：青岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">青岛</div>
    </div>
    <div class="mp mp23">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：北京未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">北京</div>
    </div>
    <div class="mp mp24">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：天津未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">天津</div>
    </div>
    <div class="mp mp25">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：沈阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">沈阳</div>
    </div>
    <div class="mp mp26">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：长春未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">长春</div>
    </div>
    <div class="mp mp27">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：哈尔滨未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito find_mi2">哈尔滨</div>
    </div>
    <div class="mp mp28">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：佛山未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">佛山</div>
    </div>
	<div class="mp mp29">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：常州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">常州</div>
    </div>
    <div class="mp mp30">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：东莞未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">东莞</div>
    </div>
    <div class="mp mp31">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：无锡未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">无锡</div>
    </div>
    <div class="mp mp32">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：中山未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">中山</div>
    </div>
    <div class="mp mp33">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：苏州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">苏州</div>
    </div>
    <div class="mp mp34">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：秦皇岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito find_mi2">秦皇岛</div>
    </div>
    <div class="mp mp35">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：镇江岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">镇江</div>
    </div>
    <div class="mp mp36">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：洛阳岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">洛阳</div>
    </div>
    <div class="mp mp37">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：襄阳岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">襄阳</div>
    </div>
    <div class="mp mp38">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：衡阳岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">衡阳</div>
    </div>
    <div class="mp mp39">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：湘潭岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">湘潭</div>
    </div>
    <div class="mp mp40">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：石家庄岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito find_mi2">石家庄</div>
    </div>
    <div class="mp mp41">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：嘉兴岛未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">嘉兴</div>
    </div>
    <div class="mp mp42">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：潍坊未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">潍坊</div>
    </div>
    <div class="mp mp43">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：惠州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">惠州</div>
    </div>
    <div class="mp mp44">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：温州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">温州</div>
    </div>
    <div class="mp mp45">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：台州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">台州</div>
    </div>
    <div class="mp mp46">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：株州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">株州</div>
    </div>
    <div class="mp mp47">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：绵阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">绵阳</div>
    </div>
    <div class="mp mp48">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：宁波未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">宁波</div>
    </div>
    <div class="mp mp49">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：绍兴未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">绍兴</div>
    </div>
    <div class="mp mp50">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：金华未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">金华</div>
    </div>
    <div class="mp mp51">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：福州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">福州</div>
    </div>
    <div class="mp mp52">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：泉州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">泉州</div>
    </div>
    <div class="mp mp53">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：乐山未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">乐山</div>
    </div>
    <div class="mp mp54">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：江门未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">江门</div>
    </div>
    <div class="mp mp55">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：新乡未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">新乡</div>
    </div>
    <div class="mp mp56">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：信阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">信阳</div>
    </div>
    <div class="mp mp57">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：德阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">德阳</div>
    </div>
    <div class="mp mp58">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：常德未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">常德</div>
    </div>
    <div class="mp mp59">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：徐州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">徐州</div>
    </div>
    <div class="mp mp60">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：梧州未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">梧州</div>
    </div>
    <div class="mp mp61">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：宜昌未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">宜昌</div>
    </div>
    <div class="mp mp62">
        <div class="feng">
            <div class="tree">
                <div class="sang"></div>
                <div class="boou"><img src="<?php echo (ADMIN_IMG_URL); ?>boou.png" alt=""/></div>
                <div class="du_size">
                    <P>地址：岳阳未央区未央宫街道未央路2号老三届首座大厦11208 </P>
                    <P>电话：029-68829598</P>
                </div>
            </div>
        </div>
        <div class="mito">岳阳</div>
    </div>
    
    
    
    
    
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
   $(".mp").mouseover(function(){
		$(this).find(".feng").show();	
	}).mouseout(function(){
		$(this).find(".feng").hide();

	});	
});
</script>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>
    
    

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
    /* 插件块关闭操作 */
    $(".title-opt .wm-slide").each(function(){
        $(this).click(function(){
            $(this).closest(".columns-mod").find(".bd").toggle();
            $(this).find("i").toggleClass("mod-up");
        });
    })
    $(function(){
        // $('#main').attr({'id': 'indexMain','class': 'index-main'});
        $('.copyright').html('<div class="copyright"> ©2013 <a href="http://www.topthink.net" target="_blank">topthink.net</a> 上海顶想信息科技有限公司版权所有</div>');
        $('.sidebar').remove();
    })
</script>

</body>
</html>