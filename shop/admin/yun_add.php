<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );
needauth( 311 );
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/base.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/form.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../../base/js/blockui.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"js/yun.js\"></script>\r\n\r\n</head>\r\n\r\n<body >\r\n";
$step = $_REQUEST['step'];
$yunname = $_REQUEST['yunname'];
$zonestr = $_REQUEST['zonestr'];
$spec = $_REQUEST['spec'];
$dinge = $_REQUEST['dinge'];
$yunfei = $_REQUEST['yunfei'];
$baojia = $_REQUEST['baojia'];
$baofei = $_REQUEST['baofei'];
$baodi = $_REQUEST['baodi'];
$memo = $_REQUEST['memo'];
$sgs = $_REQUEST['sgs'];
if ( $step == "new" )
{
				$a1 = $_REQUEST['a1'];
				$b1 = $_REQUEST['b1'];
				$b2 = $_REQUEST['b2'];
				$c1 = $_REQUEST['c1'];
				$c2 = $_REQUEST['c2'];
				$c3 = $_REQUEST['c3'];
				$c4 = $_REQUEST['c4'];
				$d1 = $_REQUEST['d1'];
				$d2 = $_REQUEST['d2'];
				$d3 = $_REQUEST['d3'];
				$d4 = $_REQUEST['d4'];
				$e1 = $_REQUEST['e1'];
				$e2 = $_REQUEST['e2'];
				$f1 = $_REQUEST['f1'];
				$f2 = $_REQUEST['f2'];
				$gs = $a1."|".$b1."|".$b2."|".$c1."|".$c2."|".$c3."|".$c4."|".$d1."|".$d2."|".$d3."|".$d4."|".$e1."|".$e2."|".$f1."|".$f2;
				$m1 = $_REQUEST['m1'];
				$m2 = $_REQUEST['m2'];
				$m3 = $_REQUEST['m3'];
				$n1 = $_REQUEST['n1'];
				$n2 = $_REQUEST['n2'];
				$n3 = $_REQUEST['n3'];
				$p1 = $_REQUEST['p1'];
				$p2 = $_REQUEST['p2'];
				$p3 = $_REQUEST['p3'];
				$dgs = $m1."|".$m2."|".$m3."|".$n1."|".$n2."|".$n3."|".$p1."|".$p2."|".$p3;
				$msql->query( "select max(xuhao) from {P}_shop_yun" );
				if ( $msql->next_record( ) )
				{
								$maxxuhao = $msql->f( "max(xuhao)" );
				}
				$nowxuhao = $maxxuhao + 1;
				$msql->query( "insert into {P}_shop_yun set\r\n \tyunname='{$yunname}',\r\n \tspec='{$spec}',\r\n  \tdinge='{$dinge}',\r\n   \tyunfei='{$yunfei}',\r\n \tgs='{$gs}',\r\n \tdgs='{$dgs}',\r\n  \tsgs='{$sgs}',\r\n \tbaojia='{$baojia}',\r\n  \tbaofei='{$baofei}',\r\n   \tbaodi='{$baodi}',\r\n \tzonestr='{$zonestr}',\r\n \tmemo='{$memo}',\r\n\txuhao='{$nowxuhao}'\r\n\r\n\t" );
				echo "<script>window.location='yun_method.php'</script>";
				exit( );
}
echo " \r\n<div class=\"formzone\">\r\n\r\n<div class=\"namezone\">\r\n";
echo $strYunMethodAdd;
echo "</div>\r\n<div class=\"tablezone\">\r\n\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n   <form action=\"yun_add.php\" method=\"post\" enctype=\"multipart/form-data\">\r\n    \r\n      <tr>\r\n       <td width=\"75\" align=\"center\">";
echo $strYunMethod;
echo "</td>\r\n       <td><input name=\"yunname\" type=\"text\"  class=\"input\" id=\"yunname\" style=\"width:220px\"> \r\n       &nbsp; ";
echo $strYunSpec1;
echo "</td>\r\n     </tr>\r\n\t <tr>\r\n       <td width=\"75\" align=\"center\">";
echo $strYunSpec;
echo "</td>\r\n       <td><input name=\"spec\" type=\"text\"  class=\"input\" id=\"spec\" style=\"width:220px\" /> \r\n       &nbsp; ";
echo $strYunSpec2;
echo "</td>\r\n     </tr>\r\n\t <tr>\r\n       <td align=\"center\">";
echo $strYunMethodZone;
echo "</td>\r\n       <td><textarea name=\"showzonestr\" style=\"width:220px\" rows=\"5\" class=\"textarea\" id=\"showzonestr\" readonly></textarea>\r\n\t   <input type=\"button\" id=\"showzonebutton\" class=\"button\" value=\"";
echo $strYunSelZones;
echo "\" />\r\n\t   </td>\r\n     </tr>\r\n     <tr>\r\n       <td width=\"75\" align=\"center\">";
echo $strYunGs;
echo "</td>\r\n       <td><input type=\"radio\" name=\"dinge\" class=\"seldinge\" value=\"1\" checked />\r\n           ";
echo $strYunGs1;
echo "         \r\n\t\t   <input name=\"dinge\" type=\"radio\" class=\"seldinge\" value=\"0\" />\r\n           ";
echo $strYunGs2;
echo "           <input type=\"radio\" name=\"dinge\" class=\"seldinge\" value=\"2\" />\r\n           ";
echo $strYunGs3;
echo " \r\n\t\t   </td>\r\n     </tr>\r\n     <tr id='tryunfei' >\r\n       <td width=\"75\" align=\"center\">";
echo $strYunfei;
echo "</td>\r\n       <td><input name=\"yunfei\" type=\"text\"  class=input id=\"yunfei\" value=\"0\" size=\"10\"> </td>\r\n     </tr>\r\n     <tr  id='trgs' style=\"display:none\">\r\n       <td width=\"75\" align=\"center\">&nbsp;</td>\r\n       <td><table width=\"100%\"  border=\"0\" cellspacing=\"1\" cellpadding=\"3\">\r\n         <tr>\r\n           <td>";
echo $strYunC1;
echo "             <input name=\"a1\" type=\"text\"  class=input id=\"a1\" value=\"";
echo $a1;
echo "\" size=\"10\">\r\n      ";
echo $strYunC2;
echo "</td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC3;
echo "             <input name=\"b1\" type=\"text\"  class=input id=\"b1\" value=\"";
echo $b1;
echo "\" size=\"10\">\r\n      ";
echo $strZlDanwei;
echo $strYunC4;
echo ", ";
echo $strYunC7;
echo "      <input name=\"b2\" type=\"text\"  class=input id=\"b2\" value=\"";
echo $b2;
echo "\" size=\"10\">\r\n        ";
echo $strHbDanwei;
echo "</td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC3;
echo "             <input name=\"c1\" type=\"text\"  class=input id=\"c1\" value=\"";
echo $c1;
echo "\" size=\"10\">\r\n      ";
echo $strZlDanwei;
echo $strYunC4;
echo ", ";
echo $strYunC8;
echo "      <input name=\"c2\" type=\"text\"  class=input id=\"c2\" value=\"";
echo $c2;
echo "\" size=\"10\">\r\n       ";
echo $strZlDanwei;
echo "       <input name=\"c3\" type=\"text\"  class=input id=\"c3\" value=\"";
echo $c3;
echo "\" size=\"10\">\r\n      ";
echo $strHbDanwei;
echo "      <input name=\"c4\" type=\"hidden\" id=\"c4\" value=\"1\"></td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC3;
echo "             <input name=\"d1\" type=\"text\"  class=input id=\"d1\" value=\"";
echo $d1;
echo "\" size=\"10\">\r\n      ";
echo $strZlDanwei;
echo $strYunC5;
echo ", ";
echo $strYunC8;
echo "      <input name=\"d2\" type=\"text\"  class=input id=\"d2\" value=\"";
echo $d2;
echo "\" size=\"10\">\r\n      ";
echo $strZlDanwei;
echo "      <input name=\"d3\" type=\"text\"  class=input id=\"d3\" value=\"";
echo $d3;
echo "\" size=\"10\">\r\n      ";
echo $strHbDanwei;
echo "      <input name=\"d4\" type=\"hidden\" id=\"d4\" value=\"1\"></td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC6;
echo "             <input name=\"e1\" type=\"text\"  class=input id=\"e1\" value=\"";
echo $e1;
echo "\" size=\"10\">\r\n             ";
echo $strHbDanwei;
echo $strYunC5;
echo ", ";
echo $strYunC9;
echo "             <input name=\"e2\" type=\"text\"  class=input id=\"e2\" value=\"";
echo $e2;
echo "\" size=\"10\">\r\n      % </td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC6;
echo "             <input name=\"f1\" type=\"text\"  class=input id=\"f1\" value=\"";
echo $f1;
echo "\" size=\"10\">\r\n             ";
echo $strHbDanwei;
echo $strYunC5;
echo ", ";
echo $strYunC9;
echo "             <input name=\"f2\" type=\"text\"  class=input id=\"f2\" value=\"";
echo $f2;
echo "\" size=\"10\">\r\n      %</td>\r\n         </tr>\r\n       </table></td>\r\n     </tr>\r\n     <tr  id='trdd' style=\"display:none\">\r\n       <td align=\"center\">&nbsp;</td>\r\n       <td><table width=\"100%\"  border=\"0\" cellspacing=\"1\" cellpadding=\"3\">\r\n         <tr>\r\n           <td>";
echo $strYunC6;
echo "             <input name=\"m1\" type=\"text\"  class=input id=\"m1\" value=\"";
echo $m1;
echo "\" size=\"10\"> \r\n             ";
echo $strHbDanwei;
echo $strYunC4;
echo " &nbsp; &nbsp; \r\n      \t\t <input name=\"m2\" type=\"text\"  class=input id=\"m2\" value=\"";
echo $m2;
echo "\" size=\"5\"> \r\n      \t\t ";
echo $strHbDanwei;
echo ",";
echo $strYunC10;
echo "      \t\t <input name=\"m3\" type=\"text\"  class=input id=\"m3\" value=\"";
echo $m3;
echo "\" size=\"2\">\r\n      \t\t % </td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC6;
echo "             <input name=\"n1\" type=\"text\"  class=input id=\"n1\" value=\"";
echo $n1;
echo "\" size=\"10\">\r\n             ";
echo $strHbDanwei;
echo $strYunC5;
echo " &nbsp; &nbsp; \r\n<input name=\"n2\" type=\"text\"  class=input id=\"n2\" value=\"";
echo $n2;
echo "\" size=\"5\">\r\n";
echo $strHbDanwei;
echo ",";
echo $strYunC10;
echo " \r\n<input name=\"n3\" type=\"text\"  class=input id=\"n3\" value=\"";
echo $n3;
echo "\" size=\"2\">\r\n% </td>\r\n         </tr>\r\n         <tr>\r\n           <td>";
echo $strYunC6;
echo "             <input name=\"p1\" type=\"text\"  class=input id=\"p1\" value=\"";
echo $p1;
echo "\" size=\"10\" />\r\n             ";
echo $strHbDanwei;
echo $strYunC5;
echo " &nbsp; &nbsp; \r\n<input name=\"p2\" type=\"text\"  class=input id=\"p2\" value=\"";
echo $p2;
echo "\" size=\"5\" />\r\n";
echo $strHbDanwei;
echo ",";
echo $strYunC10;
echo " \r\n<input name=\"p3\" type=\"text\"  class=input id=\"p3\" value=\"";
echo $p3;
echo "\" size=\"2\" />\r\n% </td>\r\n         </tr>\r\n       </table></td>\r\n     </tr>\r\n     \r\n     <tr>\r\n       <td width=\"75\" align=\"center\">";
echo $strYunBaojia;
echo "</td>\r\n       <td><input type=\"radio\" name=\"baojia\" class=\"selbaojia\" value=\"1\" />\r\n           ";
echo $strYes;
echo "           <input name=\"baojia\" type=\"radio\" class=\"selbaojia\"  value=\"0\" checked  />\r\n           ";
echo $strNo;
echo " </td>\r\n     </tr>\r\n     <tr>\r\n       <td align=\"center\">&nbsp;</td>\r\n       <td>";
echo $strYunNTC3;
echo "</td>\r\n     </tr>\r\n     <tr id='trbaofei' style=\"display:none\">\r\n       <td width=\"75\" align=\"center\">";
echo $strYunBaofei;
echo "</td>\r\n       <td><input name=\"baofei\" type=\"text\"  class=input id=\"baofei\" value=\"0\" size=\"10\"> \r\n       %\r\n         ";
echo $strYunC11;
echo "         <input name=\"baodi\" type=\"text\"  class=input id=\"baodi\" value=\"1\" size=\"10\">\r\n       ";
echo $strHbDanwei;
echo "</td>\r\n     </tr>\r\n     \r\n     <tr>\r\n       <td width=\"75\" align=\"center\">";
echo $strYunIntro;
echo "</td>\r\n       <td><textarea name=\"memo\" cols=\"60\" rows=\"5\" class=\"input1\" id=\"memo\"></textarea></td>\r\n     </tr>\r\n    <tr> \r\n      <td width=\"75\" align=\"center\">&nbsp;</td>\r\n      <td height=\"36\"> \r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strYunMethodAdd;
echo "\" class=\"button\">\r\n        <input type=\"hidden\" name=\"step\" value=\"new\">\r\n        <input name=\"zonestr\" type=\"hidden\" id=\"zonestr\" /></td>\r\n    </tr></form>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n</body>\r\n</html>\r\n";
?>