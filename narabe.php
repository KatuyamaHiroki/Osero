<!DOCTYPE html>
<header></header>

class setting{
protected $kaisuu;
protected $stone;

public function __construct() {
    $this->kaisuu = 1;
    $this->stone = array();
}

function name(){
echo "\n".'1�l�ڂ̖��O����͂��ĉ������B';
echo "\n".'���O�F';
$input_name1 = trim(fgets(STDIN));

echo "\n".'2�l�ڂ̖��O����͂��ĉ������B';
echo "\n".'���O�F';
$input_name2 = trim(fgets(STDIN));

echo "\n".'1�l��:'.$input_name1."\n".'2�l��:'.$input_name2;
echo "\n".'�ŃQ�[�����J�n���܂��B';
}

function f(){
$suu=0;
for($n_x = 0; $n_x <= 7; ++$n_x){
  for($n_y = 0; $n_y <= 7; ++$n_y){
	if($n_x===3 and $n_y===3){
		$this->stone[$suu]=0;
	
	}elseif($n_x===4 and $n_y===4){
		$this->stone[$suu]=0;
	
	}elseif($n_x===3 and $n_y===4){
		$this->stone[$suu]=1;
		
	}elseif($n_x===4 and $n_y===3){
		$this->stone[$suu]=1;
	
	}else{
		$this->stone[$suu]=2;
	}
	++$suu;
  }
  }
   echo '0�`7�܂ł̐������u�c,���v�̏��ɓ��͂��ĉ������B'."\n";
}

function set(){
echo '0 1 2 3 4 5 6 7 '."\n";
for($a=0; $a <= 63; ++$a){
	switch(true){
	 case $this->stone[$a]===0:
        echo <nobr>��</nobr>;
        break;

     case $this->stone[$a]===1:
        echo <nobr>��</nobr>;
        break;
   
     default:
        echo '��';
   }
    
    if((($a+1)%8)===0){
        $b = ($a+1)/8 -1;
        echo ' '.$b."\n";
    }
   }
   $this->play_game();
   }
   
  function play_game(){
    echo "\n".' : ';
    
    echo "\n".'�c : ';
	$input_x = trim(fgets(STDIN));
	
	echo "\n".'�� : ';
	$input_y = trim(fgets(STDIN));
	echo "\n";
	
	$answer = $input_x+($input_y*8);
	
	if($input_x<0 or $input_x>7 or $input_y<0 or $input_y>7){
	echo '0�ȏ�7�ȉ��̐��l����͂��ĉ������B'."\n";
	$this->set();
	
	}else{
	if($this->stone[$answer]===2){
	$this->kaisuu = $this->kaisuu + 1;
	$this->turn($input_x,$input_y,$answer);
	
	}else{
	echo '�΂̂���Ƃ���ɂ͒u�����Ƃ��o���܂���B'."\n";
	$this->set();
	  }
	}
  }
  
    function turn($x,$y,$ans){
    $player = $this->kaisuu % 2;
    
    if($player===1){
    $this->stone[$ans]=0;
	}else{
	$this->stone[$ans]=1;
	}
	
	// ���Ԃ�

	function void(change){
	for($j=0;$j  8-$ans);++j){
		if(stone[$x-j+($y-8) ]===stone[$ans]){stone[]=$player;} //�E
		if(stone[$x-j+($y-8) ]===stone[$ans]){stone[]=$player;} //�E
		if(stone[$x-j+($y-8) ]===stone[$ans]){stone[]=$player;} //�E
		if(stone[$x-j+($y-8) ]===stone[$ans]){stone[]=$player;} //�E
		}
		
		if(stone[$x+j+($y+8)]===stone[$ans]){stone[]=$player;} //��
		if(stone[$x-($y+j+8)]===stone[$ans]){stone[]=$player;} //��
		if(stone[$x+($y+j+8)]===stone[$ans]){stone[]=$player;} //��
		
		
		if(stone[$x+j+($y+8)]===stone[$ans]){stone[]=$player;} //��
		if(stone[$x-($y+j+8)]===stone[$ans]){stone[]=$player;} //��
		if(stone[$x+($y+j+8)]===stone[$ans]){stone[]=$player;} //��
	}
	
	}
	
	if($this->kaisuu===64){
	echo '---�I��---'."\n";
	
	$black_j =0;
	$white_j =0;
	
	for($i=0; $i <= 3; ++$i){
	switch(true){
	 case $this->stone[$i]===0:
        ++$black_j;
        break;

     case $this->stone[$i]===1:
        ++$white_j;
        break;
   
     default:
        echo '';
   }
   }
   
	if($black_j>$white_j){
	$judge = '���̏����ł��I';
	}elseif($black_j<$white_j){
	$judge = '���̏����ł��I';
	}else{
	$judge = '���������ł��I';
	}

	echo '���F'.$black_j."\n";
	echo '���F'.$white_j."\n";
	echo $judge.''."\n";
	exit();
    }
    
    $this->set();
	
	}
}

$next = new setting;
$next->name();
$next->f();
$next->set();
?>
</html>