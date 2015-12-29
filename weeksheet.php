<?php
error_reporting(0);
include("session.php");
include("include/database.php");

 

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
<script type="text/javascript" src="js/jquery.min.js"></script>
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

				function deleteRow(tableID)
{
            try
                 {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
				// alert(rowCount);
                    for(var i=0; i<rowCount; i++)
                        {
						
                        var row = table.rows[i];
						
                        var chkbox = row.cells[0].firstElementChild;
						 // alert(chkbox.checked);
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
        <div class="quotation"><center>Weekly Sheet Details</center></div>
        <div><br>
            <table class='q_clients_2' style="width:800px;" >   
			<form method="post" action="weeksheet.php" class="marquee">
			
            <tr>		
           <td class="l_form" valign="top" >Indent Of:-
          <input id="cmp1" class="q_in" type="text" name="cmp1" autocomplete="off" value="<?php echo $val;?>" tabindex="1"/>  
		  </td> 
		  <td class="l_form" valign="top">
		  <select multiple="multiple" id="month" name="month[]" size="7">
	<option value="JANUARY"  >JANUARY</option>
	<option value="FEBRUARY" >FEBRUARY</option>
	<option value="MARCH">MARCH</option>
	<option value="APRIL">APRIL</option>
	<option value="MAY">MAY</option>
	<option value="JUNE">JUNE</option>
	<option value="JULY">JULY</option>
	<option value="AUGUST">AUGUST</option>
	<option value="SEPTEMBER">SEPTEMBER</option>
	<option value="OCTOMBER">OCTOMBER</option>
	<option value="NOVEMBER" >NOVEMBER</option>
	<option value="DECEMBER">DECEMBER</option>
	</select>
		  </td>
		  <td class="l_form" valign="top" width="100px;" align="right">
		  <input type="submit" name="submit" id="submit" class="formbutton" value="Search" tabindex="2"> </td>
		 </tr>
		 <tr>
		  
		 <td colspan="1" style="font-size:10px; color:#CC0000;"><div id="display"></div></td>
		        </tr>
				</form>
				</table>
		 
		 
		 <form action="weeksheet_doc.php" name="week" method="post" target="_blank" class="marquee" >   
 <br><br> 
  <table  >
             
            <tr><td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
			<input type="button" value="Delete Row" onClick="deleteRow('dataTable')" >
				</td>
            </tr>
           </table>            
            <table style="width:1250px; margin-left:40px;">
                <tr align="center">
				<td class="heading" width="10"></td>
                <td class="heading" width="20">No</td>
               
                <td class="heading" width="114">Customer Name</td>
                <td class="heading" width="110">Final Destination</td>
                <td class="heading" width="50">Product  </td>
                <td class="heading" width="34"> QTY.</td>
                <td class="heading" width="100">Terms</td>
				<td class="heading" width="30">FCL</td>
				<td class="heading" width="81">ETD</td>				
				<td class="heading" width="81">ETA</td>
				<td class="heading" width="113">Vessel Name</td>
				<td class="heading" width="115">Shipping Agent/<br>
				  Forwarding</td>
				<td class="heading" width="159">Proforma Inv No</td>
				<td class="heading" width="120">Remark</td>				
                </tr>  
		   </table>
	  <?php
if(isset($_POST['submit']))
{
if(!empty($_POST['cmp1']))
{
  $name=$_POST['cmp1'];
  $month=$_POST['month'];

?>   
<?php
if(!isset($month)) 
  {
    echo("<p style='font-size:16px; color:#CC0000;'>You didn't select any Month !</p>\n");
  } 
  else
  { ?>
  
  <?php
  $query3=mysql_query("SELECT * FROM clients WHERE comp_name LIKE '%$name%'");
  $cmpnm=mysql_fetch_array($query3);
$cnt=1;
    ?>

	
		<table  class="des" id="dataTable">
			 <?php

    $nmonth = count($month);
    for($i=0; $i < $nmonth; $i++)
    {
     $c_qry_f="select * from client_po c ,sub_po s where c.po_id=s.po_id  AND c.c_indent_of='".$cmpnm['comp_name']."' AND ship_month='".$month[$i]."'  order by c.po_id";
		$c_res_f=mysql_query($c_qry_f); 
			 
		while($c_row=mysql_fetch_array($c_res_f))
		{
 if($c_row['job']==1)
       {
	    echo "<tr  align='center'>";
		echo "<td style='white-space:nowrap;'> <input type='checkbox' name='chk[]'/> </td>";
		echo "<td>";
		echo "<input type='text' class='des_r_num' value='".$cnt."' name='cnt[]' style='text-decoration:line-through;'  />";
		echo "</td>";
        echo "<td  >";
		echo "<input type='text'  class='des_r_pdf' value='".$c_row['c_indent_of']."' name='cmp[]'  style='text-decoration:line-through;'/>";
		echo "</td>"; 		
     	echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['fd']."' name='fd[]'  style='text-decoration:line-through;'/>";
		echo "</td>";     
		echo "<td>";
		echo "<input type='text'class='des_r_numt'  value='".$c_row['grade']."' name='grade[]'  style='text-decoration:line-through;' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_numt' value='".$c_row['qnt']."' name='qnt[]'  style='text-decoration:line-through;' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['pay_term']."' name='payterm[]'  style='text-decoration:line-through;' />";
		echo "</td>"; 
		echo "<td>";
		echo "<input type='text' class='des_r_num' value='".$c_row['fcl']."' name='fcl[]'  style='text-decoration:line-through;'/>";
		echo "</td>";			
        echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['etd']."' name='etd[]'  style='text-decoration:line-through;'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['eta']."' name='eta[]'  style='text-decoration:line-through;'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['vessel_nm']."' name='vnm[]'  style='text-decoration:line-through;'/>";
		echo "</td>"; 
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['ship_line']."' name='sline[]'  style='text-decoration:line-through;'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf'  value='".$c_row['invoice']."' name='inv[]'  style='text-decoration:line-through;'/>";
		echo "</td>";
		echo "<td>";		
		echo "<input type='text' class='des_r_pdf' name='remark[]'  style='text-decoration:line-through;'/>";
		echo "</td>";
		echo "</tr>";
		++$cnt;
		}
		else
        {
		echo "<tr>";		
		echo "<td style='white-space:nowrap;'> <input type='checkbox' name='chk[]'/> </td>";
		echo "<td>";
		echo "<input type='text' class='des_r_num' value='".$cnt."' name='cnt[]'  />";
		echo "</td>";
        echo "<td  >";
		echo "<input type='text'  class='des_r_pdf' value='".$c_row['c_indent_of']."' name='cmp[]'/>";
		echo "</td>"; 		
     	echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['fd']."' name='fd[]'/>";
		echo "</td>";     
		echo "<td>";
		echo "<input type='text'class='des_r_numt'  value='".$c_row['grade']."' name='grade[]' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_numt' value='".$c_row['qnt']."' name='qnt[]' />";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['pay_term']."' name='payterm[]' />";
		echo "</td>"; 
		echo "<td>";
		echo "<input type='text' class='des_r_num' value='".$c_row['fcl']."' name='fcl[]'/>";
		echo "</td>";			
        echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['etd']."' name='etd[]'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['eta']."' name='eta[]'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['vessel_nm']."' name='vnm[]'/>";
		echo "</td>"; 
		echo "<td>";
		echo "<input type='text' class='des_r_pdf' value='".$c_row['ship_line']."' name='sline[]'/>";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' class='des_r_pdf'  value='".$c_row['invoice']."' name='inv[]'/>";
		echo "</td>";
		echo "<td>";		
		echo "<input type='text' class='des_r_pdf' name='remark[]'/>";
		echo "</td>";
		echo "</tr>";
		++$cnt;
		} //else loop
		}
		?>
           
		  <?php
	} // close for loop of selected month ?>
	            </table>
 
<?php

  }// close if loop of month

 
		}
}
		?> 
 <div class="addclients_b">
         <input name="g_add" class="formbutton" value="PDF_View" type="submit" tabindex="3" />
         
<a href="clients.php"> <input name="can" class="formbutton" value="Cancel" type="button" tabindex="4" /></a>
        </div>
 		  <br><br><br><br>  
		  
		  <div style="width:1000px;">
<table align="right">
<tr>
<td rowspan="3">Note</td>

<td bgcolor="#FF0000" width="100px;">  </td>
<td>Overdue</td>
</tr>
<tr>
<td bgcolor="#339900"  width="100px;">     </td>
<td>Payment Received</td>
</tr>
<tr>
<td bgcolor="#FFFF00"  width="100px;">         </td>
<td>BL date not confirm yet</td>
</tr>
</table>
</div> 

<div class="to">
 <div class="da">
<br>
  </div>
<div class="tow">
 <br>
 
<br>

<br>
 
 </div>
</div>                   
 <table width="900px;">
<tr >
               
                <td class="heading" width="90">Customer </td>
				<td class="heading" width="80">ETD Port Klang</td>				
                <td class="heading" width="80">Terms of Payment</td>
                <td class="heading" width="55">PI No</td>
                <td class="heading" width="90">Payment Due</td>
                <td class="heading" width="70">Invoice No</td>
				<td class="heading"width="80">Amount(USD)</td>

				<td class="heading"colspan="2" width="100">Payment Received(USD)</td>
</tr>
<?php
 
 $qry="select * from client_po c ,sub_po s where c.po_id=s.po_id  AND c.c_indent_of='".$cmpnm['comp_name']."'  order by S.payment_due  DESC ";
$res=mysql_query($qry);
$row=1;$rcv=1;
while($c_row=mysql_fetch_array($res))
{
$received = str_replace('/', '-', $c_row['payment_recieve']);
$due = str_replace('/', '-', $c_row['payment_due']);

 	  if($c_row['job']==1)
        echo "<tr  align='center' style='text-decoration:line-through'>";
	else
	  echo "<tr class='pagit'>";
  if($row==1){
       echo "<td >";
		echo $c_row['c_indent_of'];
		echo "</td>"; 		
		}
 else{
		 echo "<td >";
		
		echo "</td>"; 		
		
 }
     	echo "<td>";
		echo $c_row['etd'];
		echo "</td>";     
		echo "<td>";
		echo $c_row['pay_term'];
		echo "</td>";
		echo "<td>";
		echo $c_row['pi_no'];
		echo "</td> " ;
		if(strtotime($received)=='' && strtotime($due)!='' && strtotime($due) < strtotime(date('d-m-Y')))
		{
		echo "<td bgcolor='red'>";
		echo $c_row['payment_due'];
		echo "</td>"; 
		echo "<td bgcolor='red'>";
		echo $c_row['invoice'];
		echo "</td>";			
        echo "<td bgcolor='red'>";
		echo $c_row['tot_val'];
		echo "</td>";
		echo "<td bgcolor='red'>";
		echo $c_row['payment_recieve'];
		echo "</td>";
		echo "<td bgcolor='red' >";
		echo $c_row['pay_amt'];
		echo "</td>";
	   }
	   else{
	   		
	   if(strtotime($received)!='' && $rcv <= 2)
	   {
	   
	   echo "<td bgcolor='green'>";
		echo $c_row['payment_due'];
		echo "</td>"; 
		echo "<td bgcolor='green'>";
		echo $c_row['invoice'];
		echo "</td>";			
        echo "<td bgcolor='green'>";
		echo $c_row['tot_val'];
		echo "</td>";
	   echo "<td  bgcolor='green' >";
		echo $c_row['payment_recieve'];
		echo "</td>";
		echo "<td  bgcolor='green' >";
		echo 'USD'.$c_row['pay_amt'];
		echo "</td>";
		++$rcv;
	   }
	   else
	   {
	    echo "<td >";
		echo $c_row['payment_due'];
		echo "</td>"; 
		echo "<td >";
		echo $c_row['invoice'];
		echo "</td>";			
        echo "<td>";
		echo $c_row['tot_val'];
		echo "</td>";
	   echo "<td >";
		echo $c_row['payment_recieve'];
		echo "</td>";
		echo "<td >";
		echo $c_row['pay_amt'];
		echo "</td>";
		echo "</tr>";
		
		}
		}++$row;
}
 
?>
  
</table>

   

                         
                
        
        
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
