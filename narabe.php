<?php
class setting{
protected $kaisuu;	//�^�[��
protected $stone;	//�Ղ��\������z��
protected $flag;	//�Q�[���I���t���O

public function __construct() {
	$this->flag =false;
    $this->kaisuu = 1;
    $this->stone = array();
}

//���O�����
function name(){
	echo "\n".'1�l�ڂ̖��O����͂��ĉ������B';
	echo "\n".'���O�F';
	$input_name1 = trim(fgets(STDIN));

	echo "\n".'2�l�ڂ̖��O����͂��ĉ������B';
	echo "\n".'���O�F';
	$input_name2 = trim(fgets(STDIN));

	echo "\n".'���(����):'.$input_name1."\n".'���(����):'.$input_name2;
	echo "\n\n".'�Q�[�����J�n���܂��B'."\n";
	
	$this->f();
}

//�����ݒ�
function f(){
$this->flag =false;
$suu=0;
for($n_x = 0; $n_x <= 7; ++$n_x){
  for($n_y = 0; $n_y <= 7; ++$n_y){
	
	if     ($n_x===3 and $n_y===3){
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
   $this->set();
}

//�Ղɐ΂��Z�b�g����
function set(){
	echo '0 1 2 3 4 5 6 7 '."\n";
	for($a=0; $a <= 63; ++$a){
		switch(true){
	 		case $this->stone[$a]===0:
        	echo '��';
        	break;

     		case $this->stone[$a]===1:
        	echo '��';
        	break;
        	
        	default:
        	echo '��';
   		}
    
    	if((($a+1)%8)===0){
        $b = ($a+1)/8 -1;
        echo ' '.$b."\n";
    	}
    }
    if($this->flag === false){
    	$this->play_game();
   	}
}

//�Q�[��������
function play_game(){
	$p = ($this->kaisuu -1) % 2;
	if($p===0){
		$p_ms = '��';
	}else{
		$p_ms = '��';
	}
	echo "\n".$this->kaisuu.' : '.$p_ms.'�̔Ԃł��B'."\n";
	
    echo "\n".'�c : ';
	$input_x = trim(fgets(STDIN));
	
	echo "\n".'�� : ';
	$input_y = trim(fgets(STDIN));
	
	echo "\n";
	
	$answer = $input_x+($input_y*8);
	
	if($input_x<0 or $input_x>7 or $input_y<0 or $input_y>7 or is_numeric($input_x)===false or is_numeric($input_y)===false){
	echo '0�ȏ�7�ȉ��̐��l����͂��ĉ������B'."\n";
	$this->set();
	
	}else{
		if($this->stone[$answer]!==2){
			echo '�΂̂���Ƃ���ɂ͒u�����Ƃ��o���܂���B'."\n";
			$this->set();
		}else{
			if($this->push($p,$input_x,$input_y)){
				echo '1���ȏ㑊��̐΂𗠕Ԃ���ꏊ�ɑł��Ă��������B'."\n";
				$this->set();
	        }else{
	        	// ���Ԃ��̏�����
		    	$this->turn($input_x,$input_y,$answer);
			}
		}
	}
	}
  
    //�F����
    function turn($x,$y,$ans){
    $player = ($this->kaisuu-1) % 2;

    $this->stone[$ans]=$player;
	$this->re_stone($x,$y,$player);
	}
	
	// ���Ԃ�
	function re_stone($x,$y,$player){
	$this->kaisuu = $this->kaisuu + 1;
    for ($d = -1; $d <= 1; ++$d) {      // �㉺����
        for ($e = -1; $e <= 1; ++$e) {  // ���E����
            if ($d == 0 && $e == 0) continue; 
            $count = $this->re_suu($player, $x, $y, $d, $e);
            for ($i = 1; $i <= $count; $i++) {
            	$n_x = $x+$i*$d;
            	$n_y = $y+$i*$e;
            	$n_s = $n_x+($n_y*8);
            	if($this->re_wall($n_x,$n_y)===true){
                $this->stone[$n_s] = $player; // ���Ԃ�
                }
            }
        }
    }
		$this->r_fin();
	}
	
	// ���Ԃ� ���𐔂���
	function re_suu($player, $x, $y, $d, $e){
	 if($player === 0){
	 	$aite = 1;
	 }else{
		$aite = 0;
	 }
	
	if($this->re_wall($x,$y)===true){
    for($k =1; $this->stone[($x+($k*$d))+(($y+($k*$e))*8)] === $aite; ++$k) {
    };
    
    if ($this->stone[($x+($k*$d))+(($y+($k*$e))*8)] === $player) {                             
        return $k-1;
    } else {
        return 0;
    }
    }
   	}
		
	// ���Ԃ� �ǔ���
	function re_wall($x,$y){
	$wall = false;
		if($x >= 0 and $x < 8 and $y >= 0 and $y < 8){
		$wall = true;
		}
	return $wall;
	}
	
	//�΂�ł��ėǂ����̔���
	function push($player, $x, $y){
      for ($d = -1; $d <= 1; ++$d){
        for ($e = -1; $e <= 1; ++$e) {
        	if($d===0 and $e===0){	continue;}
    		if ($this->re_suu($player, $x, $y, $d, $e)!==0){
    		return false;
    		}
    	}
      }
    return true;
	}
	
	//�I������
	function r_fin(){
	if($this->kaisuu===61){
	$this->flag =true;
	echo '---�I��---'."\n";
	
	$black_j =0;
	$white_j =0;
	
	for($i=0; $i <= 63; ++$i){
	if($this->stone[$i]===0){
        ++$black_j;
    }
    if($this->stone[$i]===1){
        ++$white_j;
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
	echo "\n".$judge.''."\n\n";
	$this->set();
    
    }else{
    $this->set();
	}
	}
}

$next = new setting;
$next->name();
?>
