<?php
ob_start();
error_reporting(0);
include("session.php");
include('converter.php');   //convert number to words
	include("include/database.php");
	
	if(isset($_REQUEST['c_id2']))
	{
	$c_up=$_REQUEST['c_id2'];
	}
	
?>
<?php
	if(isset($_REQUEST['g_add']))
	{	
	echo '-'.$indt=$_REQUEST['cmp1'];
	 $add=$_REQUEST['addr'];
	 $cid=$_REQUEST['custid'];
 	 $d1=$_REQUEST['d1'];
	 $cpo=$_REQUEST['c_po'];
	 $spe=$_REQUEST['spe'];
	 $bnk=$_REQUEST['bnk'];
	$gtotal=$_REQUEST['total'];
    $auto=$_REQUEST['auto'];	
	$re_id='PO/'.$auto.date(my);
 
   $result="INSERT INTO `client_po`(`c_indent_of`, `c_add`, `c_id`,`pet_ref`, `date`, `c_po_no`, `inst`, `c_bnk_d`,`grand_total`) VALUES ('".$indt."','".$add."','".$cid."','".$re_id."','".$d1."','".$cpo."','".$spe."','".$bnk."','".$gtotal."')";
	
	$ans=mysql_query($result);
	
	
	$id=mysql_insert_id();
	$a=$_POST['grade'];
	$b = count($a);
	for($i=0; $i<$b; $i++)
	{
		//$id=$_REQUEST['i_id'];
		$q_g=$_POST['grade'][$i];		
		$q_q=$_POST['qnt'][$i];		
		$q_r=$_POST['r'][$i];
		$q_cd=$_POST['crd_nt'][$i];
		$q_a=$_POST['value'][$i];
		$q_d=$_POST['t_d'][$i];
		$q_s=$_POST['ship'][$i];
		$q_pd=$_POST['pod'][$i];
		$q_fd=$_POST['fd'][$i];
		$q_p=$_POST['pay'][$i];
        $fcl=$_POST['fcl'][$i];
	//	$total=10;
			
  $quo="INSERT INTO `sub_po`(`po_id`,`grade`, `qnt`, `unt_pr`, `c_note`,`tot_val`,`fcl`,`t_s_date`,`ship_term`,`pod`,`fd`,`pay_term`) VALUES('".$id."','".$q_g."','".$q_q."','".$q_r."','".$q_cd."','".$q_a."','".$fcl."','".$q_d."','".$q_s."','".$q_pd."','".$q_fd."','".$q_p."')";
	
	 $quo_res=mysql_query($quo);	
	
	}
	
	//exit();
	if($ans)
	{
	header("location:po_doc.php?id=".$id);
	
	}
	else
	{
		header("location:po.php" );
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
<style title="searcht" >
.search
{
list-style:none;
margin: 5px 20px 20px 5px;
width: 300px;
}
.serch1
{
display: block;
padding: 2px;
margin-left:10px;
background-color: #d1e5fe;
border-bottom: 1px solid #367;
 
}
#content
{
padding:50px;
width:500px; border:1px solid #666;
float:left;
}
#clear
{ clear:both; }
#box
{
float:left;
margin:0 0 20px 0;
text-align:justify;
}</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="toword.js"></script>
<script type="text/javascript" src=" jquery.min.js"></script>
<script type="text/javascript">
function fill(Value)
{
$('#cmp1').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#cmp1").keyup(function() {
var cmp1 = $('#cmp1').val();
if(cmp1=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "po_client_list.php",
data: "cmp1="+ cmp1 ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>

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
		// var tax =document.getElementById("stax").value;
//		 var vat =document.getElementById("vat").value;
//		 var add=total*1;
//		 add+=(tax*1);
//		  add+=(vat*1);		 
        document.getElementById("total").value = total;
		var words = toWords(total);
		document.getElementById("word").innerHTML=words;
        total=0;
}

</script>
<script>
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
                            newcell.childNodes[0].value;
							 
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;  
					case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
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
				//alert(rowCount);
                    for(var i=0; i<rowCount; i++)
                        {
                        var row = table.rows[i];
						
                        var chkbox = row.cells[0].childNodes[0];
						//alert(chkbox);
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

<body>
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
	$query="select * from clients where c_id='$c_up'";
	$nm=mysql_query($query);
	$cmpnm=mysql_fetch_array($nm);
	
	?><br />
        <div class="quotation"><center>Purches Order Details</center></div>
        <div><br>
        <table class='q_clients_2' >       
			<form method="post" action="po.php">
            <tr>		
           <td class="l_form" valign="top">Indent Of:-
          <input id="cmp1" class="q_in" type="text" name="cmp1" autocomplete="off" value="<?php echo $val;?>" tabindex="1"/>   
		  <input type="submit" name="submit" id="submit" value="Search" tabindex="2" > </td>
		 </tr>
		 <tr>
		  
		 <td colspan="3"><div id="display"></div></td>
		        </tr>
		 </form>
		  </table>
		  <?php
if(isset($_POST['submit']))
{
if(!empty($_POST['cmp1']))
{
  $name=$_POST['cmp1'];

$query3=mysql_query("SELECT * FROM clients WHERE comp_name LIKE '%$name%'");
 $cmpnm=mysql_fetch_array($query3);
}
}
?>
            <form action="" method="post" name="po" class="marquee" target="_blank" >

            <br><br>
            <table  class='q_clients4' align="left"> 
			 <tr>
              <td class="l_form">Address:-</td>
         <td>
         <textarea id="addr" class="q_add"  name="addr" tabindex=""> <?php echo $cmpnm['c_add1']; ?></textarea>
		 <input id="cmp1"  type="hidden" name="cmp1" value="<?php echo $val;?>"/>  
		 </td>
            </tr>
            <tr>
              <td class="l_form">Customer Id:-</td>
         <td>
         <input type='text' id="custid" class="q_in"  name="custid" readonly=""  value="<?php echo $cmpnm[1]; ?>" tabindex=""/></td>
            </tr>         
			<tr>
                   <td class="l_form">PT Ref No:</td>
				   <?php
				    $query="SELECT po_id FROM client_po ORDER by po_id DESC LIMIT 1";
				   $no=mysql_query($query);
				    $max_public_id = mysql_fetch_row($no);
  					$auto=$max_public_id[0]; //Here it is
										
				   ?>
          <td>
		  PO/<?php echo $cmpnm['cmp_txt'];?>/<input type="hidden" name="auto" value="<?php echo $cmpnm['cmp_txt'];?>/<?php echo $num= sprintf("%'.03d",++$auto);?>"><?php echo $num. date('my');  ?></label>
		  </td>
             </tr>
			  
			<tr>
                   <td class="l_form">Date:</td>
          <td><input id="d1" class="q_in" type="text" name="d1" value="<?php echo date('d/m/Y');?>" tabindex=""/></td>
             </tr>
			 <tr>
                   <td class="l_form">Cust Po No:</td>
          <td><input id="c_po" class="q_in" type="text" name="c_po" value=" " tabindex="3"/></td>
             </tr>
			        
            </table>
        
            
            
             <table class="des">
             
            <tr><td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Add Row" onClick="addRow('dataTable'); " >&nbsp;
			<input type="button" value="Delete Row" onClick="deleteRow('dataTable')" >
				</td>
            </tr>
            </table>
				 <table  class="des" >
                <tr>
                <td width="10"></td>
               
                <td class="heading" width="80px;">Grade</td>
                <td class="heading">Quantity</td>
                <td class="heading">Unit Price <br style="l">
                  (USD)</td>
                <td class="heading">Cradit Note<br style="l"> per Mt 
                  (USD)</td>
                <td class="heading">Total Value</td>
				<td class="heading">FCL</td>
				<td class="heading">Tentatively <br>shipment date</td>				
				<td class="heading">Shipments Terms</td>
				<td class="heading">Port of Discharge</td>
				<td class="heading">Final Destination</td>
				<td class="heading">Payment Terms</td>			

				
                </tr>
          </table>
               <!-- <span style="color:#00f;font-size:20px;font-weight:bold;cursor:pointer;" onClick="add_phone_field()">[+]</span>-->
               <table  class="des" id="dataTable">

                <tr>
                <td style="white-space:nowrap;" width="10"><input type="checkbox" name="chk[]"/></td>
                 
                <td width="" >
                 <select name="grade[]" class="des_q" id="" style="width:80px;" tabindex="4" >
				 <option value="No Grade">Grade</option>
				 <option value="1T">1T</option>
				 <option value="2T">2T</option>
				 <option value="2TS">2TS</option>
				 <option value="ZB1">ZB1</option>								 
				 <option value="ZB2">ZB2</option>
				 </select>
                </td>     
				<td>
                 <input class="des_r" type="text" name="qnt[]" id="" value="" style="width:60px;" tabindex="5" > 
                </td>
				<td >
                 <input class="des_r" type="text" name="r[]" id="r" value="" style="width:80px;" tabindex=" 6"  onkeyup="getValues()" > 
                </td>
                <td >
                 <input class="des_r" type="text" name="crd_nt[]" id="0" value="" style="width:100px;" tabindex=" 7" > 
                </td>
                <td>
                 <input class="des_r" type="text" name="value[]" id="value" value=""style="width:80px;"   readonly> 
                </td>
				  <td>
                 <input class="des_r" type="text" name="fcl[]" id="fcl" value="" style="width:40px;"  tabindex=" 8"> 
                </td>
                   
          <td><input id="t_d" class="des_r" type="text" name="t_d[]" style="width:120px;"  value="<?php echo date('d/m/Y');?>" tabindex="9"/></td>
              
				 <td >
                 <select name="ship[]" class="des_q" id="" style="width:120px;" tabindex=" 10">
				 <option value="No Shipment_term" >Select</option>
				 <option value="FOB">FOB</option>
				 <option value="CIF">CIF</option>
				 </select>
                </td>
				<td><input class="des_r" type="text" name="pod[]" id="pod[]" style="width:120px;" tabindex="11" ></td>
				<td><input class="des_r" type="text" name="fd[]" id="fd[]" style="width:120px;"tabindex="12" ></td>
                <td >
             <select name="pay[]" class="des_q" id="" style="width:130px;" tabindex="13" >
				 <option value="No Payment_term">Select</option>
				 <option value="DP AT Sight">DP AT Sight</option>
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
				 </select>
                </td>              
                </tr>                 
                
          </table>               
                
                
                 <table class="des" border="1" style="border:none;">
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                                
                <td colspan="5">
                 Enter Special Instruction:-
                </td>
                <td width="100"><textarea name="spe" tabindex="14" ><?php echo $cmpnm['c_special_note']; ?></textarea></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                
                <td colspan="5">
                 Customer Bank Details:
                </td>
                <td width="100"><textarea name='bnk' id="bnk" readonly=""><?php echo $cmpnm['c_bnk_dtl']; ?> </textarea></td>
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="5">
                 Total :
                 <div align="right"> </div>
                </td>
                <td width="100"> USD 
                <input type='text' name='total' id="total" value="" readonly=""/>
                </td>               
                </tr>
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="6">
				Order Value (in words):-
				<h4><div id='word'></div></h4>
                </td>                              
                </tr>
                </table>
              
            

                                  
             

                         
                
        <div class="addclients_b">
         <input name="g_add" class="formbutton" value=" Pdf_View " type="submit" tabindex="15" />
        <a href="viewpo.php"><input name="can" class="formbutton" value="Cancel" type="button" tabindex="16" /></a>
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
