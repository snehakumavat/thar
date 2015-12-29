<?php
include("include/database.php");
error_reporting(0);
include("session.php");
?>
<?php
$per_page = 20; 
if($_GET)
{
 $page=$_GET['page'];
}
	
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from client_po c ,sub_po s where c.po_id=s.po_id order by c.po_id desc limit $start,$per_page";
	
	$c_res_f=mysql_query($c_qry_f);
$num=$start+1;
		
?>
        <table class="emp_tab_job">
        <tr class="emp_header">
		<td>Sr No.</td>
        <td  >Customer Name</td>		 	
		<td>Final Destination</td>
		<td>Product </td>	
		<td>QTY.</td>	
		<td>FCL</td>
		<td>Tentatively Date</td>
		<td width="90">ETD</td>
		<td width="90">ETA</td>
		<td>SHIPPING LINE</td>
		<td>B/L NO.</td>
		<td>OCEAN FRIGHT</td>
		<td>PI NO.</td>
		<td>PRICE(USD)</td>
		<td>AMOUNT</td>
		<td>ACK</td>
		<td>INVOICE NO.</td>
		<td>DHL AWB NO.</td>
		<td width="90">PMT DUE DT</td>
		<td width="90">PMT RCV DT</td>
		<td>TERMS</td>
		<td>SHIPMENT MONTH</td>
		
         
        </tr>

        <?php
		
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='pagi'>";
		echo "<td>";
		echo $num;
		echo "</td>";
        echo "<td >";
		echo $c_row['c_indent_of'];
		echo "</td>";
		echo "<td>";
		echo $c_row['fd'];
		echo "</td>";     
		echo "<td>";
		echo $c_row['grade'];
		echo "</td>";
		echo "<td>";
				if(!empty($c_row['qnt']))

		echo $c_row['qnt'];
		echo "</td>";
		echo "<td>";
		echo $c_row['fcl'];
		echo "</td>"; 
		echo "<td>";
		echo $c_row['t_s_date'];
		echo "</td>";
		echo "<td>";
		if(!strtotime($c_row['etd']) == '')
				echo $c_row['etd'];
		echo "</td>";
		echo "<td>";
		if (!strtotime($c_row['eta']) == '')		
		echo $c_row['eta'];
		echo "</td>";
		echo "<td>";
		echo $c_row['ship_line'];
		echo "</td>";
		echo "<td>";
		echo $c_row['bl_no'];
		echo "</td>";
		echo "<td>";
		if(!empty($c_row['ocean_frght']))
		echo $c_row['ocean_frght'];
		echo "</td>";
		echo "<td>";
		echo $c_row['pi_no'];
		echo "</td>";
		echo "<td>";
				if(!empty($c_row['unt_pr']))
		echo $c_row['unt_pr'];
		echo "</td>";
		echo "<td>";
		if(!empty($c_row['tot_val']))		
		echo $c_row['tot_val'];
		echo "</td>";
		echo "<td>";
		echo $c_row['ack'];
		echo "</td>";
		echo "<td>";
		echo $c_row['invoice'];
		echo "</td>";
		echo "<td>";
		echo $c_row['dhl_awb_no'];
		echo "</td>";
		echo "<td>";
		if(!strtotime($c_row['payment_due']) == '')
				echo $c_row['payment_due'];
		echo "</td>";
		echo "<td>";
		 if(!strtotime($c_row['payment_recieve']) == '')
				echo $c_row['payment_recieve'];			
		echo "</td>";
		echo "<td>";
		echo $c_row['pay_term'];
		echo "</td>";
		echo "<td>";
		echo $c_row['ship_month'];
		echo "</td>";
		 
		echo "</tr>";
		++$num;
		}
		?>
        
        </table>
