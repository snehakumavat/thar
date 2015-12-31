<div id="dv" style="display:none;">
<?php
  $c_qry_f="select * from clients ";
  $c_res_f=mysql_query($c_qry_f);
		
?>
        <table id="tblExport" border="1">
		 <thead>
        <tr>
        <th align="center" style="  background-color:#0099FF;  font-size:16px;" >Company Name.</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Company Abbr</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Client Id</th>
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">ContactPerson</th> 
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">MobileNo</th>    
		<th align="center" style="  background-color:#0099FF;  font-size:16px;">Email1</th>
		   </tr>
</thead>
   <tbody>
        <?php
		 
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr align='center' >";
		
        echo "<td >";
		echo $c_row['comp_name'];
		echo "</td>";
		echo "<td >";
		echo $c_row['cmp_txt'];
		echo "</td>";
		echo "<td >";
		echo $c_row['c_unq_code'];
		echo "</td>";
		
        echo "<td >";
		echo $c_row['c_per'];
		echo "</td>";
				
				
		
		echo "<td>";
	    	if(!empty($c_row['c_mo']))
		    echo $c_row['c_mo'];
		echo "</td>";
				
		echo "<td>";
		echo $c_row['c_email1'];
		echo "</td>";		
   
		echo "</tr>";
		}
		?>

    </tbody>
</table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#tblExport").battatech_excelexport({
                containerid: "tblExport"
               , datatype: 'table'
               , encoding: "UTF-8"
            });
			
        });
    });
</script>