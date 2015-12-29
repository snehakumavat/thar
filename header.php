
<div id="nav">
     <ul class="sf-menu dropdown">
        	
        	 
                      
            <li><a class="has_submenu" href="clients.php">Client</a>
            	<ul>
                	<li><a href="addclients.php">Add Clients</a></li>
            		<li><a href="viewpo.php">Client PO</a>
					 <ul>
					 <li><a href="po.php">Add PO</a></li>
					 </ul>
					</li>
					<li><a href="weeksheet.php"> Weekly Sheet</a></li>
            		                  
                </ul>
                                 
                 <li>
				 <a class="has_submenu" href="job_worksheet.php">Job WorkSheet</a>
				 <ul>
				 <li><a href="view_job.php">View Job</a>
				 
				 </li>
				 </ul>
                               
           <li>
           <a class="has_submenu" href="logout.php">logout</a>
           </li> 
           <li>
           <?php
 if(isset($_SESSION['uname']) && isset($_SESSION['password']))
{
	echo '<h4 style="color:#000;margin-left:20px;margin-top:12px;">Welcome: '.$_SESSION['uname'].'</h4>';
}
 ?></li>
                          
        </ul>
  
</div>
