<div id="dv" style="display:none;">

<?php
		  $c_qry_f="select * from client_po c,sub_po s where c.po_id=s.po_id ";
	     $c_res_f=mysql_query($c_qry_f);
		  ?>
		

        <table  id="tblExport2">
		<thead>
        <tr style="" >
        <th align="center" style="  background-color:#0099FF;  font-size:16px;">Indent Of</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Customer Id.</th>	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Final Destination</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Product </th>	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">QTY.</th>	
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Tentatively Date</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">PI NO.</th>
        </tr>
</thead>
   <tbody>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		if($c_row['job']==1)
		{
        echo "<tr  align='center' >";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['c_indent_of'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['c_id'];
		echo "</td>";       				
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['fd'];
		echo "</td>";     
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['grade'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['qnt'];
		echo "</td>";
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['t_s_date'];
		echo "</td>"; 
		echo "<td style='text-decoration:line-through;'>";
		echo $c_row['pi_no'];
		echo "</td>";
		
		echo "</tr>";
		}
		else
		{
		echo "<tr  align='center'>";
        echo "<td>";
		echo $c_row['c_indent_of'];
		echo "</td>";
		echo "<td>";
		echo $c_row['c_id'];
		echo "</td>";       				
		echo "<td>";
		echo $c_row['fd'];
		echo "</td>";     
		echo "<td>";
		echo $c_row['grade'];
		echo "</td>";
		echo "<td>";
		echo $c_row['qnt'];
		echo "</td>";
		echo "<td>";
		echo $c_row['t_s_date'];
		echo "</td>"; 
		echo "<td>";
		echo $c_row['pi_no'];
		echo "</td>";
		echo "</tr>";
		}
		}
		?>
        </tbody>
        </table>
		 </div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport2").battatech_excelexport({
                containerid: "tblExport2"
               , datatype: 'table'
               , encoding: "UTF-8"
            });
        });
    });
</script>  