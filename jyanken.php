<?php
// 40 じゃんけんを作成しよう！
// 下記の要件を満たす「じゃんけんプログラム」を開発してください。

// 要件定義
// ・使用可能な手はグー、チョキ、パー
// ・勝ち負けは、通常のじゃんけん
// ・PHPファイルの実行はコマンドラインから。

// ご自身が自由に設計して、プログラムを書いてみましょう！

const STONE = 0;
const SCISSOR = 1;
const PAPER = 2;

const WIN = 2;
const LOSE = 1;
const DRAW = 0;
const NOT_CLEAR = -1;

const NO = 0;
const YES = 1;

const HAND_TYPE = array(
    STONE => 'グー',
    SCISSOR => 'チョキ',
    PAPER => 'パー'
);

const RESULT_LIST = array(
    WIN => 'あなたの勝ちです',
    LOSE => 'あなたの負けです',
    DRAW => 'あいこです',
    NOT_CLEAR => '不明'
);

const YES_OR_NO = array(
    NO => 'いいえ',
    YES => 'はい',
);

function inputHand()
{
    $myHandType = trim(fgets(STDIN));
    if (!in_array($myHandType, HAND_TYPE, true)) {
        echo '入力が正しくありません。もう一度！';
        echo PHP_EOL;
        return inputHand();
    }
    $myHandNumber = array_keys(HAND_TYPE, $myHandType);
    return $myHandNumber[0];
}

function getComHand()
{
    $com = random_int(0, 2);
    echo 'CPU:' . HAND_TYPE[$com] . PHP_EOL;
    return $com;
}

function judge($myHand, $comHand)
{
    return ($myHand - $comHand + 3) % 3;
}

function show($result)
{
    echo RESULT_LIST[$result] . PHP_EOL;
}
function retry()
{
    echo 'じゃんけんを続けますか？はい/いいえ' . PHP_EOL;
    $yesOrNo = trim(fgets(STDIN));
    $retry_flag = array_keys(YES_OR_NO, $yesOrNo);
    return $retry_flag[0];
}
function jyanken()
{
    echo 'グー、チョキ、パーのいずれかを入力してください。じゃんけん・・・' . PHP_EOL;
    $myHand = inputHand();
    $comHand = getComHand();
    $result = judge($myHand, $comHand);
    show($result);
    if ($result === DRAW) {
        jyanken();
    } else {
        $retry_flag = retry();
        if ($retry_flag === YES) {
            return jyanken();
        }
        return;
    }
}



jyanken();
