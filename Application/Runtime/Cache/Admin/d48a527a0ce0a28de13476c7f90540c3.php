<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
            <div class="widget-content padded">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-container fluid-height" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                            <div class="heading tabs" style="background: transparent;">
                                <ul class="nav nav-tabs pull-left" data-tabs="tabs" id="tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab1"><i class="icon-comments"></i><span>报名设置</span></a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#tab2"><i class="icon-user"></i><span>报名记录</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content padded" id="my-tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h3>
                                        报名设置
                                    </h3>

                                    <p>

                                    <form action="" id="AppForm" class="form-horizontal" data-bv-message="" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">报名名称</label>

                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="" value="<?php echo ($config["name"]); ?>"
                                                       name="name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">项目名称(多项目英文逗号区分)</label>

                                            <div class="col-md-7">
                                                <textarea class="form-control" name="event"
                                                          type="text"><?php echo ($config["event"]); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">项目时间</label>

                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="" value="<?php echo ($config["time_range"]); ?>"
                                                       name="time_range" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">项目介绍</label>

                                            <div class="col-md-7">
                                                <!--style给定宽度可以影响编辑器的最终宽度-->
                                                <script type="text/plain" id="J-ueditor" style="width: 600px;height:380px;position:relative">
                                                <?php echo (htmlspecialchars_decode($config["introduce"])); ?>
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">浏览量</label>

                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="" value="<?php echo ($config["visiter"]); ?>"
                                                       name="visiter" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">申请量</label>

                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="" value="<?php echo ($config["apply"]); ?>"
                                                       name="apply" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">状态</label>

                                            <div class="col-md-7">
                                                <select class="form-control" name="status">
                                                    <option value="1">开启</option>
                                                    <option value="0">关闭</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2"></label>

                                            <div class="col-md-7">
                                                <button class="btn btn-primary" type="submit">提交
                                                </button>
                                                <button class="btn btn-default-outline">取消</button>
                                            </div>
                                        </div>
                                    </form>
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <h3>
                                        报名记录
                                    </h3>

                                    <p>

                                    <div class="widget-content padded clearfix">
                                        <table class="table table-hover">
                                            <thead>
                                            <th class="check-header hidden-xs">
                                                <label><input id="checkAll" name="checkAll"
                                                              type="checkbox"><span></span></label>
                                            </th>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                联系人
                                            </th>
                                            <th class="hidden-xs">
                                                联系电话
                                            </th>
                                            <th class="hidden-xs">
                                                项目
                                            </th>
                                            <th class="hidden-xs">
                                                时间
                                            </th>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($record)): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><tr>
                                                    <td class="check hidden-xs">
                                                        <label><input name="optionsRadios1" type="checkbox"
                                                                      value="option1"><span></span></label>
                                                    </td>
                                                    <td>
                                                        <?php echo ($record["id"]); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($record["contact"]["name"]); ?>
                                                    </td>
                                                    <td class="hidden-xs">
                                                        <?php echo ($record["contact"]["mobile"]); ?>
                                                    </td>
                                                    <td class="hidden-xs">
                                                        <?php echo ($record["event"]); ?>
                                                    </td>
                                                    <td class="hidden-xs">
                                                        <?php echo ($record["time"]); ?>
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <?php echo ($page); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--百度编辑器-->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/ueditor.all.min.js"></script>

<script type="text/javascript">
    UE.getEditor('J-ueditor', {
        textarea: 'introduce' //提交字段名，必须填写，数据库必须有此字段
    });

    function setFocus() {
        UE.getEditor('J-ueditor').focus();
    }

    $('#AppForm').bootstrapValidator({
        submitHandler: function(validator, form, submitButton) {
            var tourl = "<?php echo u_addons('Apply://Admin/Admin/addConfig');?>";
            var data = $('#AppForm').serialize();
            $.App.ajax('post', tourl, data, null);
            return false;
        },
    });
</script>
<script>
    if ('<?php echo ($config); ?>') {
        $('select[name="status"]').val('<?php echo ($config["status"]); ?>');
    }
</script>