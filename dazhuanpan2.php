<?php

/**
 * 大转盘2
 * 同样适用于翻牌，刮刮卡等
 * 代码解释
 * 3种奖品 a:10% b:50% c:80% 总概率:140%
 * A = 10%/140% = 1/14; B = (10%+50%) = 6/14; C = (10%+50%+80%) = 14/14
 * 形成排序数组 [1/14,6/14,14/14]
 * 随机返回一个0-1的值，例如 2/14
 * 插入原数组并排序 [1/14,2/14,6/14,14/14]，取的随机值在数组中的index，index=2
 * 返回原数组index=2的值，即6/14
 */

play();

function play() {
	//设置奖品和概率，概率不允许负数，并假设已经按照per排序
	$award = [
		['id' => 1, 'name' => '一等奖', 'per' => 10],
		['id' => 2, 'name' => '二等奖', 'per' => 50],
		['id' => 3, 'name' => '三等奖', 'per' => 80],
	];
	var_dump(getRand($award));
}

function getRand(array $award) {
	$sumRate = 0;
	foreach ($award as $v) {
		$sumRate += $v['per'];
	}
	$arr = [];
	$totalPer = 0;
	foreach ($award as $v) {
		$totalPer += $v['per'];
		$arr[] = $totalPer / $sumRate;
	}
	$randSeed = mt_rand(0, mt_getrandmax()) / mt_getrandmax();
	$arr[] = $randSeed;
	sort($arr);

	return $award[array_search($randSeed, $arr)];
}