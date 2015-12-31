<?php
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
	<script type="text/javascript">
	
	function confirmSubmit()
{
var agree=confirm("Are you sure to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}
</script>
	

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
	include("worksheetxport.php");
	?>
    	<br>
		 <table class="emp_tab">
                <tr class="search_res" >
                <td class="info">Job Worksheet Details</td>
			           </tr>
                </table>
       <br>
				<div>
        <button id="btnExport" style="background-color:#00CCFF; height:30px; font-family:'Times New Roman', Times, serif; font-size:15px;">Export table to Excel</button>
    </div>            
                
				
				<?php
				 $c_qry_f="select * from client_po c ,sub_po s where c.po_id=s.po_id order by c.po_id desc";
							$c_res_f=mysql_query($c_qry_f);
				$num=1;
		
?>
         <table id="demo3" style="margin-left:-80px;">
                 <thead>
				 <tr>
		<th align="center">SrNo.</th>
        <th align="center">Customer Name</th>		 	
		<th align="center">Final Destination</th>
		<th align="center">Product </th>	
		<th align="center">QTY.</th>	
		<th align="center">FCL</th>
		<th align="center">Tentatively Date</th>
		<th align="center">ETD</th>
		<th align="center">ETA</th>
		<th align="center">SHIPPING LINE</th>
		<th align="center">B/L_NO.</th>
		<th align="center">OCEAN FRIGHT</th>
		<th align="center">PI NO.</th>
		<th align="center">PRICE (USD)</th>
		<th align="center">AMOUNT</th>
		<th align="center">ACK</th>
		<th align="center">INVOICE NO.</th>
		<th align="center">DHL AWB NO.</th>
		<th align="center">PMT_DUE_DT</th>
		<th align="center">PMT_RCV_DT</th>
		<th align="center">TERMS</th>
		<th align="center">SHIPMENT MONTH</th>
		
         
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
       if($c_row['job']==1)
        echo "<tr  align='center' style='height:10px; text-decoration:line-through'>";
		else
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
		}
		?>
        
      </tbody>  
                </table><br>
   
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
      //  loader_html: '<div id="lblMsg"></div>',
        loader_css_class: 'myLoader',
        status_bar: true,
      //  status_bar_target_id: 'lblMsg',
	 // load_filters_on_demand: true,
        status_bar_css_class: 'myStatus',
        no_results_message: true,
		col_date_type: [
        null, null, null,
        null, null,null, 'dmy','dmy','dmy'
    ],
       col_0: 'none',
        col_1: 'select',
        col_2: 'select',
		col_3: 'select',
        col_4: 'select',
        //col_5: 'select',
		//col_6: 'select',date
       // col_7: 'select',
       // col_8: 'select',
		col_9: 'select',
        col_10: 'select',
       // col_11: 'select',
		col_12: 'select',
       // col_13: 'select',
       // col_14: 'select',
		//col_15: 'select',
        col_16: 'select',
        col_17: 'select',
		col_18: '',
        col_19: '',
        col_20: 'select',
		col_21: 'select',
		col_width:['50px', '120px', '120px',
            '40px', '40px', '30px',
            '80px', '80px', '80px',
			'120px', '120px', '40px',
			'120px', '60px', '80px',
			'40px', '120px', '120px',
			'80px', '80px', '100px',
			'100px'],
 		linked_filters: true, 
		themes: [{ name: 'skyblue' }],		 
        extensions:[{
            name: 'sort',
			types: [
               'number', 'string', 'string', 'string','number','number','string',
                'string', 'string','string','string','string','string','string',
				'string','string','string','string','string','string','string','string'
            ]
             
        }]
    };

    var tf = new TableFilter('demo3',filtersConfig);
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
