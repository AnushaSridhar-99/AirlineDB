<?php
$ais = array(“A”,“B”,“E”,“C”,“D”);
$aisle = array(“E1”,“E2”,“E3”,“E4”,“E5”,“E6”,“E7”,“E8”,“E9”);
foreach($ais as $i){
$setnumber =mysql_query(“SELECT * FROM test where busid=’”.$b_id."’");
while($row= mysql_fetch_array($setnumber))
{
$k = array($row[‘1’]);
}
for ($x=1; $x<=10; $x++)
{
$seatno = $i.$x;
if(in_array($seatno,$aisle))
{
echo ‘<input type=“checkbox” disabled=“disabled” value="’.$seatno.’" class=“box’.$b_id.’” name=“seat” style=“width:18px; height:18px;” id="’.$fare.’" onclick=“getSum();” >’;
}
else if($seatno == $k)
{
echo ‘<input type=“checkbox” disabled=“disabled” value="’.$seatno.’" class=“box’.$b_id.’” name=“seat” style=“width:18px; height:18px; outline : 1px solid #ff0000; cursor:url(images/pen.png),auto; id="’.$fare.’" onclick=“getvalue’.$b_id.’();test’.$b_id.’(this);” >’;
}
else{
echo ‘<input type=“checkbox” value="’.$seatno.’" name=“seat”
style=“width:18px; height:18px; cursor:url(images/pen.png),auto; outline : 1px solid #009900;” class=“box’.$b_id.’” id="’.$fare.’" onclick=“getvalue’.$b_id.’();test’.$b_id.’(this);” >’;
}
}

}

?>