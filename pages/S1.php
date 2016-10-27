<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CS143 Project 1C</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CS143 Project 1C</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Input Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="I1.php">Add Actor/Director</a>
                                </li>
                                <li>
                                    <a href="I2.php">Add Movie</a>
                                </li>
                                <li>
                                    <a href="I3.php">Add Review to Movie</a>
                                </li>
                                <li>
                                    <a href="I4.php">Add Actor/Movie Relation</a>
                                </li>
                                <li>
                                    <a href="I5.php">Add Director/Movie Relation</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-sunglasses fa-fw"></i> Browsing Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="B1.php">Show Actor Information</a>
                                </li>
                                <li>
                                    <a href="B2.php">Show Movie Information</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="S1.php"><i class="fa fa-search fa-fw"></i> Search</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Search Page</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
<?php
    include 'db.php';
    $search = $_GET["search"];

    $searchErr="";
    $error = false;
    if (isset($_GET["submit"])) {
        if (!$search) {
            $searchErr = "<p class=\"text-danger\">* Please enter a keyword</p>";
            $error = true;
        }
    }
?>                    

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label>Search:</label>
                                            <input class="form-control" placeholder="Search..." name="search">
                                            <span class="error"><?php echo $searchErr;?></span>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
    if(isset($_GET["submit"])){
        if(!$error){
            $keys = explode(" ",$search);
            $cannotQuery = false;
            if(count($keys) > 2){
                $cannotQuery = true;
            }
            else{
                $query = "select id, first, last, dob from Actor where ";
                if(count($keys) == 1){
                    $query .= "last like '%".$keys[0]."%' or first like '%".$keys[0]."%';";
                }
                elseif (count($keys) == 2) {
                    $query .= "(last like '%".$keys[0]."%' and first like '%".$keys[1]."%') or (last like '%".$keys[1]."%' and first like '%".$keys[0]."%');";
                }
                //echo $query;
            }
            $part1 = "<div class=\"col-lg-12\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            Matching Actors are:
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table\">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
            $part2 = "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>";
            $rs = $db->query($query);
            
            echo $part1;
            if(!$cannotQuery){

                $i = 1;
                while($row = $rs->fetch_assoc()) 
                {
                    $id = $row['id'];
                    $last = $row['last'];
                    $first = $row['first'];
                    $dob = $row['dob'];
                    echo "<tr><td>".$i++."</td><td><a href=\"B1.php?aid=$id&submit=\">".$first." ".$last."</a></td><td><a href=\"B1.php?aid=$id&submit=\">".$dob."</a></td></tr>";
                }
                
            }
            echo $part2;
        }
    }
?>

<?php 
    if(isset($_GET["submit"])){
        if(!$error){
            $keys = explode(" ",$search);
            $query = "select id, title, year from Movie where title like '%".$keys[0]."%' ";
            for ($i=1; $i < count($keys); $i++) { 
                $query .="and title like '%".$keys[$i]."%' ";
            }
            $query .=";";
            //echo $query;
                
            $part1 = "<div class=\"col-lg-12\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            Matching Movies are:
                        </div>
                        <div class=\"panel-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table\">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
            $part2 = "</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>";
            $rs = $db->query($query);
            
            echo $part1;

            $i = 1;
            while($row = $rs->fetch_assoc()) 
            {
                $id = $row['id'];
                $title = $row['title'];
                $year = $row['year'];
                echo "<tr><td>".$i++."</td><td><a href=\"B2.php?mid=$id&submit=\">".$title."</a></td><td><a href=\"B2.php?mid=$id&submit=\">".$year."</a></td></tr>";
            }
                
            echo $part2;
        }
    }
?>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
