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
include( ROOTPATH."includes/pages.inc.php" );
include( "language/".$sLan.".php" );
include( "func/member.inc.php" );
needauth( 70 );
$showmembertypeid = $_REQUEST['showmembertypeid'];
$showcent = $_REQUEST['showcent'];
$tp = $_REQUEST['tp'];
$fromM = $_REQUEST['fromM'];
$fromY = $_REQUEST['fromY'];
$fromD = $_REQUEST['fromD'];
$ToM = $_REQUEST['ToM'];
$ToY = $_REQUEST['ToY'];
$ToD = $_REQUEST['ToD'];
if ( !isset( $showcent ) || $showcent == "" )
{
				$showcent = "cent1";
}
$nowcentname = "centname".substr( $showcent, 4, 1 );
$msql->query( "select * from {P}_member_centset" );
if ( $msql->next_record( ) )
{
				$centname1 = $msql->f( "centname1" );
				$centname2 = $msql->f( "centname2" );
				$centname3 = $msql->f( "centname3" );
				$centname4 = $msql->f( "centname4" );
				$centname5 = $msql->f( "centname5" );
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n\r\n<body >\r\n\r\n<div class=\"searchzone\">\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" align=\"center\" height=\"29\">\r\n  <tr>\r\n    <form method=\"get\" action=\"member_ph_cent.php\">\r\n      <td colspan=\"2\">";
echo daylist( "fromY", "fromM", "fromD", $fromY, $fromM, $fromD );
echo " - ";
echo daylist( "toY", "toM", "toD", $toY, $toM, $toD );
echo "       \r\n        ";
echo "<s";
echo "elect name=\"showmembertypeid\" >\r\n          <option value='0'>";
echo $strMemberTypeSel;
echo "</option>\r\n          ";
$fsql->query( "select * from {P}_member_type  order by membertypeid" );
while ( $fsql->next_record( ) )
{
				$lmembertypeid = $fsql->f( "membertypeid" );
				$lmembertype = $fsql->f( "membertype" );
				if ( $showmembertypeid == $lmembertypeid )
				{
								echo "<option value='".$lmembertypeid."' selected>".$lmembertype."</option>";
				}
				else
				{
								echo "<option value='".$lmembertypeid."'>".$lmembertype."</option>";
				}
}
echo "        </select>\r\n        ";
echo "<s";
echo "elect name=\"showcent\" >\r\n          <option value='cent1' ";
echo seld( $showcent, "cent1" );
echo ">";
echo $centname1;
echo "</option>\r\n\t\t  <option value='cent2' ";
echo seld( $showcent, "cent2" );
echo ">";
echo $centname2;
echo "</option>\r\n\t\t  <option value='cent3' ";
echo seld( $showcent, "cent3" );
echo ">";
echo $centname3;
echo "</option>\r\n\t\t  <option value='cent4' ";
echo seld( $showcent, "cent4" );
echo ">";
echo $centname4;
echo "</option>\r\n\t\t  <option value='cent5' ";
echo seld( $showcent, "cent5" );
echo ">";
echo $centname5;
echo "</option>\r\n         \r\n        </select>\r\n        <input type=\"submit\" name=\"Submit\" value=\"";
echo $strSearchTitle;
echo "\" class=button>\r\n        \r\n          <input type=\"hidden\" name=\"tp\" value=\"search\">\r\n        \r\n      </td> </form>\r\n  </tr>\r\n</table>\r\n\r\n</div>\r\n\r\n";
if ( $tp == "search" )
{
				trylimit( "_member", 200, "memberid" );
}
echo "<div class=\"listzone\">\r\n\r\n";
if ( $fromM == "" || $toM == "" )
{
				$fromY = date( "Y", time( ) );
				$fromM = date( "n", time( ) );
				$fromD = date( "j", time( ) );
				$toY = date( "Y", time( ) );
				$toM = date( "n", time( ) );
				$toD = date( "j", time( ) );
}
$fromtime = mktime( 0, 0, 0, $fromM, $fromD, $fromY );
$totime = mktime( 23, 59, 59, $toM, $toD, $toY );
$scl = " id!='0' ";
$scl .= " and dtime>={$fromtime} and dtime<={$totime} ";
$arr = array( );
$msql->query( "select * from {P}_member_centlog where {$scl} order by id desc" );
while ( $msql->next_record( ) )
{
				$memberid = $msql->f( "memberid" );
				$oof = $msql->f( $showcent );
				$arr["m".$memberid]['total'] += $oof;
				$arr["m".$memberid]['mid'] = $memberid;
				$arr["m".$memberid]['paynum'] += 1;
}
rsort( &$arr );
echo "\r\n  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\">\r\n    <tr>\r\n      <td  class=\"biaoti\" width=\"3\">&nbsp;</td>\r\n      <td  class=\"biaoti\" width=\"70\">";
echo "<s";
echo "pan class=\"title\">";
echo $strStatNums;
echo "</span></td> \r\n\t   <td width=\"70\" height=\"28\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberId;
echo "</span></td>\r\n      <td width=\"80\" height=\"28\"  class=\"biaoti\">";
echo $strMemberUser;
echo "</td>\r\n\t   <td width=\"80\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberType;
echo "</span></td>\r\n      <td  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberFrom23;
echo "</span></td>\r\n      <td width=\"70\"  class=\"biaoti\">";
echo "<s";
echo "pan class=\"title\">";
echo $$nowcentname;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"55\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberPaynums;
echo "</span></td>\r\n      <td  class=\"biaoti\" width=\"50\">";
echo "<s";
echo "pan class=\"title\">";
echo $strMemberDetail;
echo "</span></td>\r\n    </tr>\r\n\r\n";
$ph = 0;
$i = 0;
for ( ;	$i < sizeof( $arr );	$i++	)
{
				$memberid = $arr[$i]['mid'];
				$paynums = $arr[$i]['paynum'];
				$total = $arr[$i]['total'];
				$fsql->query( "select * from {P}_member where memberid='{$memberid}'" );
				if ( $fsql->next_record( ) )
				{
								$mymembergroupid = $fsql->f( "membergroupid" );
								$membertypeid = $fsql->f( "membertypeid" );
								$user = $fsql->f( "user" );
								$name = $fsql->f( "name" );
								$salesname = $fsql->f( "salesname" );
								$company = $fsql->f( "company" );
				}
				switch ( $mymembergroupid )
				{
								case "2" :
												$showmyname = $company;
												break;
								default :
												$showmyname = $name;
												break;
				}
				if ( $showmembertypeid == "0" || $showmembertypeid == "" || $showmembertypeid == $membertypeid )
				{
								$ph++;
								if ( 300 < $ph )
								{
												break;
								}
								echo " <tr class=\"list\">\r\n  <td width=\"3\">&nbsp;</td>\r\n  <td width=\"70\">";
								echo $ph;
								echo "</td> \r\n         <td width=\"70\"   height=\"26\">";
								echo $memberid;
								echo "</td>\r\n\t\t <td width=\"80\"  > ";
								echo $user;
								echo " </td>\r\n        <td width=\"80\">";
								echo membertypeid2membertype( $membertypeid );
								echo "</td>\r\n        <td>";
								echo $showmyname;
								echo "</td>\r\n        <td width=\"70\">";
								echo $total;
								echo "</td>\r\n        <td width=\"55\">";
								echo $paynums;
								echo "</td>\r\n        <td width=\"50\"><a href=\"member_centlog.php?memberid=";
								echo $memberid;
								echo "\"><img src=\"images/look.png\"  border=\"0\" /></a></td>\r\n</tr>\r\n\r\n    ";
				}
}
echo " \r\n  </table>\r\n</div>\r\n<br /><br /><br />\r\n</body>\r\n</html>\r\n";
?>
