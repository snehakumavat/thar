<?php
include("include/database.php");
 error_reporting(0);
include("session.php");


 $cnt=$_POST['cnt'];
 $res=count($cnt);
 $rm=$_POST['remarkt'];
 $rmt=count($rm);
?>
<html>
<head>
<script type="text/javascript" src="toword.js"></script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<style type="text/css">
.heading{
	font-size:32px;
	font-family:"MS Serif", "New York", serif;
	text-align:right;
}
.sub_heading
{
	font-size:18px;
	font-family:"MS Serif", "New York", serif;
	text-align:right;
}
.quotation
{
	font-size:24px;
	font-weight:bold;
	text-decoration:underline;
}
.date
{	
	margin-left:80%;
}
.description ul
{
	border:1px solid #000; 
}
.description ul li
{	
	list-style:none;
	display:inline;
	padding:20px;
}
.report
{
	width:820px;
	margin-top:15px;
	margin-left:-15px;
}
.report td{
		border:1px solid #000;
		text-align:center;
		height:25px;
}
.total{
	width:720px;
}
.total td{
}
.tow{
	margin-top:-80px;
	padding-top:-37px;
}
.da{
	margin-left:550px;
}
.linedata{
	font-size:15px;
}
.left{
  float: left;
}

.right{
  float:right;
}
.right1{
	margin-left:600px;
	margin-top:-20px;
}
.terms{
	font-size:10px;
	font-family:Calibri ;
}
.guaranty{
	font-size:10px;
	font-family:Calibri;
	margin-left:5px;
}
.guaranty li{
	margin-top:-10px;
	margin-left:-25px;
	text-decoration:underline;
}
.sign{
	font-size:10px;
	font-family:Calibri;
	margin-left:5px;
	font-style:italic;

}
.report  
{
border-collapse:collapse;
}
td.chang
{

border-right: 1px solid #FFFFFF;	
}
.sheet
{
	width:820px;
	margin-top:45px;
	margin-left:40px;
    
}
.sheet td{
		text-align:center;
		height:35px;
}
</style>

 
</head>

<body style=" font-size:11px;">

 <br>
<br>
 

<div class="quotation"><center>Weekly Updated Sheet As On <?php echo date('d/m/Y'); ?></center></div>
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
<div class="description">
<table class="report">
<tr bgcolor="#33CCFF">

				<td width="10">No</td>
                <td width="90">Customer Name</td>
                <td width="80">Final Destination</td>
                <td width="60">Product  </td>
                <td width="40"> QTY.</td>
                <td width="70">Terms</td>
				<td width="20">FCL</td>
				<td width="50">ETD</td>				
				<td width="50">ETA</td>
				<td width="80">Vessel Name</td>
				<td width="80">Shipping Agent/<br>Forwarding</td>
				<td width="80">Proforma Inv No</td>
				<td width="150">Remark</td>
</tr>
 <?php
 if($res==0)
 {
 echo "<h3 align='center' style='color:#FF0000;' >No New Shipments</h3>";
 }
 else
 {
for($c=0; $c<$res;$c++)
{
$count+=1;
if($_POST['job'][$c]==1)
{
	  echo "<tr  align='center' style='text-decoration:line-through;'>";
		echo "<td>";
		echo $count;
	echo "</td>";
        echo "<td >";
		echo $_POST['cmp'][$c];
		echo "</td>"; 		
     	echo "<td>";
		echo $_POST['fd'][$c];
		echo "</td>";     
		echo "<td>";
		echo $_POST['grade'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['qnt'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['payterm'][$c];
		echo "</td>"; 
		echo "<td>";
		echo $_POST['fcl'][$c];
		echo "</td>";			
        echo "<td>";
		echo $_POST['etd'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['eta'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['vnm'][$c];
		echo "</td>"; 
		echo "<td>";
		echo $_POST['sline'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['inv'][$c];
		echo "</td>";
		echo "<td>";
		echo nl2br($_POST['remark'][$c]);
		echo "</td>";

		echo "</tr>";
		++$cnt;
}
else
{

	  echo "<tr>";
		echo "<td>";
		echo $count;
	echo "</td>";
        echo "<td >";
		echo $_POST['cmp'][$c];
		echo "</td>"; 		
     	echo "<td>";
		echo $_POST['fd'][$c];
		echo "</td>";     
		echo "<td>";
		echo $_POST['grade'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['qnt'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['payterm'][$c];
		echo "</td>"; 
		echo "<td>";
		echo $_POST['fcl'][$c];
		echo "</td>";			
        echo "<td>";
		echo $_POST['etd'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['eta'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['vnm'][$c];
		echo "</td>"; 
		echo "<td>";
		echo $_POST['sline'][$c];
		echo "</td>";
		echo "<td>";
		echo $_POST['inv'][$c];
		echo "</td>";
		echo "<td>";
		echo nl2br($_POST['remark'][$c]);
		echo "</td>";

		echo "</tr>";
		++$cnt;

}
}
 }
?> 
  
  
</table >
</div>
<br>
<br>
<br>
<div style="color:#FF0000; font:'Times New Roman', Times, serif; font-size:12px;">* KINDLY REFFER BELOW PAGE FOR ACCOUNTS AND OUTSTANDING </div>
<div style="page-break-after:always;"></div>
<div>PETROTECH GROUP<BR>
List of Outstanding -<?php echo date('d/m/Y');?>
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
<div class="description">
<table class='sheet'>
<tr bgcolor="#33CCFF">
               
                <td width="90">Customer </td>
				<td width="80">ETD Port Klang</td>				
                <td width="80">Terms of Payment</td>
                <td width="55">PI No</td>
                <td width="90">Payment Due</td>
                <td width="70">Invoice No</td>
				<td width="80">Amount(USD)</td>

				<td colspan="2" width="100">Payment Received(USD)</td>
				<td width="100"> Remark</td>
</tr>
<?php
$p=$_REQUEST['cmp'][0];
$qry="select * from client_po c ,sub_po s where c.po_id=s.po_id  AND c.c_indent_of='$p'  order by S.payment_recieve  DESC";
$res=mysql_query($qry);
$row=1;$rcv=1;$c=0;
while($c_row=mysql_fetch_array($res))
{
$received = str_replace('/', '-', $c_row['payment_recieve']);
$due = str_replace('/', '-', $c_row['payment_due']);
if($c_row['job']!=1)        
{
if($received!='' && $rcv>3)
{}
else{
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
					 echo "<td>";
					echo "</td>"; 		
			 	}
			if($c<$rmt)	
			{
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
		//echo 'USD '.$c_row['pay_amt'];
		echo "</td>";
		echo "<td>";		
		echo nl2br($_POST['remarkt'][$c]);
		echo "</td>";
	   }
	   else{		
	  if(strtotime($received)!='')
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
		echo 'USD '.$c_row['pay_amt'];
		echo "</td>";
		echo "<td>";		
		echo nl2br($_POST['remarkt'][$c]);
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
		
		echo "<td>";		
		echo nl2br($_POST['remarkt'][$c]);
		echo "</td>";
		echo "</tr>";
		 
		} //else loop close of receive
		}++$row;
		++$c;}// close loop of remark view 
} // end of while loop
 } //end of recieve date
 } //end of job cheking
?>
  
</table>

</div>
 


</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "landscape");
  $dompdf->render();
  $canvas = $dompdf->get_canvas();
  $font = Font_Metrics::get_font("", "bold");
  $canvas->page_text(50,850, "", $font, 7, array(0,0,0));
  $canvas->page_text(500,850, "PAGE: {PAGE_NUM} OF {PAGE_COUNT}", $font, 8, array(0,0,0));

  $dompdf->stream($filename, array("Attachment" => false));	
  
  exit(0);
?>