<div id="dv" style="display:none;">
 <?php
		$c_qry_f="select * from client_po";
		$c_res_f=mysql_query($c_qry_f);
?>
<table id="tblExport1" border="1">
		<thead>
        <tr >
        <th align="center" style="  background-color:#0099FF;  font-size:16px;">Indent Of</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Customer Id.</th>	
        <th align="center" style="  background-color:#0099FF;  font-size:16px;"> PT Ref No:</th>        
       
        </tr>
</thead>
<tbody>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr align='center'>";
        echo "<td>";
		echo $c_row['c_indent_of'];
 		echo "</td>";
        
		echo "<td>";
		echo $c_row['c_id'];
 		echo "</td>";
		echo "<td>";
		echo $c_row['pet_ref'];
 					
        echo "</tr>";
		}
		?>
		</tbody>
		</table>
 </div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport1").battatech_excelexport({
                containerid: "tblExport1"
               , datatype: 'table'
               , encoding: "UTF-8"
            });
        });
    });
</script>  