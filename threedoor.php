<?php

/**
 * 三门游戏
 */

play();

function play() {
	//定义三个门和奖品，0代表羊，1代表车
	$award = [0, 0, 1];
	//定义验证次数
	$num = 1000;
	$noChangeNum = $changeNum = 0;
	for ($i = 0; $i < $num; $i++) {
		//每次选择将奖品打乱
		shuffle($award);
		//随机选择一个奖品
		$guess = rand(0, 2);
		//不换门
		$change = false;
		if (getRand($award, $guess, $change)) {
			$noChangeNum++;
		}
	}
	for ($i = 0; $i < $num; $i++) {
		shuffle($award);
		$guess = rand(0, 2);
		//换门
		$change = true;
		if (getRand($award, $guess, $change)) {
			$changeNum++;
		}
	}
	echo "不换门，抽奖{$num}次，中大奖次数{$noChangeNum}次<br>";
	echo "换门，抽奖{$num}次，中大奖次数{$changeNum}次<br>";
}

function getRand(array $award, $guess, $change) {
	if (!$change) {
		return $award[$guess] ? true : false;
	} else {
		unset($award[$guess]);
		//主持人打开一个羊的门
		foreach ($award as $k => $v) {
			if (!$v) {
				unset($award[$k]);
			}
		}

		return $award ? true : false;
	}
}