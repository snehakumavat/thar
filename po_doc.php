<?php
include("include/database.php");
error_reporting(0);
include("session.php");
include('num_to_word.php');

$p=$_REQUEST['id'];
$qry="select * from client_po where po_id='$p'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_detail="select * from sub_po where po_id='$p'";
$res_detail=mysql_query($qry_detail);

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
	width:720px;
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
</style>

<script language="javascript" type="text/javascript" >
function num_word{
		document.getElementById("word").innerHTML='words';
		}
		</script>
</head>

<body >
<br>
<br>
<font face="Calibri" size="12px;">
 

<div class="quotation"><center>Purchase Order</center></div>
<div class="to">
 <div class="da">

PO No <span style="margin-right:40px;">  </span><label> : <?php echo $row['pet_ref']; ?></label><br> 
Date <span style="margin-right:50px;"> </span><label> : <?php echo $row['date']; ?></label> <br> 
Customer Po No&nbsp;:<label><?php echo $row['c_po_no']; ?></label> 
 </div>
<div class="tow">

<b>Consignee  :- &nbsp;&nbsp;<br><?php echo $row['c_indent_of'].'<br>'. nl2br($row['c_add']); ?> 



<br>

<br>
						Customer Id :- <label><?php echo $row[c_id]; ?></label>

 </div>
</div>
<div class="description">
<table class="report">
<tr>
<td  width="5px;">No.</td>
 <td width="80px;">Grade</td>
<td  width="50px;">Quantity <br>(MT)</td>
<td width="50px;" >Unit Price<br>(USD)</td>
<td width="50px;">Cradit Note<br>($/Mt)</td>
<td width="50px;">Total amount</td>
<td width="20px;">FCL</td>
<td width="90px;">Tentatively shipment date</td>
<td width="30px;">Shipments Terms</td>
<td width="90px;">Port Of Discharge</td>
<td width="80px;">Final Destination</td>
<td width="100px;">Payment Terms</td>

</tr>
<?php
$count=0;
while($row_d=mysql_fetch_array($res_detail))
{$count+=1;
	 
	echo "<tr>";
	echo "<td>";
	echo $count;
	echo "</td>";
	echo "<td>";
	echo $row_d['grade'];
	echo "</td>";
	echo "<td>";
	echo $row_d['qnt'];
	echo "</td>";
	echo "<td>";
	echo $row_d['unt_pr'];
	echo "</td>";
	echo "<td>";
	echo $row_d['c_note'];
	echo "</td>";
	echo "<td>";
	echo $row_d['tot_val'];
	echo "</td>";
	echo "<td>";
	echo $row_d['fcl'];
	echo "</td>";
	echo "<td>";
	echo $row_d['t_s_date'];
	echo "</td>";
	echo "<td>";
	echo $row_d['ship_term'];
	echo "</td>";
	echo "<td>";
	echo $row_d['pod'];
	echo "</td>";
	echo "<td>";
	echo $row_d['fd'];
	echo "</td>";

	echo "<td>";
	echo $row_d['pay_term'];
	echo "</td>";

	echo "</tr>";
	 	 
}
 
?>
  
 


<tr>
<td colspan="2" height="50" valign="top" style="border-right-color:#FFFFFF;" align="left">Special Instruction:-</td>
<td colspan="10" align="left"> <?php echo nl2br($row['inst']);?>  
</td>
 </tr>
<tr>
<td  height="50" colspan="2" class="chang" valign="top" align="left">Customer Bank Details:-  </td>
<td colspan="10" align="left"><?php echo  nl2br($row['c_bnk_d']);?> </td>
</td>
 </tr>

 
<tr>
<td colspan="10" align="left">
				US DOLLARS:-
				<h4>  <?php echo  strtoupper(convert_number_to_words($row['grand_total'])).' ONLY';?>   </h4>
                </td>      
<td   style="text-align:right; font-weight:800; ">TOTAL:-</td>
<td>USD <?php echo $row['grand_total'] ;?></td>

</tr>

</table>
<br> 
<p style="text-align: left; width:49%; display: inline-block;"><font size="2">Verified By<br>&nbsp;&nbsp; DT001 </p>
<p style="text-align: right; width:40%;  display: inline-block;"><font size="2">Approved By<br><font style="margin-right:20px;"> NC007</p>
 

</div>
</font>
<br><br>
</div>
</font>

</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $canvas = $dompdf->get_canvas();
  $font = Font_Metrics::get_font("", "bold");
  $canvas->page_text(50,850, "", $font, 7, array(0,0,0));
  $canvas->page_text(500,850, "PAGE: {PAGE_NUM} OF {PAGE_COUNT}", $font, 8, array(0,0,0));

  $dompdf->stream($filename, array("Attachment" => false));	
 
  exit(0);
?>