<?php

/*
	[�������] �ֲ����(�ɹ�������) 
	[���÷�Χ] ȫվ
*/

function AdvsSingleLb () { 

	global $msql;

	$coltitle=$GLOBALS["PLUSVARS"]["coltitle"];
	$shownums=$GLOBALS["PLUSVARS"]["shownums"];
	$tempname=$GLOBALS["PLUSVARS"]["tempname"];
	$groupid=$GLOBALS["PLUSVARS"]["groupid"];
	$w=$GLOBALS["PLUSVARS"]["w"];
	$h=$GLOBALS["PLUSVARS"]["h"];
	//ģ�����
	$Temp=LoadTemp($tempname);
	$TempArr=SplitTblTemp($Temp);
	
	$piclist="picList=";
	$linklist="linkList=";
	$msql->query("select * from {P}_advs_lb  where groupid='$groupid' order by xuhao limit 0,$shownums");
	while($msql->next_record()){
		$id=$msql->f('id');
		$src=$msql->f('src');
		$url=$msql->f('url');
		if($url=="http://" || $url==""){
		}
		else{
			if(!strchr($url,htmlspecialchars("http://")))
			$url=htmlspecialchars("http://").$url;
			$linklist.=$url.",";
		}
		$src=ROOTPATH.$src;
		$piclist.=$src.",";
	}
	$piclist=substr($piclist,0,-1);
	$linklist=substr($linklist,0,-1);
	$pics=$piclist."&".$linklist;
	$var=array(
		'pics' => $pics,
		'w' => $w,
		'h' => $h
	);

	$str=ShowTplTemp($TempArr["start"],$var);
	return $str;

	
}



?>