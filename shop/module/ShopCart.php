<?php

/*
	[�������] ���ﳵ
*/

function ShopCart(){

	global $fsql,$msql;

		
		$tempname=$GLOBALS["PLUSVARS"]["tempname"];
		
		//ģ�����
		$Temp=LoadTemp($tempname);
		$TempArr=SplitTblTemp($Temp);

		$str=$TempArr["start"];

		
		//�жϻ��ֹ���
		$centopen=$GLOBALS["SHOPCONF"]["CentOpen"];

		if($centopen=="1" && isLogin()){
			$showcent="";
		}else{
			$showcent=" style='display:none' ";
		}
		


		//���ﳵ��ʼ
		$var=array('showcent'=>$showcent);
		$str.=ShowTplTemp($TempArr["m0"],$var);

		$CARTSTR=$_COOKIE["SHOPCART"];

		$array=explode('#',$CARTSTR);
		$tnums=sizeof($array)-1;
		$tjine=0;
		$kk=0;
		
		for($t=0;$t<$tnums;$t++){
				$fff=explode('|',$array[$t]);
				$gid=$fff[0];
				$acc=$fff[1];

				$fsql->query("select * from {P}_shop_con where id='$gid'");
				if($fsql->next_record()){
					$bn=$fsql->f('bn');
					$title=$fsql->f('title');
					$danwei=$fsql->f('danwei');
					$price=$fsql->f('price');
					$cent=$fsql->f('cent');
					
					$price=getMemberPrice($gid,$price);
					$showprice=number_format($price,2,'.','');
					$jine=$price*$acc;
					$jine=number_format($jine,2,'.','');

					//�������
					$cent=accountCent($cent,$price)*$acc;
					
					$goodsurl=ROOTPATH."shop/html/?".$gid.".html";
				
					$var=array (
					'gid' => $gid,
					'goodsurl' => $goodsurl,
					'jine' => $jine, 
					'price' => $showprice,
					'acc' => $acc,
					'fz' => '',
					'goodsname' => $title,
					'danwei' => $danwei,
					'bn' => $bn,
					'showcent'=>$showcent,
					'cent'=>$cent
					);
						
					$str.=ShowTplTemp($TempArr["list"],$var);
					
					
				}
			$tjine=$tjine+$jine;
			$tcent=$tcent+$cent;
			$kk++;
		}
		$tjine=number_format($tjine,2,'.','');
		
		$var=array('tjine' => $tjine,'showcent'=>$showcent,'tcent'=>$tcent);
		$str.=ShowTplTemp($TempArr["m1"],$var);
		

		if($kk>0){
			$str.=$TempArr["m2"];
		}else{
			$str.=$TempArr["m3"];
		}
		
		$str.=$TempArr["end"];


		return $str;

}

?>