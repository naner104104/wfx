<?php

namespace App\Model;


use Think\Model\ViewModel;

class GroupbuyViewModel extends ViewModel{

    public $viewFields=array(
          'Shop_groupbuy'=>array('id','ptid','price','minnumber','indate','zan','buynumber','buygoodsnum'),
          'Shop_goods'=>array('spu','cid','lid','name','indexpic','listpic','pic','album','summary','oprice','unit','num','sorts','clicks','sells','dissells','fx1rate','fx2rate','fx3rate','issku','ismy','issells','skuinfo','content','status','price'=>'goodsprice','_on'=>'Shop_groupbuy.ptid=Shop_goods.id')

    	);

}


?>