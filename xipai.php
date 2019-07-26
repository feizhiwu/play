<?php

/**
 * 洗牌
 */

play();

function play() {
	//定义54张扑克牌
	$card = [
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10,
		11,
		12,
		13,
		14,
		15,
		16,
		17,
		18,
		19,
		20,
		21,
		22,
		23,
		24,
		25,
		26,
		27,
		28,
		29,
		30,
		31,
		32,
		33,
		34,
		35,
		36,
		37,
		38,
		39,
		40,
		41,
		42,
		43,
		44,
		45,
		46,
		47,
		48,
		49,
		50,
		51,
		52,
		53,
		54
	];
	var_dump(getRand($card));
}

function getRand(array $card) {
	$num = count($card) - 1;
	foreach ($card as $k => $v) {
		$rand = rand(0, $num);
		list($card[$k], $card[$rand]) = [$card[$rand], $card[$k]];
	}

	return $card;
}