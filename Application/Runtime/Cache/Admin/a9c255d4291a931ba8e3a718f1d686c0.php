<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-xs-12 col-xs-12">
        <div class="widget radius-bordered">
            <div class="widget-header bg-blue">
                <i class="widget-icon fa fa-arrow-down"></i>
                <span class="widget-caption">模版消息配置</span>
                <div class="widget-buttons">
                    <a href="#" data-toggle="maximize">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a href="#" data-toggle="collapse">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a href="#" data-toggle="dispose">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <br />
                <sup>* 模板消息类型有：订单支付成功通知（OPENTM200444326）；订单发货通知（OPENTM201541214）；成为会员通知（OPENTM203264949）</sup><br />
                <sup>* 更新保存会自动在公众号上添加相对应的模板消息ID，手动保存可以通过手动编辑相应的模板消息ID</sup><br />
                <sup>* 由于微信只提供了添加模板消息的接口，所以在此处添加的模板消息若多于15，则会添加失败，需要到微信公众号后台进行删除</sup><br />
                <sup>* 微信模板消息内行业设置必须为 消费品-消费品</sup><br /><hr /><br />
                <div class="form-horizontal">
                    <?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ($vo["position"]); ?>（<?php echo ($vo["templateidshort"]); ?>）：</label>
                            <div class="col-sm-5">
                                <input id="<?php echo ($vo["templateidshort"]); ?>" type="text" class="form-control" placeholder="Template_ID" value="<?php echo ($vo["templateid"]); ?>">
                            </div>
                            <div class="col-sm-1" style="display: none;">
                                <div class="btn btn-default" data-short="<?php echo ($vo["templateidshort"]); ?>" onclick="refreshtemplateid(this)">更新保存</div>
                            </div>
                            <div class="col-sm-1">
                                <div class="btn btn-default" data-short="<?php echo ($vo["templateidshort"]); ?>" onclick="savetemplateid(this)">保存</div>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--面包屑导航封装-->
<div id="tmpbread" style="display: none;"><?php echo ($breadhtml); ?></div>
<script type="text/javascript">
setBread($('#tmpbread').html());
</script>
<!--/面包屑导航封装-->
<script type="text/javascript">
function refreshtemplateid(o){
    var object = $(o);
    var shortid = object.data('short');
    if(!shortid){
        $.App.alert('danger','通信失败！');
        return false;
    }else{
        $.ajax({
            type: 'post',
            data: {
                'shortid': shortid,
            },
            url: "<?php echo U('Admin/Wx/templateRemoteSet');?>",
            async: false,
            dataType: 'json',
            success: function(e) {
                $('#'+e.shortid).val(e.templateid);
                $.App.alert('ok', e.msg);
                return false;
            },
            error: function() {
                $.App.alert('danger', '通讯失败！');
            }
        });
        return false;
    }

}
function savetemplateid(o){
    var object = $(o);
    var shortid = object.data('short');
    var templateid = $('#'+shortid).val();
    if(!shortid){
        $.App.alert('danger','通信失败！');
        return false;
    }else{
        $.ajax({
            type: 'post',
            data: {
                'shortid': shortid,
                'templateid': templateid,
            },
            url: "<?php echo U('Admin/Wx/templateSet');?>",
            async: false,
            dataType: 'json',
            success: function(e) {
                $.App.alert('ok', e.msg);
                return false;
            },
            error: function() {
                $.App.alert('danger', '通讯失败！');
            }
        });
        return false;
    }
}
</script>