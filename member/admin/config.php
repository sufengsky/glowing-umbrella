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
needauth( 51 );
$step = $_REQUEST['step'];
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n\r\n</head>\r\n\r\n<body>\r\n\r\n\r\n";
if ( $step == "modify" )
{
				$var = $_POST['var'];
				do
				{
								$val = each( &$var )[1];
								$key = each( &$var )[0];
								if ( each( &$var ) )
								{
												$msql->query( "update {P}_member_config set value='{$val}' where variable='{$key}'" );
								}
				} while ( 1 );
				sayok( $strConfigOk, "config.php", "" );
}
echo "<div class=\"formzone\">\r\n<form name=\"form1\" method=\"post\" action=\"config.php\">\r\n<div class=\"namezone\">\r\n";
echo $strNewsSet;
echo "</div>\r\n\r\n<div class=\"tablezone\">\r\n          <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"8\" cellspacing=\"0\">\r\n            <tr> \r\n              <td class=\"innerbiaoti\">";
echo "<s";
echo "trong>";
echo $strConfigName;
echo "</strong></td>\r\n              <td class=\"innerbiaoti\"  width=\"300\" height=\"28\">";
echo "<s";
echo "trong>";
echo $strConfigSet;
echo "</strong></td>\r\n            </tr>\r\n           \r\n            ";
$msql->query( "select * from {P}_member_config  order by xuhao" );
while ( $msql->next_record( ) )
{
				$variable = $msql->f( "variable" );
				$value = $msql->f( "value" );
				$vname = $msql->f( "vname" );
				$settype = $msql->f( "settype" );
				$colwidth = $msql->f( "colwidth" );
				$intro = $msql->f( "intro" );
				$intro = str_replace( "\n", "<br>", $intro );
				echo " \r\n            <tr class=\"list\"> \r\n              <td   style=\"line-height:20px;padding-right:30px\"> \r\n                \r\n               ";
				echo "<s";
				echo "trong>";
				echo $vname;
				echo " : </strong><br>\r\n              ";
				echo $intro;
				echo "</td>\r\n              <td   width=\"300\" height=\"20\"> ";
				if ( $settype == "YN" )
				{
								echo " \r\n                <input type=\"radio\" name=\"var[";
								echo $variable;
								echo "]\" value=\"1\" ";
								echo checked( $value, "1" );
								echo ">";
								echo $strYes;
								echo "                <input type=\"radio\" name=\"var[";
								echo $variable;
								echo "]\" value=\"0\" ";
								echo checked( $value, "0" );
								echo ">";
								echo $strNo;
								echo " \r\n";
				}
				else if ( $settype == "MTYPE" )
				{
								echo " \r\n\r\n\t";
								echo "<s";
								echo "elect name=\"var[";
								echo $variable;
								echo "]\" >\r\n\r\n\t";
								$msql->query( "select * from {P}_member_type" );
								while ( $msql->next_record( ) )
								{
												if ( $value == $msql->f( "membertypeid" ) )
												{
																echo "<option value='".$msql->f( "membertypeid" )."' selected>".$msql->f( "membertype" )."</option>";
												}
												else
												{
																echo "<option value='".$msql->f( "membertypeid" )."'>".$msql->f( "membertype" )."</option>";
												}
								}
								echo "</select>\r\n\r\n\r\n";
				}
				else
				{
								echo " \r\n                <input  type=\"text\" name=\"var[";
								echo $variable;
								echo "]\"   value=\"";
								echo $value;
								echo "\" size=\"";
								echo $colwidth;
								echo "\" class=\"input\" />\r\n";
				}
				echo "\r\n\r\n              </td>\r\n            </tr>\r\n            ";
}
echo " \r\n           \r\n    </table>\r\n</div>\r\n<div class=\"adminsubmit\">\r\n  <input name=\"cc2\" type=\"submit\" id=\"cc\" value=\"";
echo $strSubmit;
echo "\" class=\"button\" />\r\n  <input type=\"hidden\" name=\"step\" value=\"modify\" />\r\n</div>\r\n\r\n</form>\r\n</div>\r\n</body>\r\n</html>\r\n";
?>
