<TITLE>Sample HTML</TITLE>
                <hr>
        <?php
                if(!isset($_GET['name']))
                {
                        echo"No name!";
                }
                else
                {
                        echo"Hello, ".$_GET['name']."<br>"."Age".($_GET['age']-5
)."<br>";
                }
        ?>

<b> I would like to pass the course </b>
<table border = 1>
        <tr><th>ID</th><th>Name</th><th>Department</th><th>Salary</th>
        <tr><td>312351008</td><td>Shih Han Mo></td><td>Bio</td><td>5000000</td></tr>


<?php
                $link = mysqli_connect("localhost", "student", "student", "Practice");
                $query = "SELECT * from instructor where name like '%".$_GET['name']."%'"; #Blue make me see nothing

                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_row($result))
                {
                        echo "<tr>";
                        echo "<td>".$row[0]."</td><td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td><td>".$row[3]."</td>";
                        echo "</tr>";
                }
                        mysqli_close($link);

?>

</table>
