<?php

/*
	[�������] ��Ʒ�һ�
*/

function HzStartOrder(){

	global $fsql,$msql;

	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	
	//��ȡ��Ա��ǰʣ�����
	$memberid=$_COOKIE["MEMBERID"];
	$centid=$GLOBALS["HZCONF"]["CentType"];
	$centcol="cent".$centid;
	$fsql->query("select * from {P}_member where memberid='$memberid'");
	if($fsql->next_record()){
		$symcent=$fsql->f($centcol);
	}
		
	//ģ�����
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);

	$str=$TempArr["start"];
	
	if(!isLogin()){
		$str.=$TempArr["err1"];
		return $str;
	}
	
	$str.=$TempArr["m0"];

	//��ȡ���ﳵ��Ϣ
	$CARTSTR=$_COOKIE["HZCART"];

	$array=explode('#',$CARTSTR);
	$tnums=sizeof($array)-1;
	$tjine=0;
	$tweight=0;
	$kk=0;
		
	for($t=0;$t<$tnums;$t++){
		$fff=explode('|',$array[$t]);
		$gid=$fff[0];
		$acc=$fff[1];

		$fsql->query("select * from {P}_hz_con where id='$gid'");
		if($fsql->next_record()){
			$title=$fsql->f('title');
			$danwei=$fsql->f('danwei');
			$price=$fsql->f('price');
			$cent=$fsql->f('cent');
			$weight=$fsql->f('weight');
										
			//�������
			$jcent=$cent*$acc;
					
			$goodsurl=ROOTPATH."huanzeng/html/?".$gid.".html";
				
			$var=array (
				'gid' => $gid,
				'goodsurl' => $goodsurl,
				'jcent' => $jcent, 
				'acc' => $acc,
				'fz' => '',
				'goodsname' => $title,
				'cent'=>$cent
			);
						
			$str.=ShowTplTemp($TempArr["list"],$var);
					
		}
		$tcent=$tcent+$jcent;
		$kk++;
	}
		
	$var=array(
		'tcent'=>$tcent,
		'symcent'=>$symcent
	);
	$str.=ShowTplTemp($TempArr["m1"],$var);
		

	if($kk>0){
		$str.=$TempArr["m2"];
	}else{
		header("location:cart.php");
	}
		
	$str.=$TempArr["end"];

	return $str;

}

?>