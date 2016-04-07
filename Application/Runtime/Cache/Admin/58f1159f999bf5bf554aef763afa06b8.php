<?php if (!defined('THINK_PATH')) exit();?><div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="widget">
			<div class="widget-header bg-blue">
				<i class="widget-icon fa fa-arrow-down"></i>
				<span class="widget-caption">卡券列表</span>
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
				<div class="table-toolbar">
					<a href="<?php echo U('Admin/Vip/cardSet/');?>" class="btn btn-primary" data-loader="App-loader" data-loadername="卡券设置">
						<i class="fa fa-plus"></i>新增卡券
					</a>
					<a href="#" class="btn btn-danger" id="App-delall">
						<i class="fa fa-times"></i>删除卡券
					</a>
					<?php if(($type) == "2"): ?><a href="#" class="btn btn-success" id="sendCard">
						<i class="fa fa-delicious"></i>发送卡券
					</a><?php endif; ?>
					<div class="pull-right">
						<form id="App-search">
							<label style="margin-bottom: 0px;">
								<input name="search" type="search" class="form-control input-sm" placeholder="卡券编号">
							</label>
							<a href="<?php echo U('Admin/Vip/card',array('type'=>$type));?>" class="btn btn-success" data-loader="App-loader" data-loadername="卡券列表" data-search="App-search">
								<i class="fa fa-search"></i>搜索
							</a>
							&nbsp;&nbsp;
							<button href="javascript:void(0)" class="btn btn-primary" id="exportCard"><i class="fa fa-save"></i>导出卡券</button>
						</form>
						
					</div>
				</div>

				<table id="App-table" class="table table-bordered table-hover">
					<thead class="bordered-darkorange">
						<tr role="row">
							<th width="20px"><div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
									<label style="padding-left: 4px;"> <input type="checkbox" class="App-checkall colored-blue">
                                     <span class="text"></span>
									</label>                                    
                                </div></th>
							<th width="50px">ID</th>
							<th width="100px">类型</th>
							<th width="150px">卡券编号</th>
							<th width="150px">卡券密码</th>
							<th width="100px">金额</th>
							<th width="200px">有效期</th>
							<th width="150px">使用规则</th>
							<th width="100px">创建时间</th>
							<th width="100px">状态</th>
							<th width="100px">所属会员ID</th>
							<th width="100px">使用时间</th>
							<th width="300px">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($cache)): $i = 0; $__LIST__ = $cache;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="item<?php echo ($vo["id"]); ?>">
								<td>
									<div class="checkbox" style="margin-bottom: 0px; margin-top: 0px;">
										<label style="padding-left: 4px;"> <input name="checkvalue" type="checkbox" class="colored-blue App-check" value="<?php echo ($vo["id"]); ?>">
	                                     <span class="text"></span>
										</label>                                    
	                                </div>
								</td>
								<td class=" sorting_1"><?php echo ($vo["id"]); ?></td>
								<td class=" " id="type<?php echo ($vo["id"]); ?>"><?php if(($vo["type"]) == "1"): ?>充值卡<?php endif; if(($vo["type"]) == "2"): ?>代金券<?php endif; ?></td>
								<td class=" "><?php echo ($vo["cardno"]); ?></td>
								<td class=" "><?php echo ($vo["cardpwd"]); ?></td>
								<td class=" " id="money<?php echo ($vo["id"]); ?>"><?php echo ($vo["money"]); ?></td>
								<td class=" "><?php if($vo["stime"] != 0): echo (date('Y-m-d',$vo["stime"])); ?>至<?php echo (date('Y-m-d',$vo["etime"])); endif; ?></td>
								<td class=" "><?php if($vo["usemoney"] != 0): ?>满<?php echo ($vo["usemoney"]); ?>元使用<?php endif; ?></td>
								<td class=" "><?php echo (date('Y-m-d',$vo["ctime"])); ?></td>
								<td class=" " id="status<?php echo ($vo["id"]); ?>"><?php if(($vo["status"]) == "0"): ?>生成<?php endif; if(($vo["status"]) == "1"): ?>已发卡<?php endif; if(($vo["status"]) == "2"): ?>已使用<?php endif; ?></td>
								<td class=" "><?php if($vo["vipid"] != 0): echo ($vo["vipid"]); endif; ?></td>
								<td class=" "><?php if(($vo["status"]) == "2"): echo (date('Y-m-d',$vo["usetime"])); endif; ?></td>
								<td class="center "><a href="<?php echo U('Admin/vip/card/');?>" class="btn btn-danger btn-xs" data-type = "del" data-ajax="<?php echo U('Admin/vip/cardDel/',array('id'=>$vo['id']));?>" ><i class="fa fa-trash-o"></i> 删除</a></eq></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
												
					</tbody>
				</table>
				<div class="row DTTTFooter">
					<?php echo ($page); ?>
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
<!--全选特效封装/全部删除-->
<script type="text/javascript">
	//全选
	var checkall=$('#App-table .App-checkall');
	var checks=$('#App-table .App-check');
	var trs=$('#App-table tbody tr');
	$(checkall).on('click',function(){
		if($(this).is(":checked")){			
			$(checks).prop("checked","checked");
		}else{
			$(checks).removeAttr("checked");
		}		
	});
	$(trs).on('click',function(){
		var c=$(this).find("input[type=checkbox]");
		if($(c).is(":checked")){
			$(c).removeAttr("checked");
		}else{
			$(c).prop("checked","checked");
		}		
	});
	//发送给会员
	$("#sendCard").on('click', function () {
		var checks=$(".App-check:checked");
		if(checks.length==0){
			$.App.alert('danger','请选择要发送的卡券！');
			return false;
		}
		if(checks.length>1){
			$.App.alert('danger','单次仅能发送一张卡券！');
			return false;
		}
		var cardid=checks.val();
		var cardstatus=$('#status'+cardid).text();
		if(cardstatus!='生成'){
			$.App.alert('danger','此卡券不能发放！');
			return false;
		}
		if($('#type'+cardid).text()=='充值卡'){
			$.App.alert('danger','充值卡暂不支持线上发放！');
			return false;
		}
		var carddetail=$('#money'+cardid).text()+"元"+$('#type'+cardid).text()+"　发送给：";
		
		
        bootbox.prompt(carddetail, function (result) {
            if (result != null) {
                var data={'cardid':cardid,'vipid':result};
                var tourl="<?php echo U('Admin/vip/sendCard');?>";
            	$.App.ajax('post',tourl,data,function(){$('#refresh-toggler').trigger('click');});
            }
        });
        
    });
	//全删
	$('#App-delall').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		if(!chk){
			$.App.alert('danger','请选择要删除的项目！');
			return false;
		}
		var toajax="<?php echo U('Admin/Vip/cardDel');?>"+"/id/"+chk;
		var funok=function(){
			var callok=function(){
				//成功删除后刷新
				$('#refresh-toggler').trigger('click');
				return false;
			};
			var callerr=function(){
				//拦截错误
				return false;
			};
			$.App.ajax('post',toajax,'nodata',callok,callerr);
		}						
		$.App.confirm("确认要删除吗？",funok);
	});
	
	$('#exportCard').on('click',function(){
		var checks=$(".App-check:checked");
		var chk='';
		$(checks).each(function(){
			chk+=$(this).val()+',';
		});
		window.open("<?php echo U('Admin/Vip/cardExport');?>/type/<?php echo ($type); ?>/id/"+chk);
	})
</script>
<!--/全选特效封装-->