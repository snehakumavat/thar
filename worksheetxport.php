<div style="display:none;">
	<?php
				 $c_qry_f="select * from client_po c ,sub_po s where c.po_id=s.po_id order by c.po_id desc";
							$c_res_f=mysql_query($c_qry_f);
				$num=1;
		
?>
         <table id="tblExport4" border="1">
                 <thead>
				 <tr>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Sr No.</th>
        <th align="center" style="  background-color:#0099FF;  font-size:16px;">Customer Name</th>		 	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Final Destination</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Product </th>	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">QTY.</th>	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">FCL</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Tentatively Date</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">ETD</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">ETA</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">SHIPPING LINE</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">B/L NO.</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">OCEAN FRIGHT</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">PI NO.</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">PRICE(USD)</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">AMOUNT</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">ACK</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">INVOICE NO.</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">DHL AWB NO.</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">PMT DUE DT</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">PMT RCV DT</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">TERMS</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">SHIPMENT MONTH</th>
		
         
        </tr>
</thead>
 <tbody>
        <?php
		
		while($c_row=mysql_fetch_array($c_res_f))
		{
		$received = str_replace('/', '-', $c_row['payment_recieve']);
		$due = str_replace('/', '-', $c_row['payment_due']);
		$etd=str_replace('/', '-', $c_row['etd']);
		$eta=str_replace('/', '-', $c_row['eta']);
       if($c_row['job']==1){
        echo "<tr  align='center'>";
		echo "<td style='text-decoration:line-through;'>";
		echo $num;
		echo "</td>";
        echo "<td style='text-decoration:line-through;'>";
		echo $c_row['c_indent_of'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['fd'];
		echo "</td>";     
		echo "<td style='text-decoration:line-through;'>";
		$grade=explode('ZANCARB',$c_row['grade']);
		echo $grade[1];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
				if(!empty($c_row['qnt']))

		echo $c_row['qnt'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['fcl'];
		echo "</td>"; 
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['t_s_date'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		if(!strtotime($etd) == '')
			{	echo $c_row['etd'];
			}	
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		if (!strtotime($eta) == '')		
			{	echo $c_row['eta'];
			}	
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['ship_line'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['bl_no'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		if(!empty($c_row['ocean_frght']))
		echo $c_row['ocean_frght'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['pi_no'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
				if(!empty($c_row['unt_pr']))
		echo $c_row['unt_pr'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		if(!empty($c_row['tot_val']))		
		echo $c_row['tot_val'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['ack'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['invoice'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['dhl_awb_no'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		if(!strtotime($due) == '')
		{		echo $c_row['payment_due'];
		}		
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		 if(!strtotime($received) == '')
			{	echo $c_row['payment_recieve'];	
			}	
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['pay_term'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['ship_month'];
		echo "</td>";
		 
		echo "</tr>";
		++$num;
		}
		
		else
	    {
		echo "<tr align='center'>";
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
		$grade=explode('ZANCARB',$c_row['grade']);
		echo $grade[1];
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
		if(!strtotime($etd) == '')
			{	echo $c_row['etd'];
			}	
		echo "</td>";
		echo "<td>";
		if (!strtotime($eta) == '')		
			{	echo $c_row['eta'];
			}	
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
		if(!strtotime($due) == '')
		{		echo $c_row['payment_due'];
		}		
		echo "</td>";
		echo "<td>";
		 if(!strtotime($received) == '')
			{	echo $c_row['payment_recieve'];	
			}	
		echo "</td>";
		echo "<td>";
		echo $c_row['pay_term'];
		echo "</td>";
		echo "<td>";
		echo $c_row['ship_month'];
		echo "</td>";
		 
		echo "</tr>";
		++$num;
		} //close else
		}
		?>
        
      </tbody>  
                </table><br>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport4").battatech_excelexport({
                containerid: "tblExport4"
               , datatype: 'table'
               , encoding: "UTF-8"
            });
			
        });
    });
</script>