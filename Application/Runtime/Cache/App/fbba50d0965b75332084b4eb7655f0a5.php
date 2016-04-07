<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
<html>
<head>
    <title>产品列表</title>
    <meta charset="utf-8" />
    <!--页面优化-->
        <meta name="MobileOptimized" content="320">
        <!--默认宽度320-->
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
        <!--viewport 等比 不缩放-->
        <meta http-equiv="cleartype" content="on">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!--删除苹果菜单-->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!--默认颜色-->
        <meta name="apple-mobile-web-app-title" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <!--加载全部后 显示-->
        <meta content="telephone=no" name="format-detection" />
        <!--不识别电话-->
        <meta content="email=no" name="format-detection" />
        <link rel="stylesheet" href="/Public/App/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/Public/App/css/mystyle.css">
        <!--组件依赖js begin-->
        <script src="/Public/App/js/zepto.min.js"></script>
        <script src="/Public/App/js/fx.js"></script>
        <script src="/Public/App/js/fx_methods.js"></script>
    
        <script type="text/javascript" src="/Public/App/gmu/iscroll.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/gmu.min.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/widget.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/navigator.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/scrollable.js"></script>
        <script type="text/javascript" src="/Public/App/gmu/app-basegmu.js"></script>
    <!--组件依赖js end-->
    <style>
    .showImg-div {
        height: 160px;
    }
    
    .showImg {
        width: 100%;
        overflow: hidden;
    }
    </style>
</head>
<body class="goods">
    <div>
        <div>
                    
             <form id="App-search" method="post" action="<?php echo U('App/Shop/search/');?>">
                    <input id="name" name="name" type="text" class="form-control" placeholder="请输入喜欢的商品"/>
                    <input type="submit" value="搜索" class="btn" />
             </form>
         </div>
        <div class="index-plist" id="index-plist">
                <ul class="plist-ul">
                    <?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('App/Shop/goods',array('sid'=>0,'id'=>$vo['id'],'ppid'=>$_SESSION['WAP']['vipid']));?>">
                                <div class="showImg-div"><img class="showImg" src="<?php echo ($vo["imgurl"]); ?>" /></div>
                                <!--图片尺寸：336*259-->
                                <h1 class="plist-tt fonts4 ovflw" style="height:30px;"><?php echo ($vo["name"]); ?></h1>
                                <p><span class="plist-yp color3"><i class="fonts3">￥</i><em class="fonts1"><?php echo ($vo["price"]); ?></em></span>&nbsp;<span class="plist-xp fonts3">￥<?php echo ($vo["oprice"]); ?></span></p>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
        </div>
     <!-- 底部导航 -->
        		<div class="insert1"></div>
		<div class="ui-nav">
			<ul class="ui-navul ovflw">
				<li><a href="<?php echo U('App/Shop/index');?>" id="fthome"><span class="iconfont">&#xe6b8</span><p class="ui-navtt">首页</p></a></li>
				<li><a href="<?php echo U('App/Shop/cateList',array('sid'=>0));?>" id="ftcate"><span class="iconfont">&#xe699</span><p class="ui-navtt">分类</p></a></li>
				<li><a href="<?php echo U('App/Shop/basket',array('sid'=>0,'lasturl'=>$footlasturl));?>" id="ftbasket"><span class="iconfont">&#xe6af</span><p class="ui-navtt">购物车</p></a></li>
				<li><a href="<?php echo U('App/Vip/index');?>" id="ftvip"><span class="iconfont">&#xe686</span><p class="ui-navtt">个人中心</p></a></li>
			</ul>
		</div>
		<script type="text/javascript">
			 var actname="<?php echo ($actname); ?>";
			 $('#'+actname).css('color','#19a5f3');
		</script>
    </div>  

<script type="text/javascript">
    

</script>    
</body>
</html>