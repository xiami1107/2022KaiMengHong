<?php

$con = mysqli_connect('localhost','root','','cpic2022');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT * FROM price order by short_price DESC limit 10");
$result1 = mysqli_query($con,"SELECT COUNT(short_price)  AS short_price FROM price");
$result2 = mysqli_query($con,"SELECT SUM(short_price) FROM price");
//$result = mysqli_query($con,"SELECT * FROM price ");
//$result = mysqli_query($con,$sql);

//echo "<table class=\"table-striped\">";
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
        echo "<tr class='text-blue'>";
        echo "<th width=\"15%\"><b>报单人数</b></th>";
        echo "<th width=\"25%\"><b>".$row1[0]."人</b></th>";
        echo "<th width=\"25%\"><b>首日保费累计</b></th>";
        echo "<th width=\"35%\"><b>".round($row2[0],1)."万元</b></th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th width=\"15%\">排名</th>";
        echo "<th width=\"25%\">中支</th>";
        echo "<th width=\"25%\">姓名</th>";
        echo "<th width=\"35%\">首日保费</th>";
        echo "</tr>";

        $x=0;
while($row = mysqli_fetch_array($result))
    {
        $x=$x+1;
        if($x<=3){
            echo
            "<tr class=\"text-ye lead\">
                <td><h3><b>" . $x ."</b></h3></td>
                <td><h3><b>" . $row['midium'] ."</b></h3></td>
                <td><h3><b>". $row['name'] ."</b></h3></td>
                <td><h3><b>". round($row['short_price'],1) ."万元</b></h3></td>
                </tr>";
        }
        else{
            echo
                "<tr class=\"lead\">
                <td><b>" . $x ."</b></td>
                <td><b>" . $row['midium'] ."</b></td>
                <td><b>". $row['name'] ."</b></td>
                <td><b>". round($row['short_price'],1) ."万元</b></td>
                </tr>";
         }

}


    //echo "<h1><span class=\"label label-primary\">" .$row['0'] . "</span></h1>";
    //echo "<tr><th>".$row['midium'] .\"-\". $row['name']</th><td>" . $row['1'] . "</td></tr>";
    //echo . $row['midium'] . "</td><td>" . $row['name'] .;
   // echo "<tr><th>Address</th><td>" . $row['midium'] . "</td></tr>";
    //echo "<tr><th>City</th><td>" . $row['City'] . "</td></tr>";
    //echo "<tr><th>PostalCode</th><td>" . $row['PostalCode'] . "</td></tr>";
    //echo "<tr><th>Country</th><td>" . $row['Country'] . "</td></tr>";

//echo "</table>";
mysqli_close($con);
?>
    
