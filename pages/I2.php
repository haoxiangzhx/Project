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
                    <h1 class="page-header">Add new Movie</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add new Movie
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input class="form-control" name="company">
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input class="form-control" name="year">
                                        </div>
                                        <div class="form-group">
                                            <label>MPAA Rating</label>
                                            <select class="form-control" name="rate">
                                                <option value="G">G</option>
                                                <option value="NC-17">NC-17</option>
                                                <option value="PG">PG</option>
                                                <option value="PG-13">PG-13</option>
                                                <option value="R">R</option>
                                                <option value="surrendere">surrendere</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Genre:</label>
                                            <input type="checkbox" name="genre[]" value="Action">Action</input>
                                            <input type="checkbox" name="genre[]" value="Adult">Adult</input>
                                            <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
                                            <input type="checkbox" name="genre[]" value="Animation">Animation</input>
                                            <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
                                            <input type="checkbox" name="genre[]" value="Crime">Crime</input>
                                            <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
                                            <input type="checkbox" name="genre[]" value="Drama">Drama</input>
                                            <input type="checkbox" name="genre[]" value="Family">Family</input>
                                            <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
                                            <input type="checkbox" name="genre[]" value="Horror">Horror</input>
                                            <input type="checkbox" name="genre[]" value="Musical">Musical</input>
                                            <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
                                            <input type="checkbox" name="genre[]" value="Romance">Romance</input>
                                            <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
                                            <input type="checkbox" name="genre[]" value="Short">Short</input>
                                            <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
                                            <input type="checkbox" name="genre[]" value="War">War</input>
                                            <input type="checkbox" name="genre[]" value="Western">Western</input>
                                        </div>
                                        <button type="submit" class="btn btn-default">Add!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.panel-body-->
<?php
    include 'db.php';
    $title=$_GET["title"];
    $company=$_GET["company"];
    $year=$_GET["year"];
    $rate=$_GET["rate"];
    $genre=$_GET["genre"];

    echo $title." ".$company." ".$year." ".$rate." ";
    foreach ($genre as $key) {
        echo $key."<br />";
    }
?>

                    </div> 
                    <!--/.panel panel-default-->
                </div>
                <!-- /.col-lg-12 -->
            <div>

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
