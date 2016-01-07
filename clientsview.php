<?php
	include("include/database.php");
	error_reporting(0);
include("session.php");
	$c_up=$_REQUEST['c_id3'];
	$c_qry_f="select * from clients where c_id=".$c_up;
	$c_res_f=mysql_query($c_qry_f);
	$c_row=mysql_fetch_array($c_res_f);
?>
<?php
	if(isset($_REQUEST['can']))
	{
		header("location:clients.php");
	}
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
function printdiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
 
     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>

<body>
<div id="container">
<div id="sub-header">	
    <?php
	include("header.php");
	?><br />
		<div class="quotation"><center>Client Details</center></div>
    
        <form action="" method="post">
		    <div id="print_area">
        <table class="q_clients">
                <tr><td class="l_form">Client Id:</td><td class="l_form"><label><?php echo $c_row[1]; ?></label></td></tr>
                <tr><td class="l_form">Company Name:</td><td class="l_form"><label><?php echo $c_row[2]; ?></label></td></tr>
			        <tr><td class="l_form">Company Abbr:</td><td class="l_form"><label><?php echo $c_row[cmp_txt]; ?></label></td></tr>
				<tr><td class="l_form">Contact Person:</td><td class="l_form"><label><?php echo $c_row[c_per]; ?></label></td></tr>
                <tr><td class="l_form" valign="top">Address1:</td><td class="l_form" valign="top" ><label><?php echo $c_row[c_add1]; ?></label></td></tr>
                 <tr><td class="l_form" valign="top">Address2:</td><td valign="top"><label><?php echo $c_row[c_add2]; ?></label></td></tr>
                <tr><td class="l_form">IEC:</td><td class="l_form"><label><?php echo $c_row[c_iec]; ?></label></td></tr>
                <tr><td class="l_form">Email Id1:</td><td class="l_form"><label><?php echo $c_row[c_email1]; ?></label></td></tr>
                
       </table>
       <table class="q_clients2">
				<tr><td class="l_form">Email Id2:</td><td class="l_form"><label><?php echo $c_row[c_email2]; ?></label></td></tr>

                <tr><td class="l_form">Phone No:</td><td class="l_form"><label><?php echo $c_row[c_ph]; ?></label></td></tr>
                <tr><td class="l_form">Mobile No:</td><td class="l_form"><label><?php if(!empty($c_row['c_mo']))echo $c_row[c_mo]; ?></label></td></tr>
                <tr><td class="l_form">Bank Details:</td><td class="l_form" width="250"><label><?php  echo $c_row[c_bnk_dtl];; ?></label></td></tr>
                <tr><td class="l_form">TIN No:</td><td class="l_form"><label><?php echo $c_row[c_tin]; ?></label></td></tr>
                <tr><td class="l_form">CIN No:</td><td class="l_form"><label><?php echo $c_row[c_cin]; ?></label></td></tr>               
                <tr><td class="l_form">ECC No:</td><td class="l_form"><label><?php echo $c_row[c_ecc]; ?></label></td></tr>
				<tr><td class="l_form">Special Note:</td><td class="l_form"><label><?php echo $c_row[c_special_note]; ?></label></td></tr>                 
       </table>
				</div>
        <div class="addclients_b">
       <input type="button" value="Print" class="formbutton" name="print" onClick="printdiv('print_area');" />
         <input name="can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
