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
                    <h1 class="page-header">Add Actor/Director</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
<?php 
    include 'db.php';
    $first = $_GET["first"];
    $last = $_GET["last"];
    $occupation = $_GET["occupation"];
    $sex = $_GET["sex"];
    $dob = $_GET["dob"];
    $dod = $_GET["dod"];

    $firstErr = $lastErr = $occupationErr = $sexErr = $dobErr = "";
    $error = false;
    if (isset($_GET["submit"])) {
        if (!$first) {
            $firstErr = "<p class=\"text-danger\">* First name is required</p>";
            $error = true;
        }
        if (!$last) {
            $lastErr = "<p class=\"text-danger\">* Last name is required</p>";
            $error = true;
        }
        if (!$occupation) {
            $occupationErr = "<p class=\"text-danger\">* Occupation is required</p>";
            $error = true;
        }
        if (!$sex) {
            $sexErr = "<p class=\"text-danger\">* Gender is required</p>";
            $error = true;
        }
        if (!$dob) {
            $dobErr = "<p class=\"text-danger\">* Date of birth is required</p>";
            $error = true;
        }

        if (!$error)
        {
            echo "<div class=\"alert alert-success\"><strong>Success!</strong> ".$first." ".$last." has been added to the database.</div>";

            $db->query("update MaxPersonID set id = id+1;");
            $rs = $db->query("select * from MaxPersonID;");
            $row = $rs->fetch_assoc();
            $id = $row['id'];

            function add_quotes($str)
            {
                return "\"".$str."\"";
            }

            $query = "insert into ".$occupation." values(".$id.", ".add_quotes($last).", ".add_quotes($first).", ".add_quotes($sex).", ".add_quotes($dob).", ";
            if ($dod != "")
            {
                echo "$dod";
                $query .= add_quotes($dod).");";
            }
            else
            {
                $query .= "null);";
            }
            $rs = $db->query($query);
        }
    }
 ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Actor/Director
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="occupation" value="Actor">Actor
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="occupation" value="Director">Director
                                            </label>
                                            <span class="error"><?php echo $occupationErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="first">
                                            <span class="error"><?php echo $firstErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="last">
                                            <span class="error"><?php echo $lastErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="Male">Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="Female">Female
                                            </label>
                                            <span class="error"><?php echo $sexErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth(YYYY-MM-DD)</label>
                                            <input class="form-control" name="dob">
                                            <span class="error"><?php echo $dobErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Death(YYYY-MM-DD)</label>
                                            <input class="form-control" name="dod">
                                            <p class="help-block">Please leave blank if alive.</p>
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
