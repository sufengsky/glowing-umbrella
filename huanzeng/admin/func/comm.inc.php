<?php

include_once(ROOTPATH."base/language/".$sLan.".php");

HzConfig();

//ģ���������
function HzConfig(){

	global $msql;

	$msql->query("select * from {P}_hz_config");
	while($msql->next_record()){
		$variable=$msql->f('variable');
		$value=$msql->f('value');
		
		$GLOBALS["HZCONF"][$variable]=$value;
	}

}


?>