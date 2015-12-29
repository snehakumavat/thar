<?php
include("include/database.php");
if(isset($_POST['cmp1']))
{
$name=trim($_POST['cmp1']);
$query2=mysql_query("SELECT * FROM clients WHERE comp_name LIKE '%$name%'");
echo "<ul class='search'>";
$count=1;
while($query3=mysql_fetch_array($query2))
{
if($count<=10)
{
?>

<li class="serch1" onclick='fill("<?php echo $query3['comp_name']; ?>")'>

<?php echo $query3['comp_name']; ?></li>
<?php
}
$count++;
}
}
?>
</ul>