<?php require_once('Connections/test.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
/*incident*/
mysql_select_db($database_test, $test);
$query_Recordset1 = "SELECT * FROM incident";
$Recordset1 = mysql_query($query_Recordset1, $test) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
/*incident-category*/
$query_Recordset2 = "SELECT * FROM incident_category";
$Recordset2 = mysql_query($query_Recordset2, $test) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
/*category*/
$query_Recordset3 = "SELECT * FROM category";
$Recordset3 = mysql_query($query_Recordset3, $test) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php 
$sum = 0;
$sum1 = 0;
$sum2 = 0;
?>
 <?php do { ?>
      <?php $sum++;
	  $arr14[] = $row_Recordset1['id']; ?>
      <?php $arr15[] = $row_Recordset1['location_id']; ?>
      <?php $arr16[] = $row_Recordset1['form_id']; ?>
      <?php $arr17[] = $row_Recordset1['locale']; ?>
      <?php $arr18[] = $row_Recordset1['user_id']; ?>
      <?php $arr19[] = $row_Recordset1['incident_title']; ?>
      <?php $arr20[] = $row_Recordset1['incident_description']; ?>
      <?php $arr21[] = $row_Recordset1['incident_date']; ?>
      <?php $arr22[] = $row_Recordset1['incident_mode']; ?>
      <?php $arr23[] = $row_Recordset1['incident_active']; ?>
      <?php $arr24[] = $row_Recordset1['incident_verified']; ?>
      <?php $arr25[] = $row_Recordset1['incident_dateadd']; ?>
      <?php $arr26[] = $row_Recordset1['incident_dateadd_gmt']; ?>
      <?php $arr27[] = $row_Recordset1['incident_datemodify']; ?>
      <?php $arr28[] = $row_Recordset1['incident_alert_status']; ?>
      <?php $arr29[] = $row_Recordset1['incident_zoom']; ?>
  
   
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<?php /*incident-category*/?>
<?php do { ?>
    
      <?php 
	  $sum1++;
	  $arr[] = $row_Recordset2['id']; ?>
      <?php $arr1[] = $row_Recordset2['incident_id']; ?>
      <?php $arr2[] = $row_Recordset2['category_id']; ?>
    
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
    <?php
mysql_free_result($Recordset2);
?>
<?php /*category*/?>
<?php do { ?>
   
      <?php 
	  $sum2++;
	  $arr3[] = $row_Recordset3['id']; ?>
      <?php $arr4[] = $row_Recordset3['parent_id']; ?>
      <?php $arr5[] = $row_Recordset3['locale']; ?>
      <?php $arr6[] = $row_Recordset3['category_position']; ?>
      <?php $arr7[] = $row_Recordset3['category_title']; ?>
      <?php $arr8[] = $row_Recordset3['category_description']; ?>
      <?php $arr9[] = $row_Recordset3['category_color']; ?>
      <?php $arr10[] = $row_Recordset3['category_image']; ?>
      <?php $arr11[] = $row_Recordset3['category_image_thumb']; ?>
      <?php $arr12[] = $row_Recordset3['category_visible']; ?>
      <?php $arr13[] = $row_Recordset3['category_trusted']; ?>
    <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
<?php
mysql_free_result($Recordset3);
?>


<?php 

for ($i=0;$i<$sum;$i++)
{
	if (stristr(strtolower($arr20[$i]),'trap')||stristr(strtolower($arr20[$i]),'under')|| stristr(strtolower($arr20[$i]),'rubbles'))
	{
		if (stristr($arr19[$i],'trap'))
		{
		for($j=0;$j<$sum1;$j++)
		{
			if($arr14[$i] == $arr1[$j])
			{
				
				if($arr2[$j] == 80)
				{
					
					include('Connections/test1.php');
		
					$sql = 'INSERT INTO `ushaitiverify`.`incident` (`id`, `location_id`, `form_id`, `locale`, `user_id`, `incident_title`, `incident_description`, `incident_date`, `incident_mode`, `incident_active`, `incident_verified`, `incident_dateadd`, `incident_dateadd_gmt`, `incident_datemodify`, `incident_alert_status`, `incident_zoom`) VALUES ("' . $arr14[$i]   . '" , "' . $arr15[$i] . '", "1", "en_US", NULL, "' . $arr19[$i] . '", "' . $arr20[$i] . '", "' . $arr21[$i] . '", "1", "1", "1", "' . $arr25[$i] . '", NULL, NULL, "0", NULL)';
					mysql_query($sql);
				}
			}
		}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<iframe frameborder="1" src="http://140.125.45.108/us-haiti-verify/index.php/reports"  width="100%" height="650" scrolling="yes">
<body>
</body>
</html>