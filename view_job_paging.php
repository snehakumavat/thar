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
	
		
?>
        <table class="emp_tab">
        <tr class="emp_header">
        <td width="250">Indent Of</td>
		<td>Customer Id.</td>	
		<td>Final Destination</td>
		<td>Product </td>	
		<td>QTY.</td>	
		<td>Tentatively Date</td>
		<td>PI NO.</td>
        <td width="340">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='pagi'>";
        echo "<td width='250'>";
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
        echo "<td class='print'>";
		echo "<a href='add_job.php?sub_po_id=$c_row[sub_po_id]'><input type='button' value='Add Job'></a>";

		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
