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
	$c_qry_f="select * from clients order by c_id desc limit $start,$per_page";
	
	$c_res_f=mysql_query($c_qry_f);
		
?>
        <table class="emp_tab">
        <tr class="emp_header">
        <td width="260">Company Name.</td>
		<td>Company Abbr</td>
		<td>Client Id</td>
		<td width="">ContactPerson</td> 
		<TD width="">MobileNo</TD>    
		<td width=''>Email1</td>
		<!--<td width="">Address1</td>    
		<td width="">Address2</td>    	 	   
		<td width="">IEC</td>    
		<TD width="">PhoneNo</TD>    
		<td width=''>MobileNo.</td>	        			        
		<td width=''>Email2</td>	-->        
        <td width="80">Action</td>
        </tr>

        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr class='pagi'>";
		
        echo "<td width='200'>";
		echo $c_row['comp_name'];
		echo "</td>";
		echo "<td width=''>";
		echo $c_row['c_unq_code'];
		echo "</td>";
		echo "<td width=''>";
		echo $c_row['cmp_txt'];
		echo "</td>";
		
        echo "<td width=''>";
		echo $c_row['c_per'];
		echo "</td>";
				
				
		
		echo "<td width=' '>";
	    	if(!empty($c_row['c_mo']))
		    		echo $c_row['c_mo'];
		echo "</td>";
				
		echo "<td width=' '>";
		echo $c_row['c_email1'];
		echo "</td>";		
/*		echo "<td width=' '>";
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
*/		echo "<td >";		
        echo "<a href='?c_id1=$c_row[0]' onclick='return confirmSubmit()'><img src='imgs1/green_delete.png' height='20px;'/></a>&nbsp;<a href='updateclients.php?c_id2=$c_row[0]'><img src='imgs1/updt.png' height='20px;'/></a>
		 <a href='clientsview.php?c_id3=$c_row[0]'><img src='imgs1/view.png'  /></a>&nbsp";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
