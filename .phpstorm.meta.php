<?php
	namespace PHPSTORM_META {
	/** @noinspection PhpUnusedLocalVariableInspection */
	/** @noinspection PhpIllegalArrayKeyTypeInspection */
	$STATIC_METHOD_TYPES = [

		\D('') => [
			'Mongo' instanceof Think\Model\MongoModel,
			'View' instanceof Think\Model\ViewModel,
			'SignRecord' instanceof Addons\Sign\Model\SignRecordModel,
			'ScoreOrder' instanceof Admin\Model\ScoreOrderModel,
			'Commission' instanceof Common\Model\CommissionModel,
			'ApplyRecord' instanceof Addons\Apply\Model\ApplyRecordModel,
			'ShopOrder' instanceof Admin\Model\ShopOrderModel,
			'Order' instanceof Addons\SystemInfo\Model\OrderModel,
			'Adv' instanceof Think\Model\AdvModel,
			'Employee' instanceof Common\Model\EmployeeModel,
			'VoteRecord' instanceof Addons\Vote\Model\VoteRecordModel,
			'Vip' instanceof Admin\Model\VipModel,
			'Relation' instanceof Think\Model\RelationModel,
			'WheelRecord' instanceof Addons\Wheel\Model\WheelRecordModel,
			'User' instanceof Admin\Model\UserModel,
			'Merge' instanceof Think\Model\MergeModel,
			'Wechat' instanceof Common\Model\WechatModel,
		],
	];
}