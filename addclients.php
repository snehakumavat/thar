<?php
include("include/database.php");
include("session.php");
	if(isset($_REQUEST['c_add']))
	{
	 
	
	$c_t1=$_POST['c_cmp'];
	$txt=$_POST['txt'];
	$c_t2=$_POST['c_addr1'];
    $c_t3=$_POST['c_addr2'];	
	//$c_t4=$_POST['c_city'];
	//$c_t5=$_POST['c_pin'];
	$c_t4=$_POST['c_per'];
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
		
	 $c_qry="insert into clients(comp_name,cmp_txt,c_add1,c_add2,c_per,c_iec,c_ph,c_mo,c_email1,c_email2,c_bnk_dtl,c_tin,c_cin,c_ecc,c_special_note) values('".$c_t1."','".$txt."','".$c_t2."','".$c_t3."','".$c_t4."','".$c_t6."','".$c_t7."','".$c_t8."','".$c_t9."','".$c_t10."','".$c_t11."','".$c_t12."','".$c_t13."','".$c_t14."','".$note."')";
	$c_res=mysql_query($c_qry);
	 $res=mysql_insert_id();
	$digit="LPAD($res,3,'0')";
	 $txt="update clients SET c_unq_code=CONCAT('PET/ZAN/',$digit) where c_id='$res'";
	$res1=mysql_query($txt);
	if($res1)
	{
		header("location:clients.php");
	}
	else
	{
		header("location:addclients.php");
	}
	}
	if(isset($_REQUEST['can']))
	{
		header("location:clients.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" language="javascript">
/*function validateMyForm ( ) { 

    var isValid = true;
    if ( document.form1.cname.value == "" ) 
	{ 
	    alert ( "Please enter Client Name" ); 
	    isValid = false; 
    }
	    else if ( document.form1.compname.value == "") { 
            alert ( "please enter Company Name" ); 
            isValid = false;
		}
		 else if ( document.form1.address1.value == "" ) { 
            alert ( "Please enter Address1" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.city.value == "" ) { 
            alert ( "Please enter City" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.pin.value == "" ) { 
            alert ( "Please enter Pincode" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.email.value == "" ) { 
            alert ( "Please enter Email Address1" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.ph.value == "" ) { 
            alert ( "Please enter Phone Number" ); 
            isValid = false;
    } 
	
		 else if ( document.form1.mo.value == "" ) { 
            alert ( "Please enter Mobile Number" ); 
            isValid = false;
    } 
    return isValid;
}

*/
</script>
</head>

<body>
<div id="container">
<div id="sub-header">	
    <?php
	include("header.php");
	?><br />
		<div class="quotation"><center>Add New Clients</center></div>
        <div > </div>
        <div>
        <form name="form1" action="" method="post">
        <table class="q_clients">
              <tr><td class="l_form">Company Name:</td><td><input id="compname" class="q_in" type="text" name="c_cmp" tabindex="1"/></td></tr>
             <tr><td class="l_form">Short Text:</td><td><input id="txt" class="q_in" type="text" name="txt" tabindex="2" /></td></tr>
			 <tr><td class="l_form">Address1:</td><td><textarea id="address1" class="q_add" name="c_addr1" tabindex="3"></textarea></td></tr>
                <tr><td class="l_form">Address2:</td><td><textarea id="address2" class="q_add" name="c_addr2" tabindex="4"></textarea></td></tr>
		        <!--<tr><td class="l_form">City:</td><td><input id="city" class="q_in" type="text" name="c_city"/></td></tr>				
           <tr><td class="l_form">Pin Code:</td><td><input id="pin" class="q_in" type="text" name="c_pin"/></td></tr>
	            -->
				<tr><td class="l_form">Contact Person:</td><td><input id="person" class="q_in" type="text" name="c_per" tabindex="5"/></td></tr>			       			<tr><td class="l_form">IEC:</td><td><input id="iec" class="q_in" type="text" name="c_iec" tabindex="6"/></td></tr>
				<tr><td class="l_form">Email Id1:</td><td><input id="email1" class="q_in" type="text" name="c_email1"tabindex="7"/></td></tr>
		        <tr><td class="l_form">Email Id2:</td><td><input id="email2" class="q_in" type="text" name="c_email2" tabindex="8"/></td></tr>
               	</table>
                
                <table class="q_clients2">				
                <tr><td class="l_form">Phone No:</td><td><input id="ph" class="q_in" type="text" name="c_ph" tabindex="9"/></td></tr>
                <tr><td class="l_form">Mobile No:</td><td><input id="mo" class="q_in" type="text" name="c_mo" tabindex="10"/></td></tr>
			    <tr><td class="l_form">Bank Details:</td><td><textarea id="bnk" class="q_add" name="bnk" tabindex="11"></textarea></td></tr>

               <tr><td class="l_form">Tin No:</td><td><input id="tin" class="q_in" type="text" name="tin" tabindex="12"/></td></tr>
				<tr><td class="l_form">CIN:</td><td><input id="cin" class="q_in" type="text" name="cin" tabindex="13"/></td></tr>
		    <tr><td class="l_form">ECC No:</td><td><input id="ecc" class="q_in" type="text" name="ecc" tabindex="14"/></td></tr>
 <tr><td class="l_form">Special Note:</td><td><textarea id="note" class="q_add" name="note" tabindex="15"></textarea></td></tr>
                              
                </table>
        <div class="addclients_b">
         <input name="c_add" class="formbutton" value=" Add " type="submit" tabindex="16" />
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
