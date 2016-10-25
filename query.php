<html>
<head>
    <title>CS143 Project 1B</title>
     <meta charset="utf-8">
</head>
<body>
Type an SQL query in the following box: 
<p>
Example: <tt>SELECT * FROM Actor WHERE id=10;</tt><br />
<p>
<form action="query.php" method="GET">
<textarea name="query" cols="60" rows="8"></textarea><br />
<input type="submit" value="Submit" />
</form>
</p>
<p><small>Note: tables and fields are case sensitive. All tables in Project 1B are availale.</small>
</p>

<?php 
    $db = new mysqli('localhost', 'cs143', '', 'CS143');

    if($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    else 
    {
        $query = $_GET["query"];
        if ($query) 
        {
            $rs = $db->query($query);
            $fields = $rs->fetch_fields();

            echo "<table border=\"1\">";
            echo "<tr align=\"center\">";
            foreach ($fields as $f)
            {
                echo "<td><b> ".$f->name." </b></td>";
            }
            echo "</tr>";

            while($row = $rs->fetch_assoc()) 
            {
                echo "<tr align=\"center\">";
                foreach ($fields as $f)
                {
                    $val = $row[$f->name];
                    if (!$val)
                        $val = "N/A";
                    echo "<td> ".$val."</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
            $rs->free();
        }
    }
 ?>

</body>
</html>
