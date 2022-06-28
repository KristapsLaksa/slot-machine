<?php
$wallet = 500.00;
$rowCount = 3;
$columnCount = 5;


$symbols = [
    '@'=>1,
    '#'=>2,
    '$'=>3,
    '%'=>4,
    '*'=>5
];

$payout= [
    3 => 1.50,
    4=>2,
    5=>3
];

$lines = [
    [0, 1, 2, 3, 4],
    [5, 6, 7, 8, 9],
    [10, 11, 12, 13, 14],
    [0, 6, 12, 8, 4],
    [10, 6, 2, 8, 14]
];



$board = [
    ' ', ' ', ' ', ' ', ' ',
    ' ', ' ', ' ', ' ', ' ',
    ' ', ' ', ' ', ' ', ' '
];

function display_board(array $board): void
{

    echo "-------------------\n";
    echo " $board[0] | $board[1] | $board[2] | $board[3] | $board[4]  \n";
    echo "---+---+---+---+---\n";
    echo " $board[5] | $board[6] | $board[7] | $board[8] | $board[9]  \n";
    echo "---+---+---+---+---\n";
    echo " $board[10] | $board[11] | $board[12] | $board[13] | $board[14]  \n";
    echo "-------------------\n";
}

display_board($board);

$balance = (float)readline('Enter money: ');

if ($balance > $wallet) {
    echo 'Try again)' . PHP_EOL;
    $balance = (float)readline('Enter money: ');
}
if ($balance <= 0) {
    echo 'Enter valid amount' . PHP_EOL;
    $balance = (float)readline('Enter money: ');
} else {
    $wallet -= $balance;
    echo "Your balance: $balance " . PHP_EOL;
}




$choice = (float)readline('Press 1 to play or 2 to quit: ');


while ($balance > 0) {
    if ($choice == 2) {
        $wallet += $balance;
        exit('Goodbye! Your wallet balance after game '.$wallet.'EUR'. PHP_EOL);
    }
    $bet = (float)readline('Enter your bet: ');
    if ($bet <= 0 || $balance-$bet<0) {
        echo 'Choose valid bet' . PHP_EOL;
        $bet = (float)readline('Enter your bet: ');
    }

    if ($choice == 1) {
        $board = [];
        for ($i = 0; $i < $rowCount; $i++) {
            for ($j = 0; $j < $columnCount; $j++) {
                $symbol = array_rand($symbols);
                $board[] = $symbol;
            }
        }
    }

    display_board($board);

    if($board[0]==$board[1]&&$board[1]==$board[2]){
        echo 'You got 3 in row!   payout = '.$payout[3]*$bet.PHP_EOL;
        $balance+=$payout[3]*$bet;
    }
    elseif($board[0]==$board[1]&&$board[1]==$board[2]&&$board[2]==$board[3]){
        echo 'You got 4 in row!   payout = '.$payout[4]*$bet.PHP_EOL;
        $balance+=$payout[4]*$bet;
    }
    elseif($board[0]==$board[1]&&$board[1]==$board[2]&&$board[2]==$board[3]&&$board[3]==$board[4]){
        echo 'You got 4 in row!   payout = '.$payout[5]*$bet.PHP_EOL;
        $balance+=$payout[5]*$bet;
    }
    if($board[0]==$board[6]&&$board[6]==$board[12]){
        echo 'You got 3 in row!   payout = '.$payout[3]*$bet.PHP_EOL;
        $balance+=$payout[3]*$bet;
    }
    elseif($board[0]==$board[6]&&$board[6]==$board[12]&&$board[12]==$board[8]){
        echo 'You got 4 in row!   payout = '.$payout[4]*$bet.PHP_EOL;
        $balance+=$payout[4]*$bet;
    }
    elseif($board[0]==$board[6]&&$board[6]==$board[12]&&$board[12]==$board[8]&&$board[8]==$board[4]){
        echo 'You got 4 in row!   payout = '.$payout[5]*$bet.PHP_EOL;
        $balance+=$payout[5]*$bet;
    }
    if($board[10]==$board[6]&&$board[6]==$board[2]){
        echo 'You got 3 in row!   payout = '.$payout[3]*$bet.PHP_EOL;
        $balance+=$payout[3]*$bet;
    }
    elseif($board[10]==$board[6]&&$board[6]==$board[2]&&$board[2]==$board[8]){
        echo 'You got 4 in row!   payout = '.$payout[4]*$bet.PHP_EOL;
        $balance+=$payout[4]*$bet;
    }
    elseif($board[10]==$board[6]&&$board[6]==$board[2]&&$board[2]==$board[8]&&$board[8]==$board[14]){
        echo 'You got 4 in row!   payout = '.$payout[5]*$bet.PHP_EOL;
        $balance+=$payout[5]*$bet;
    }
    if($board[5]==$board[6]&&$board[6]==$board[7]){
        echo 'You got 3 in row!   payout = '.$payout[3]*$bet.PHP_EOL;
        $balance+=$payout[3]*$bet;
    }
    elseif($board[5]==$board[6]&&$board[6]==$board[7]&&$board[7]==$board[8]){
        echo 'You got 4 in row!   payout = '.$payout[4]*$bet.PHP_EOL;
        $balance+=$payout[4]*$bet;
    }
    elseif($board[5]==$board[6]&&$board[6]==$board[7]&&$board[7]==$board[8]&&$board[8]==$board[9]){
        echo 'You got 4 in row!   payout = '.$payout[5]*$bet.PHP_EOL;
        $balance+=$payout[5]*$bet;
    }
    if($board[10]==$board[11]&&$board[11]==$board[12]){
        echo 'You got 3 in row!   payout = '.$payout[3]*$bet.PHP_EOL;
        $balance+=$payout[3]*$bet;
    }
    elseif($board[10]==$board[11]&&$board[11]==$board[12]&&$board[12]==$board[13]){
        echo 'You got 4 in row!   payout = '.$payout[4]*$bet.PHP_EOL;
        $balance+=$payout[4]*$bet;
    }
    elseif($board[10]==$board[11]&&$board[11]==$board[12]&&$board[12]==$board[13]&&$board[13]==$board[14]){
        echo 'You got 4 in row!   payout = '.$payout[5]*$bet.PHP_EOL;
        $balance+=$payout[5]*$bet;
    }
    else
    {
    $balance-=$bet;
    }

    echo "Credits: $balance \n";
    $choice = (float)readline('Press 1 to play or 2 to quit: ');
}

echo 'Goodbye! Your wallet balance after game '.$wallet.'EUR'. PHP_EOL;