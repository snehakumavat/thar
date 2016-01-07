<?php
ob_start();
error_reporting(0);
include("session.php");
include('converter.php');
	include("include/database.php");
	if(isset($_REQUEST['po_id']))
	{
	$c_up=$_REQUEST['po_id'];
	}
	
?>
<?php
	if(isset($_REQUEST['g_add']))
	{	
	$indt=$_REQUEST['cmp1'];
	 $add=$_REQUEST['addr'];
	 $cid=$_REQUEST['custid'];
 	 $d1=$_REQUEST['d1'];
	 $cpo=$_REQUEST['c_po'];
	 $spe=$_REQUEST['spe'];
	 $bnk=$_REQUEST['bnk'];
	$gtotal=$_REQUEST['total'];
    $auto=$_REQUEST['auto'];
 
 $result="update `client_po` set `date`='".$d1."', `c_po_no`='".$cpo."', `inst`='".$spe."', `grand_total`='".$gtotal."' where po_id='$c_up'";
	$ans=mysql_query($result);
	 
	
	$a=$_POST['grade'];
	 echo $b = count($a);
 
	
	$cnt_id=0;
	for($i=1; $i<$b; $i++)
	{
		//$id=$_REQUEST['i_id'];
		echo '<br>'. $chk=$_POST['chk'][$i];
		echo '<br>'. $q_g=$_POST['grade'][$i];		
		echo '<br>'.$q_q=$_POST['qnt'][$i];		
		$q_r=$_POST['r'][$i];
		$q_cd=$_POST['crd_nt'][$i];
		$q_a=$_POST['value'][$i];
		$q_d=$_POST['t_d'][$i];
		$q_s=$_POST['ship'][$i];
		$q_pd=$_POST['pod'][$i];
		$fcl=$_POST['fcl'][$i];
		$q_fd=$_POST['fd'][$i];
		$q_p=$_POST['pay'][$i];
	//	$total=10;
	if($chk == 'yes')
	{
	 $dupesql = "SELECT sub_po_id FROM sub_po where (po_id = '$c_up' AND merge='1' AND fcl = '$fcl' AND t_s_date = '$q_d' AND ship_term = '$q_s' AND pod='$q_pd' AND fd ='$q_fd' AND pay_term = '$q_p')";
$dupa = mysql_query($dupesql);
$rd=mysql_fetch_array($dupa);

  $dupmerge="select sub_po_id from sub_po_merge where( `sub_po_id`='".$rd['sub_po_id']."' AND `m_grade`='$q_g' AND `m_qnt`='$q_q' AND `m_crd_not`='$q_cd' AND `m_price`='$q_r' AND `m_tot`='$q_a')";
 $exe=mysql_query($dupmerge);
 
 $row2=mysql_num_rows($exe);
$row1=mysql_num_rows($dupa);
if($row1==$row2)
   $row=1;
 else
 $row=0;  
	
	}
	else
	{
	 $dupesql = "SELECT sub_po_id FROM sub_po where (po_id = '$c_up' AND grade = '$q_g' AND qnt = '$q_q' AND unt_pr ='$q_r' AND c_note = '$q_cd' AND tot_val = '$q_a' AND fcl = '$fcl' AND t_s_date = '$q_d' AND ship_term = '$q_s' AND pod='$q_pd' AND fd ='$q_fd' AND pay_term = '$q_p')";
$duperaw = mysql_query($dupesql);
$row=mysql_num_rows($duperaw);
	}
if($row==1)
		{
		++$cnt_id;
		}
     }//for loop
	 			
	$id_tot=mysql_query("select * from sub_po where po_id='$c_up' AND merge='' ");	
	$query=mysql_query("select * from sub_po_merge where sub_po_id in(select sub_po_id from sub_po where merge= 1 AND po_id='$c_up')");
	 $tot1=mysql_num_rows($id_tot);
	  $tot2=mysql_num_rows($query);
	 echo '<br>'.$tot=$tot1+$tot2;
	 echo'<br>'.$cnt_id;	
	 
	if($cnt_id!=$tot)
	{
	 $txt="delete from sub_po_merge where sub_po_id in(select sub_po_id from sub_po where merge= 1 AND po_id=$c_up)";
	  
	$m_del=mysql_query($txt);
	
	  $delete="delete from sub_po where po_id='$c_up'";
	 mysql_query($delete);
	 
	  $qu=1;
	  
	   
	for($i=1; $i<$b; $i++)
	{
		//$id=$_REQUEST['i_id'];
		$chk=$_POST['chk'][$i];
		$q_g=$_POST['grade'][$i];		
		$q_q=$_POST['qnt'][$i];		
		$q_r=$_POST['r'][$i];
		$q_cd=$_POST['crd_nt'][$i];
		$q_a=$_POST['value'][$i];
		$q_d=$_POST['t_d'][$i];
		$q_s=$_POST['ship'][$i];
		$q_pd=$_POST['pod'][$i];
		$fcl=$_POST['fcl'][$i];
		$q_fd=$_POST['fd'][$i];
		$q_p=$_POST['pay'][$i];
			
			if($chk=='yes')
		  {
				  if($qu==1)
				  {
				echo   $quo="INSERT INTO `sub_po`(`po_id`,`merge`,`fcl`,`t_s_date`,`ship_term`,`pod`,`fd`,`pay_term`) VALUES('".$c_up."','".$qu."','".$fcl."','".$q_d."','".$q_s."','".$q_pd."','".$q_fd."','".$q_p."')";
				   mysql_query($quo);
				   ++$qu;
				   $sub_po_id=mysql_insert_id();
				   }
echo 		  $new_query="insert into sub_po_merge(`sub_po_id`,`m_grade`,`m_qnt`,`m_crd_not`,`m_price`,`m_tot`) values('".$sub_po_id."','".$q_g."','".$q_q."','".$q_cd."','".$q_r."','".$q_a."')";
		  $resul=mysql_query($new_query);
		  } //close chk if loop
		  
		  else
		  {		
	 echo $quo="INSERT INTO `sub_po`(`po_id`,`grade`, `qnt`, `unt_pr`, `c_note`,`tot_val`,`fcl`,`t_s_date`,`ship_term`,`pod`,`fd`,`pay_term`) VALUES('".$c_up."','".$q_g."','".$q_q."','".$q_r."','".$q_cd."','".$q_a."','".$fcl."','".$q_d."','".$q_s."','".$q_pd."','".$q_fd."','".$q_p."')";
		 $quo_res=mysql_query($quo);	
			}
			
	}
	
	if($sub_po_id!='')
	{
	$merge="UPDATE sub_po o 
INNER JOIN( SELECT sub_po_id, group_concat( `m_grade` separator  '&') 'grnd' , SUM(`m_qnt`) 'qnt',SUM(`m_crd_not`) 'cnote',SUM(`m_price`) 'pric',SUM(`m_tot`) 'tot'
   FROM sub_po_merge where sub_po_id=$sub_po_id GROUP BY  sub_po_id) i ON o.sub_po_id = i.sub_po_id SET o.grade=i.grnd, o.qnt=i.qnt,o.unt_pr=i.pric,o.c_note = i.cnote,o.tot_val=i.tot where o.sub_po_id=$sub_po_id";
    $res=mysql_query($merge);
	}
}	
	
	if($ans)
	{
	header("location:po_doc.php?id=".$c_up);
 
	}
	else
	{
		header("location:updatepo.php?po_id=".$c_up);
		
	}
		
	}
	
	
	if(isset($_REQUEST['can']))
	{
		header("location:viewpo.php");
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
<script type="text/javascript" src="toword.js"></script>
<script>
var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qnt[]")
		 {
			 var qty = obj[i].value;
			
		}
         if(obj[i].name == "r[]")
		 {
			 var rate = obj[i].value;
		 }
         if(obj[i].name == "value[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate;
					total+=(obj[i].value*1);
				}
				else
				{
					obj[i].value = 0;
				    total+=(obj[i].value*1);
				}
          }
       
		 }
		/* var tax =document.getElementById("stax").value;
		 var vat =document.getElementById("vat").value;
		 var add=total*1;
		 add+=(tax*1);
		  add+=(vat*1);	*/	 
        document.getElementById("total").value = total;
		var words = toWords(total);
		document.getElementById("word").innerHTML='New value= '+words;
        total=0;
}

</script>
<script>
var cnt=1;
function add()
{
	var tot=cnt++;
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var colCount = table.rows[0].cells.length;
	for(var i=0; i<colCount; i++) 
			{
		document.getElementById("cnt[]").value=tot;	
			}
}
function addRow(tableID) {
	
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) 
			{
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                
				switch(newcell.childNodes[0].type)
				 {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;                    
                }
				
            }
		
        }
		
				function deleteRow(tableID)
{
            try
                 {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                    for(var i=0; i<rowCount; i++)
                        {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null != chkbox && true == chkbox.checked)
                            {
                            if (rowCount <= 1)
                                {
                                alert("Cannot delete all the rows.");
                                break;
                                }
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                            }
                        }
                    } catch(e)
                        {
                        alert(e);
                        }
   getValues();
}
  
 </script>
</head>
<body >
<div id="container">
<div id="sub-header">	
<?php
$val='';
if(isset($_POST['submit']))
{
if(!empty($_POST['cmp1']))
{
$val=$_POST['cmp1'];
}
else
{
$val='';
}
}
?>
    <?php
	include("header.php");
	$query="select * from client_po where po_id='$c_up'";
	$nm=mysql_query($query);
	$cmpnm=mysql_fetch_array($nm);
	
	?><br />
        <div class="quotation"><center>Purches Order Details</center></div>
        <div><br>
        <form action="" method="post" name="po" target="_blank" >
        
        <table class='q_clients_2'>       
            <tr>
			<td class="l_form" valign="top">Indent Of:-
          <input id="cmp1" class="q_in" type="text" name="cmp1" autocomplete="off" value="<?php echo $cmpnm['c_indent_of'];?>" readonly="" tabindex="1"/>   
		 
            </tr>
            </table>
         <br><br>
            <table  class='q_clients4' align="left"> 
			 <tr>
              <td class="l_form">Address:-</td>
         <td>
         <textarea id="addr" class="q_add"  name="addr" tabindex=" " readonly> <?php echo $cmpnm['c_add']; ?></textarea></td>
            </tr>
            <tr>
              <td class="l_form">Customer Id:-</td>
         <td>
         <input type='text' id="custid" class="q_in"  name="custid" readonly=""  value="<?php echo $cmpnm['c_id']; ?>" tabindex=""/></td>
            </tr>         
			<tr>
                   <td class="l_form">PT Ref No:</td>
				   
          <td>
		  <?php echo $cmpnm['pet_ref'];  ?></label>
		  </td>
             </tr>
			  
			<tr>
                   <td class="l_form">Date:</td>
          <td><input id="d1" class="q_in" type="text" name="d1" value="<?php echo $cmpnm['date'];?>" tabindex=""/></td>
             </tr>
			 <tr>
                   <td class="l_form">Cust Po No:</td>
          <td><input id="c_po" class="q_in" type="text" name="c_po" value="<?php echo $cmpnm['c_po_no'];?> " tabindex="2"/></td>
             </tr>
			    </table>
           <br><br>
            
            
             
             <table class="des">
             
            <tr><td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Add Row" onClick="addRow('dataTable');add();" >&nbsp;
			<input type="button" value="Delete Row" onClick="deleteRow('dataTable')" >
				</td>
            </tr>
            </table>
				 <table  class="des" >
                <tr>
                <td width="10"></td>
               
                <td class="heading" width="70px;">Grade</td>
                <td class="heading" width="">Quantity</td>
                <td class="heading" width="">Unit Price <br style="l">
                  (USD)</td>
                <td class="heading" width="">Cradit Note<br style="l"> per Mt 
                  (USD)</td>
                <td class="heading" width="">Total Value</td>
				<td class="heading">FCL</td>
				<td class="heading" width="">Tentatively<br> shipment date</td>				
				<td class="heading" width="">Shipments Terms</td>
				<td class="heading" width="">Port of Discharge</td>
				<td class="heading" width="">Final Destination</td>
				<td class="heading" width="">Payment Terms</td>			

				
                </tr>
          </table>
               <!-- <span style="color:#00f;font-size:20px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>-->
               <table class="des" id="dataTable">
			   <!--hiddent tr -->
			       <tr style="display:none;">
                <td style="white-space:nowrap;" width="10"><input type="checkbox" name="chk[]" checked="checked" /></td>
                 
                <td>
                 <select name="grade[]" class="des_q" id="" style="width:60px;" >
				 <option value="No Grade">Grade</option>
				 <option value="ZANCARB 1T">1T</option>
				 <option value="ZANCARB 2T">2T</option>
				 <option value="ZANCARB 2TS">2TS</option>
				 <option value="ZANCARB ZB1">ZB1</option>								 
				 <option value="ZANCARB ZB2">ZB2</option>
				 </select>
                </td>     
				<td width="">
                 <input class="des_r" type="text" name="qnt[]" id="" value="" style="width:60px;"> 
                </td>
				<td width="" >
                 <input class="des_r" type="text" name="r[]" id="r" value=""  onkeyup="getValues()" style="width:80px;"> 
                </td>
                <td width="" >
                 <input class="des_r" type="text" name="crd_nt[]" id="0" value=""style="width:100px;"  > 
                </td>
                <td width="">
                 <input class="des_r" type="text" name="value[]" id="value" value=""  readonly style="width:80px;"> 
                </td>
				 
                <td>
                 <input class="des_r" type="text" name="fcl[]" id="fcl" value="" style="width:40px;"  tabindex=""> 
                </td>   
          <td width=""><input id="t_d" class="des_r" type="text" name="t_d[]" value="<?php echo date('Y-m-d');?>" tabindex="" style="width:120px;"/></td>
              
				 <td width="" >
                 <select name="ship[]" class="des_q" id="" style="width:120px;">
				 <option value="No Shipment_term">Select</option>
				 <option value="FOB">FOB</option>
				 <option value="CIF">CIF</option>
				 </select>
                </td>
				<td width=""><input class="des_r" type="text" name="pod[]" id="pod[]" style="width:120px;"></td>
				<td width=""><input class="des_r" type="text" name="fd[]" id="fd[]" style="width:120px;"></td>
                <td width="" >
             <select name="pay[]" class="des_q" id="" style="width:130px;">
				 <option value="No Payment_term">Select</option>
				 <option value="DP AT Sign">DP AT Sight</option>
				 <option value="DA 25 Days">DA 25 Days</option>
				 <option value="DA 30 Days">DA 30 Days</option>
				 <option value="DA 45 Days">DA 45 Days</option>								 
				 <option value="DA 60 Days">DA 60 Days</option>
				 <option value="DA 90 Days">DA 90 Days</option>
				 <option value="LC 30 Days">LC 30 Days</option>
				 <option value="LC 45 Days">LC 45 Days</option>
				 <option value="LC 60 Days">LC 60 Days</option>
				 <option value="TT 100% ADVANCE">TT 100% ADVANCE</option>
				 <option value="AGAINST DOCUMENT">AGAINST DOCUMENT</option>
				  <option value="other">Other</option>
				 </select>
                </td>  
				 <td><input class="des_r" type="text" name="pay2[]" id="pay2" style="width:120px; display:none;" value="" tabindex="13" /></td>            
                </tr>    
<?php
 $rd="select * from sub_po where po_id='$c_up'";
$rd_exc=mysql_query($rd);
while($sub_po=mysql_fetch_array($rd_exc))
{
if($sub_po['merge']==1)
	  {
	
 	   $rd="select * from sub_po_merge where sub_po_id='".$sub_po['sub_po_id']."'";
	   $select=mysql_query($rd);
	   while($rd=mysql_fetch_array($select))
	   {
?>
                          
				<tr>
                <td style="white-space:nowrap;" width="10"><input type="checkbox" name="chk[]" value="yes" checked="checked" /></td>
                 
                <td width="80px;" >
                 <select name="grade[]" class="des_q" id="" tabindex="3" style="width:60px;">
				 <option value="No Grade">Grade</option>
				 <option value="ZANCARB 1T" <?php if($rd['m_grade']=="ZANCARB 1T") echo 'selected="selected"'; ?>>1T</option>
				 <option value="ZANCARB 2T"  <?php if($rd['m_grade']=="ZANCARB 2T") echo 'selected="selected"'; ?>>2T</option>
				 <option value="ZANCARB 2TS"  <?php if($rd['m_grade']=="ZANCARB 2TS") echo 'selected="selected"'; ?>>2TS</option>
				 <option value="ZANCARB ZB1"  <?php if($rd['m_grade']=="ZANCARB ZB1") echo 'selected="selected"'; ?>>ZB1</option>								 
				 <option value="ZANCARB ZB2"  <?php if($rd['m_grade']=="ZANCARB ZB2") echo 'selected="selected"'; ?>>ZB2</option>
				 </select>
                </td>     
				<td width="">
                 <input class="des_r" type="text" name="qnt[]" id="" value="<?php echo $rd['m_qnt'];?>" tabindex="4" style="width:60px;"> 
                </td>
				<td width="" >
                 <input class="des_r" type="text" name="r[]" id="r" value="<?php echo $rd['m_price'];?>" tabindex="5" onKeyUp="getValues()" style="width:80px;" > 
                </td>
                <td width="" >
                 <input class="des_r" type="text" name="crd_nt[]" id="0" value="<?php echo $rd['m_crd_not'];?>" tabindex="6" style="width:100px;" > 
                </td>
                <td width="">
                 <input class="des_r" type="text" name="value[]" id="value" value="<?php echo $rd['m_tot'];?>" style="width:80px;" readonly> 
                </td>
				<td width="">
                 <input class="des_r" type="text" name="fcl[]" id="fcl" value="<?php echo $sub_po['fcl'];?>" style="width:40px;" tabindex="7"> 
                </td>
                   
          <td width=""><input id="t_d" class="des_sr" type="text" name="t_d[]" value="<?php echo $sub_po['t_s_date'];?>"style="width:120px;" tabindex="8"/></td>
              
				 <td width="" >
                 <select name="ship[]" class="des_q" id="" tabindex="9" style="width:120px;">
				 <option value="No Shipment_term">Select</option>
				 <option value="FOB"  <?php if($sub_po['ship_term']=="FOB") echo 'selected="selected"'; ?>>FOB</option>
				 <option value="CIF"  <?php if($sub_po['ship_term']=="CIF") echo 'selected="selected"'; ?>>CIF</option>
				 </select>
                </td>
				<td width="">
				<input class="des_r" type="text" name="pod[]" id="pod[]" value="<?php echo $sub_po['pod'];?>" style="width:120px;" tabindex="10"></td>
				<td width="">
				<input class="des_r" type="text" name="fd[]" id="fd[] "value="<?php echo $sub_po['fd'];?>" style="width:120px;" tabindex="11"></td>
                <td width="" >
             <select name="pay[]" class="des_q" id="" style="width:130px;" tabindex="12">
				 <option value="No Payment_term">Select</option>
				 <option value="DP AT Sight"  <?php if($sub_po['pay_term']=="DP AT Sight") echo 'selected="selected"'; ?> >DP AT Sight</option>
				 <option value="DA 25 Days" <?php if($sub_po['pay_term']=="DA 25 Days") echo 'selected="selected"'; ?>>DA 25 Days</option>
				 <option value="DA 30 Days"<?php if($sub_po['pay_term']=="DA 30 Days") echo 'selected="selected"'; ?>>DA 30 Days</option>
				 <option value="DA 45 Days"<?php if($sub_po['pay_term']=="DA 45 Days") echo 'selected="selected"'; ?>>DA 45 Days</option>								 
				 <option value="DA 60 Days"<?php if($sub_po['pay_term']=="DA 60 Days") echo 'selected="selected"'; ?>>DA 60 Days</option>
				 <option value="DA 90 Days"<?php if($sub_po['pay_term']=="DA 90 Days") echo 'selected="selected"'; ?>>DA 90 Days</option>
				 <option value="LC 30 Days"<?php if($sub_po['pay_term']=="LC 30 Days") echo 'selected="selected"'; ?>>LC 30 Days</option>
				 <option value="LC 45 Days"<?php if($sub_po['pay_term']=="LC 45 Days") echo 'selected="selected"'; ?>>LC 45 Days</option>
				 <option value="LC 60 Days"<?php if($sub_po['pay_term']=="LC 60 Days") echo 'selected="selected"'; ?>>LC 60 Days</option>
				 <option value="TT 100% ADVANCE" <?php if($sub_po['pay_term']=="TT 100% ADVANCE") echo 'selected="selected"'; ?>>TT 100% ADVANCE</option>
				 <option value="AGAINST DOCUMENT" <?php if($sub_po['pay_term']=="AGAINST DOCUMENT") echo 'selected="selected"'; ?>>AGAINST DOCUMENT</option>
				 <option value="other">Other</option>
				 </select>
                </td> 
				 <td><input class="des_r" type="text" name="pay2[]" id="pay2" style="width:120px; display:none;" value="" tabindex="13" /></td>
	<?php
	}
	}
	else
	{
	?>
	<tr>
                <td style="white-space:nowrap;" width="10"><input type="checkbox" name="chk[]"/></td>
                 
                <td width="80px;" >
                 <select name="grade[]" class="des_q" id="" tabindex="3" style="width:60px;">
				 <option value="No Grade">Grade</option>
				 <option value="ZANCARB 1T" <?php if($sub_po['grade']=="ZANCARB 1T") echo 'selected="selected"'; ?>>1T</option>
				 <option value="ZANCARB 2T"  <?php if($sub_po['grade']=="ZANCARB 2T") echo 'selected="selected"'; ?>>2T</option>
				 <option value="ZANCARB 2TS"  <?php if($sub_po['grade']=="ZANCARB 2TS") echo 'selected="selected"'; ?>>2TS</option>
				 <option value="ZANCARB ZB1"  <?php if($sub_po['grade']=="ZANCARB ZB1") echo 'selected="selected"'; ?>>ZB1</option>								 
				 <option value="ZANCARB ZB2"  <?php if($sub_po['grade']=="ZANCARB ZB2") echo 'selected="selected"'; ?>>ZB2</option>
				 </select>
                </td>     
				<td width="">
                 <input class="des_r" type="text" name="qnt[]" id="" value="<?php echo $sub_po['qnt'];?>" tabindex="4" style="width:60px;"> 
                </td>
				<td width="" >
                 <input class="des_r" type="text" name="r[]" id="r" value="<?php echo $sub_po['unt_pr'];?>" tabindex="5" onKeyUp="getValues()" style="width:80px;" > 
                </td>
                <td width="" >
                 <input class="des_r" type="text" name="crd_nt[]" id="0" value="<?php echo $sub_po['c_note'];?>" tabindex="6" style="width:100px;" > 
                </td>
                <td width="">
                 <input class="des_r" type="text" name="value[]" id="value" value="<?php echo $sub_po['tot_val'];?>" style="width:80px;" readonly> 
                </td>							
				 <td width="">
                 <input class="des_r" type="text" name="fcl[]" id="fcl" value="<?php echo $sub_po['fcl'];?>" style="width:40px;" tabindex="7"> 
                </td>
                   
          <td width=""><input id="t_d" class="des_sr" type="text" name="t_d[]" value="<?php echo $sub_po['t_s_date'];?>"style="width:120px;" tabindex="8"/></td>
              
				 <td width="" >
                 <select name="ship[]" class="des_q" id="" tabindex="9" style="width:120px;">
				 <option value="No Shipment_term">Select</option>
				 <option value="FOB"  <?php if($sub_po['ship_term']=="FOB") echo 'selected="selected"'; ?>>FOB</option>
				 <option value="CIF"  <?php if($sub_po['ship_term']=="CIF") echo 'selected="selected"'; ?>>CIF</option>
				 </select>
                </td>
				<td width="">
				<input class="des_r" type="text" name="pod[]" id="pod[]" value="<?php echo $sub_po['pod'];?>" style="width:120px;" tabindex="10"></td>
				<td width="">
				<input class="des_r" type="text" name="fd[]" id="fd[] "value="<?php echo $sub_po['fd'];?>" style="width:120px;" tabindex="11"></td>
                <td width="" >
				
             <select name="pay[]" class="des_q" id="" style="width:130px;" tabindex="12" >
				 <option value="No Payment_term">Select</option>
				 <option value="DP AT Sight"  <?php if($sub_po['pay_term']=="DP AT Sight") echo 'selected="selected"'; ?> >DP AT Sight</option>
				 <option value="DA 25 Days" <?php if($sub_po['pay_term']=="DA 25 Days") echo 'selected="selected"'; ?>>DA 25 Days</option>
				 <option value="DA 30 Days"<?php if($sub_po['pay_term']=="DA 30 Days") echo 'selected="selected"'; ?>>DA 30 Days</option>
				 <option value="DA 45 Days"<?php if($sub_po['pay_term']=="DA 45 Days") echo 'selected="selected"'; ?>>DA 45 Days</option>								 
				 <option value="DA 60 Days"<?php if($sub_po['pay_term']=="DA 60 Days") echo 'selected="selected"'; ?>>DA 60 Days</option>
				 <option value="DA 90 Days"<?php if($sub_po['pay_term']=="DA 90 Days") echo 'selected="selected"'; ?>>DA 90 Days</option>
				 <option value="LC 30 Days"<?php if($sub_po['pay_term']=="LC 30 Days") echo 'selected="selected"'; ?>>LC 30 Days</option>
				 <option value="LC 45 Days"<?php if($sub_po['pay_term']=="LC 45 Days") echo 'selected="selected"'; ?>>LC 45 Days</option>
				 <option value="LC 60 Days"<?php if($sub_po['pay_term']=="LC 60 Days") echo 'selected="selected"'; ?>>LC 60 Days</option>
				 <option value="TT 100% ADVANCE" <?php if($sub_po['pay_term']=="TT 100% ADVANCE") echo 'selected="selected"'; ?>>TT 100% ADVANCE</option>
				 <option value="AGAINST DOCUMENT" <?php if($sub_po['pay_term']=="AGAINST DOCUMENT") echo 'selected="selected"'; ?>>AGAINST DOCUMENT</option>
				 <?php
				 if($sub_po['pay_term']!="DP AT Sight" || $sub_po['pay_term']!="DA 25 Days" ||$sub_po['pay_term']!="DA 30 Days" || $sub_po['pay_term']!="DA 45 Days" || $sub_po['pay_term']!="DA 60 Days" || $sub_po['pay_term']!="DA 90 Days" || $sub_po['pay_term']!="LC 30 Days" || $sub_po['pay_term']!="LC 45 Days" || $sub_po['pay_term']!="LC 60 Days" || $sub_po['pay_term']!="TT 100% ADVANCE" || $sub_po['pay_term']!="AGAINST DOCUMENT")
				 {
				 ?>
				 <option  value="<?php echo $sub_po['pay_term'];?>" selected="selected"> <?php echo $sub_po['pay_term'];?></option>
				   <?php
				 }
				 ?>
				  <option value="other">Other</option>
				 </select>
                </td> 
				 
				
				 <?php }  // close else loop
				 
				 	} //close while loop
				   ?>             
                </tr>                 
                
          </table>               
                
               
                 <table class="des" border="1" style="border:none;">
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                                
                <td colspan="5">
                 Enter Special Instruction:-
                </td>
                <td width="100"><textarea name="spe" tabindex="13" ><?php echo $cmpnm['inst']; ?></textarea></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                
                <td colspan="5">
                 Customer Bank Details:
                </td>
                <td width="100"><textarea name='bnk' id="bnk" readonly=""><?php echo $cmpnm[c_bnk_d]; ?> </textarea></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="5">
                 Total :
                 <div align="right"> </div>
                </td>
                <td width="100"> USD 
                <input type='text' name='total' id="total" value="<?php echo $cmpnm[grand_total]; ?>" readonly=""/>
                </td>               
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="6">
				Order Value (in words):-
				<h4><?php echo convert_number_to_words($cmpnm['grand_total']); ?></h4>
				<h4><div id='word'></div></h4>
                </td>                              
                </tr>
			
                </table>
              
            

                                  
             

                                  
             

                         
                
        <div class="addclients_b">
         <input name="g_add" class="formbutton" value=" Update " type="submit"  tabindex="14"/>
         <a href="viewpo.php"><input name="can" class="formbutton" value="Cancel" type="button" tabindex="15" /></a>
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
