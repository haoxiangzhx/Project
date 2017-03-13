<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Soccer Land</title>

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
                <a class="navbar-brand" href="index.php">Soccer Land</a>
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
                                    <a href="I1.php">Add Player/Coach</a>
                                </li>
                                <li>
                                    <a href="I2.php">Add Team</a>
                                </li>
<!--                                 <li>
                                    <a href="I3.php">Add Review to Movie</a>
                                </li> -->
                                <li>
                                    <a href="I4.php">Add Player/Team Relation</a>
                                </li>
                                <li>
                                    <a href="I5.php">Add Coach/Team Relation</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-sunglasses fa-fw"></i> Browsing Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="B1.php">Show Player Information</a>
                                </li>
                                <li>
                                    <a href="B2.php">Show Team Information</a>
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
                    <h1 class="page-header">Add Coach/Team Relation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
<?php 
    include 'db.php';
    $did = $_GET["did"];
    $mid = $_GET["mid"];

    $didErr = $midErr = "";
    $error = false;
    if (isset($_GET["submit"])) {
        if (!$did) {
            $didErr = "<p class=\"text-danger\">* Please choose a director</p>";
            $error = true;
        }
        if (!$mid) {
            $midErr = "<p class=\"text-danger\">* Please choose a movie</p>";
            $error = true;
        }

        if (!$error)
        {
            echo "<div class=\"alert alert-success\"><strong>Success!</strong> The relation has been added to the database.</div>";

            function add_quotes($str)
            {
                return "\"".$str."\"";
            }

            $query = "insert into MovieDirector values(".$mid.", ".$did.");";

            // $rs = $db->query($query);
        }
    }
 ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Coach/Team Relation
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Coach:</label>
                                            <select class="form-control" name="did">
                                            <option selected disabled>Choose here</option>
<?php 
    $rs = $db->query("select id, last, first, dob from Director order by last, first;");
    while($row = $rs->fetch_assoc()) 
    {
        $id = $row["id"];
        $first = $row["first"];
        $last = $row["last"];
        $dob = $row["dob"];
        echo "<option value=\"".$id."\">".$first." ".$last."(".$dob.")</option>";
    }
 ?>
                                            </select>
                                            <span class="error"><?php echo $didErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Team:</label>
                                            <select class="form-control" name="mid">
                                            <option selected disabled>Choose here</option>
<?php 
    $rs = $db->query("select id, title, year from Movie order by title asc;");
    while($row = $rs->fetch_assoc()) 
    {
        $id = $row["id"];
        $title = $row["title"];
        $year = $row["year"];
        echo "<option value=\"".$id."\">".$title."(".$year.")</option>";
    }
 ?>
                                            </select>
                                            <span class="error"><?php echo $midErr;?></span>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
