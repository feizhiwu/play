<?php

/**
 * 抢红包算法
 * 二倍均值法
 */

play();

function play() {
	//设置红包金额和个数
	$award = [
		'money' => 10,
		'num' => 10
	];
	getRand($award);
}

function getRand(array $award) {
	$num = $award['num'];
	for ($i = 0; $i < $num; $i++) {
		if ($i + 1 == $num) {
			$money = $award['money'];
		} else {
			//关键代码，每个红包额度在0.01和(剩余平均值x2)之间
			$money = rand(1, intval($award['money'] * 100 / ($award['num'] - $i) * 2) - 1) / 100;
		}
		$award['money'] = bcsub($award['money'], $money, 2);
		echo '第' . ($i + 1) . '个用户领取了' . $money . '元红包，红包剩余' . $award['money'] . '元<br/>';
	}
}