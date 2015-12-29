<?php
//error_reporting(0);
include("session.php");
include("include/database.php");
?>

<?php
	if(isset($_REQUEST['c_id1']))
	{
		$c_d=$_REQUEST['c_id1'];		
		$c_del="delete from clients where c_id='$c_d'";
		$c_dres=mysql_query($c_del);
		if($c_dres)
		{
			header("location:clients.php?res=suc");
		}
		else
		{
			header("location:clients.php?res=er1");
		}
		
	}
?>



<html>
<head>
<title></title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script src="js/tableToExcel.js"></script>
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
	?>
    	 <br>         
         
		 <table class="emp_tab">
                <tr class="search_res" >
                <td class="info">Clients Details</td>
              <input type="button" onClick="tableToExcel('demo', 'W3C Example Table')" value="Export to Excel">

      
                </tr>
                </table>
				<br><br>      
<?php
  $c_qry_f="select * from clients ";
  $c_res_f=mysql_query($c_qry_f);
		
?>
        <table id="demo">
		 <thead>
        <tr>
        <th align="center">Company Name.</th>
		<th align="center">Company Abbr</th>
		<th align="center">Client Id</th>
		<th align="center">ContactPerson</th> 
		<th align="center">MobileNo</th>    
		<th align="center">Email1</th>
		 <th align='center'>Action</th> 
        
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
 echo "<td >";		
        echo "<a href='?c_id1=$c_row[0]' onclick='return confirmSubmit()'><img src='imgs1/green_delete.png' height='20px;'/></a>&nbsp;<a href='updateclients.php?c_id2=$c_row[0]'><img src='imgs1/updt.png' height='20px;'/></a>
		 <a href='clientsview.php?c_id3=$c_row[0]'><img src='imgs1/view.png'  /></a>&nbsp";
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
		col_6:'none',
		 themes: [{ name: 'skyblue' }],
        extensions:[{
            name: 'sort',
            types: [
                'string', 'string', 'string',
                'string','number', 'string','none'
            ]
        }]
    };

    var tf = new TableFilter('demo', filtersConfig);
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