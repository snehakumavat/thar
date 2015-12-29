<?php
error_reporting(0);
include("session.php");

	include("include/database.php");
	$c_up=$_REQUEST['c_id2'];
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
<?php
	
	if(isset($_REQUEST['c_up']))
	{	
	$c=$_REQUEST['c_id2'];
	
	$c_t1=$_POST['c_cmp'];
	$txt=$_POST['txt'];
	$c_t2=$_POST['c_addr1'];
    $c_t3=$_POST['c_addr2'];		 
	$c_t5=$_POST['c_per'];
	$c_t6=$_POST['c_iec'];
	$c_t7=$_POST['c_ph'];
	$c_t8=$_POST['c_mo'];
	$c_t9=$_POST['c_email1'];
	$c_t10=$_POST['c_email2'];
	$c_t11=$_POST['bnk'];	
	$c_t12=$_POST['tin'];	
	$c_t13=$_POST['cin'];	
	$c_t14=$_POST['ecc'];			
	$note=$_POST['note'];	
		$qry_up="update clients SET  comp_name='".$c_t1."',cmp_txt='".$txt."', c_add1='".$c_t2."',c_add2='".$c_t3."',c_per='".$c_t5."', c_iec='".$c_t6."', c_ph='".$c_t7."', c_mo='".$c_t8."',c_email1='".$c_t9."',c_email2='".$c_t10."', c_bnk_dtl='".$c_t11."', c_tin='".$c_t12."', c_cin='".$c_t13."', c_ecc='".$c_t14."',c_special_note='".$note."' where c_id=".$c;
		
		 
		$res_up=mysql_query($qry_up);
		if($res_up)
		{
			header("location:clients.php");
		}
		else
		{
			echo "error";
		}
	}

?>
<html>
<head>
<title>Rajesh Electic Works</title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body>
<div id="container">
<div id="sub-header">	
    <?php
	include("header.php");
	?><br />
		<div class="quotation"><center>Update Client Details</center></div>
        <div>
        <form action="" method="post">
        <table class="q_clients">
                <tr><td class="l_form">client Code:</td><td><input class="q_in" type="text" name="" value="<?php echo $c_row['c_unq_code']; ?>" readonly=""/></td></tr> 
                <tr><td class="l_form">Company Name:</td><td><input class="q_in" type="text" name="c_cmp" value="<?php echo $c_row[comp_name];?>"tabindex="1 " /></td></tr>
				<tr><td class="l_form">Company Abbr:</td><td><input class="q_in" type="text" name="txt" value="<?php echo $c_row[cmp_txt]; ?>"tabindex="2 " /></td></tr>
                <tr><td class="l_form">Address1:</td><td><textarea  class="q_add" name="c_addr1" tabindex=" 3"><?php echo $c_row[c_add1]; ?></textarea></td></tr>
                <tr><td class="l_form">Address2:</td><td><textarea class="q_add" name="c_addr2" tabindex="4" ><?php echo $c_row[c_add2]; ?> </textarea></td></tr>
                <tr><td class="l_form">Contact Person:</td><td><input class="q_in" type="text" name="c_per" value="<?php echo $c_row[c_per]; ?>"tabindex="5 " /></td></tr>
                <tr><td class="l_form">IEC:</td><td><input class="q_in" type="text" name="c_iec" value="<?php echo $c_row[c_iec]; ?>" tabindex="6 " /></td></tr>
                <tr><td class="l_form">Email Id1:</td><td><input class="q_in" type="text" name="c_email1" value="<?php echo $c_row[c_email1]; ?>"tabindex="7 " /></td></tr>
				<tr><td class="l_form">Email Id2:</td><td><input class="q_in" type="text" name="c_email2" value="<?php echo $c_row[c_email2]; ?>"tabindex="8 " /></td></tr>
                </table>
                <table class="q_clients2">
                
           <tr><td class="l_form">Phone No:</td><td><input class="q_in" type="text" name="c_ph" value="<?php echo $c_row[c_ph]; ?>"tabindex="9 " /></td></tr>
          <tr><td class="l_form">Mobile No:</td><td><input class="q_in" type="text" name="c_mo" value="<?php if(!empty($c_row['c_mo'])) echo $c_row[c_mo]; ?>" tabindex="10 " /></td></tr>
	 <tr><td class="l_form">Bank Details:</td><td><textarea id="bnk" class="q_add" name="bnk" tabindex="11"> <?php echo $c_row[c_bnk_dtl] ;?>      </textarea></td></tr>

               <tr><td class="l_form">Tin No:</td><td><input id="tin" class="q_in" type="text" name="tin" value="<?php echo $c_row[c_tin]; ?>"tabindex="12 " /></td></tr>
				<tr><td class="l_form">CIN:</td><td><input id="cin" class="q_in" type="text" value="<?php echo $c_row['c_cin']; ?>" name="cin"tabindex="13 " /></td></tr>
		    <tr><td class="l_form">ECC No:</td><td><input id="ecc" class="q_in" type="text" value="<?php echo $c_row['c_ecc']; ?>" name="ecc"tabindex="14 " /></td></tr>
 <tr><td class="l_form">Special Note:</td><td><textarea id="note" class="q_add" name="note" tabindex="15"><?php echo $c_row['c_special_note']; ?></textarea></td></tr>
                              
               
                </table>
        <div class="addclients_b">
         <input name="c_up" class="formbutton" value=" Update " type="submit"  tabindex="16" />
         <input name="can" class="formbutton" value="Cancel" type="submit" tabindex="17" />
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
