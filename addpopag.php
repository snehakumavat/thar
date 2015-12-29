<?php
include("include/database.php");
error_reporting(0);
include("session.php");
$per_page = 20; 

if($_GET)
{
$page=$_GET['page'];

}
	
	$start = ($page-1)*$per_page;
	$c_qry_f="select * from clients order by c_id desc limit $start,$per_page";
	$c_res_f=mysql_query($c_qry_f);
	
?>


        <table class="emp_tab">
        <tr class="emp_header">
        <td width="260">Company Name.</td>
		<td width="">Address1</td>    
	 	<td width="">ContactPerson</td>    
		<td width="">IEC</td>    
		<TD width="">PhoneNo</TD>    
		<td width=''>MobileNo.</td>	        
		<td width=''>Email1</td>	        
		<td width=''>Email2</td>	

        <td width="100">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{                                                                                                                        
			
        echo "<tr class='pagi'>";
        echo "<td width='200'>";
		echo $c_row[1];
		echo "</td>";
        echo "<td width='350'>";
		echo $c_row[2];
		echo "</td>";			
		echo "<td width=' '>";
		echo $c_row[4];
		echo "</td>";		
		echo "<td width=' '>";
		echo $c_row[5];
		echo "</td>";		
		echo "<td width=' '>";
		echo $c_row[6];
		echo "</td>";		
		echo "<td width=' '>";
		echo $c_row[7];
		echo "</td>";		
		echo "<td width=' '>";
		echo $c_row[8];
		echo "</td>";		
		echo "<td>";
		echo $c_row[9];	
		echo "</td>";
		
        echo "<td width='100'class='print'>";
		echo "<a href='po.php?c_id2=$c_row[0]'><img src='imgs1/create.png'/></a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
