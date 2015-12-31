<?php
ob_start();
error_reporting(0);
include("session.php");
include("include/database.php");

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
<script type="text/javascript" src="js/jquery.battatech.excelexport.js"></script>
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
	include("jobexcel.php");
	?>
    	
        <br>                
                
				<table class="emp_tab">
                <tr class="search_res" >
                <td class="info">Add Job purches Order Details</td>
                  </tr>
                </table>
				<br><br>
				
				 <br><br>   
				<div>
        <button id="btnExport" style="background-color:#00CCFF; height:30px; font-family:'Times New Roman', Times, serif; font-size:15px;">Export table to Excel</button>
    </div>    
          <?php
		  $c_qry_f="select * from client_po c,sub_po s where c.po_id=s.po_id ";
	     $c_res_f=mysql_query($c_qry_f);
		  ?>
		

        <table  id="demo2">
		<thead>
        <tr >
        <th align="center">Indent Of</th>
		<th align="center">Customer Id.</th>	
		<th align="center">Final Destination</th>
		<th align="center">Product </th>	
		<th align="center">QTY.</th>	
		<th align="center">Tentatively Date</th>
		<th align="center">PI NO.</th>
        <th align="center">Action</th>
        </tr>
</thead>
   <tbody>
        <?php
		while($c_row=mysql_fetch_array($c_res_f))
		{
		if($c_row['job']==1)
        echo "<tr  align='center' style='height:10px; text-decoration:line-through'>";
		else
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
		echo "<td>";
			echo "<a href='add_job.php?sub_po_id=$c_row[sub_po_id]'><input type='button' value='Add Job'></a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        </tbody>
        </table>
   
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
		  help_instructions: false,
        rows_counter: true,
        loader: true,
        loader_html: '<div id="lblMsg"></div>',
        loader_css_class: 'myLoader',
        status_bar: true,
        status_bar_target_id: 'lblMsg',
        status_bar_css_class: 'myStatus',
        no_results_message: true,
		linked_filters: true,
		col_0: 'select',
        col_1: 'select',
        col_2: 'select',
		col_3: 'select',		
		col_5: 'select',
		col_6: 'select',
		col_7: '-',
		  themes: [{ name: 'skyblue' }],		 
        extensions:[{
            name: 'sort',
            types: [
                'string', 'string','string',
                'string','number','string',
				'string','string'
           		 ]
        }]
    };

    var tf = new TableFilter('demo2', filtersConfig);
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
<!-- -->
               
</body>
</html>
