<?php
error_reporting(0);
include("session.php");
include("include/database.php");
?>

<?php
	if(isset($_REQUEST['po_id1']))
	{
		$c_d=$_REQUEST['po_id1'];		
		$g_gatepas="delete from client_po where po_id='$c_d'";
		$query1=mysql_query($g_gatepas);
		$g_des="delete from sub_po where po_id='$c_d'";
		$query2=mysql_query($g_des);
		
		if($query2)
		{
			header("location:viewpo.php?res=suc");
		}
		else
		{
			header("location:viewpo.php?res=er1");
		}
		
	}
?>

<html>
<head>
<title></title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
	
	function confirmSubmit()
{
var agree=confirm("Are you sure to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}	</script>
 <link rel="stylesheet" type="text/css" href="dist/tablefilter/style/tablefilter.css" />
<style type="text/css">
    body{
        font-family: Helvetica, arial, nimbussansl, liberationsans, freesans,
            clean, sans-serif;
        padding: 0 1em;
    }
	 
   
    .panel{
        float: left;
        background: #F7F7F7 none repeat scroll 0% 0%;
        width: 250px;
        margin-right: 2em;
        padding: 1em;
    }
</style>

    <style type="text/css">
        /**
         * Custom styles
         */
        .myLoader{
            position:absolute; padding: 5px;
            margin:100px 0 0 5%; width:auto;
            z-index:1000; font-size:12px; font-weight:bold;
            border:1px solid #666; background:#ffffcc;
            vertical-align:middle;
        }
        .myStatus{
            width:auto; display:block;
        }
    </style>
	



</head>

<body>
<div id="container">
<div id="sub-header">	
    <?php
	include("header.php");
	$csv_hdr ="Indent Of,Customer Id,PET Ref No.";
		 $csv_output="";
	?>
    	
        <br />                
                <form action="" method="post" name="search">
				<table class="emp_tab">
                <tr class="search_res" >
                <td class="info">purches Order Details</td>
                    </tr>
                </table>
                </form>
                
            <?php
			$c_qry_f="select * from client_po";
	
	$c_res_f=mysql_query($c_qry_f);
		
?>
        <table id="demo4">
		<thead>
        <tr >
        <th align="center">Indent Of</th>
		<th align="center">Customer Id.</th>	
        <th align="center"> PT Ref No:</th>        
        <th align="center">Action</th>
        </tr>
</thead>
<tbody>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
        echo "<tr align='center'>";
        echo "<td>";
		echo $c_row['c_indent_of'];
		 $csv_output .=  $c_row['c_indent_of'].',';
		echo "</td>";
        
		echo "<td>";
		echo $c_row['c_id'];
		 $csv_output .=  $c_row['c_id'].',';
		echo "</td>";
		echo "<td>";
		echo $c_row['pet_ref'];
		 $csv_output .=  $c_row['pet_ref']."\n";
					
        echo "<td width='100'>";
		echo "<a href='?po_id1=$c_row[0]' onclick='return confirmSubmit()'><img src='imgs1/green_delete.png' width='16' height='16' /></a>&nbsp;";
		echo "<a href='po_doc.php?id=$c_row[0]' target='_blank'><img src='imgs1/view.png'/></a>&nbsp;";
		echo"<a href='updatepo.php?po_id=$c_row[0]'><img src='imgs1/updt.png' width='16' height='16' /></a>&nbsp;";

		echo "</td>";
		echo "</tr>";
		}
		?>
		</tbody>
		</table>
   
   
    
	<form name="export" action="export.php" method="post">
    <input type="submit" value="Export table to Excel">
    <input type="hidden" value="<?php echo $csv_hdr; ?>" name="csv_hdr">
    <input type="hidden" value="<?php echo $csv_output; ?>" name="csv_output">
</form>
</div>
</div>
<script src="dist/tablefilter/tablefilter.js"></script>
<script data-config>
    var filtersConfig = {
        base_path: 'dist/tablefilter/',
        paging: true,
        results_per_page: ['Records: ', [10,25,50,100]],
        remember_grid_values: true,
        remember_page_number: true,
        remember_page_length: true,
        alternate_rows: true,
        btn_reset: true,
        rows_counter: true,
        loader: true,
        loader_html: '<div id="lblMsg"></div>',
        loader_css_class: 'myLoader',
        status_bar: true,
        status_bar_target_id: 'lblMsg',
        status_bar_css_class: 'myStatus',
        no_results_message: true,
        col_0: 'select',
        col_1: 'select',
        col_2: 'select',
		col_3:'none',
		 themes: [{ name: 'skyblue' }],
        extensions:[{
            name: 'sort',
            types: [
                'string', 'string', 'string',
                'none'
            ]
        }]
    };

    var tf = new TableFilter('demo4', filtersConfig);
    tf.init();

</script>


<!--
    DO NOT COPY: NOT PART OF TABLEFILTER
-->
<script>
    var configs = document.querySelectorAll('script[data-config]');
    var pre = document.body.getElementsByTagName('pre')[0];

    [].forEach.call(configs, function(config) {
        if(pre){
            pre.innerHTML +=
                config.innerHTML.replace('<', '&lt;').replace('>', '&gt;');
        }
    });
</script>
</body>
</html>
