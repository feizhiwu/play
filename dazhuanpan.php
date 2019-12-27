<?php

/**
 * 大转盘
 * 同样适用于翻牌，刮刮卡等
 */

play();

function play() {
	//设置奖品和权重，权重不允许负数
	$award = [
		['id' => 1, 'name' => '安慰奖', 'weight' => 100],
		['id' => 2, 'name' => '三等奖', 'weight' => 80],
		['id' => 3, 'name' => '二等奖', 'weight' => 30],
		['id' => 4, 'name' => '一等奖', 'weight' => 10],
		['id' => 5, 'name' => '超级大奖', 'weight' => 0.001],
		['id' => 6, 'name' => '谢谢惠顾', 'weight' => 100],
	];
	var_dump(getRand($award));
}

function getRand(array $award) {
	$max = $min = $pow = 1;
	$arr = $res = [];
	//获取权重小于1的值
	foreach ($award as $v) {
		if ($v['weight'] < 1) {
			$min = $v['weight'] < $min ? $v['weight'] : $min;
		}
	}
	//如果权重最小值小于1，则乘以相应小数位数，使权重全部换算成整数
	if ($min < 1) {
		$len = strlen(explode('.', $min)[1]);
		$pow = (int)pow(10, $len);
	}
	foreach ($award as $v) {
		$v['weight'] *= $pow;
		$max = $v['weight'] > $max ? $v['weight'] : $max;
		$arr[] = $v;
	}
	//获取所有权重大于随机值的奖品
	$rand = mt_rand(0, $max);
	foreach ($arr as $v) {
		if ($v['weight'] >= $rand) {
			$res[] = $v;
		}
	}
	//随机返回一个奖品
	$rand = mt_rand(0, count($res) - 1);

	return $res[$rand];
}