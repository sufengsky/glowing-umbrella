<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 </head>

 <body>
  <?php
	  //�½����ݿ�����
	  $db = mysql_connect("localhost","root","sufeng");
	  //ѡ��Ҫ���������ݿ�
	  mysql_select_db("t",$db);
	  //���ò�ѯ���ݿ�ʱʹ�õı��뷽ʽ
	  mysql_query("set names utf8");

	  $sql='SELECT * FROM `db_base_config` LIMIT 0, 1000';
	  $result = mysql_query($sql,$db);
	  echo '<table>';
	  while ($myrow = mysql_fetch_array($result)) {
		echo '<tr>';
		echo'<td>'.$myrow['xuhao'].'</td>'.'<td>'.$myrow['vname'].'</td>';
		echo'</tr>';
	  }
	  echo '</table>';
  ?>
 </body>
</html>
