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
                    <h1 class="page-header">Add Team</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
<?php
    include 'db.php';
    $title=$_GET["title"];
    $company=$_GET["company"];
    $year=$_GET["year"];
    $rate=$_GET["rate"];

    $titleErr = $companyErr = $yearErr = $rateErr = "";
    $error = false;
    if(isset($_GET["submit"])){
        if(!$title){
            $titleErr = "<p class=\"text-danger\">* Title is required</p>";
            $error = true;
        }
        if(!$company){
            $companyErr = "<p class=\"text-danger\">* Company name is required</p>";
            $error = true;
        }
        if(!$year){
            $yearErr = "<p class=\"text-danger\">* Year is required</p>";
            $error = true;
        }
        if(!$rate){
            $rateErr = "<p class=\"text-danger\">* MPAA Rating is required</p>";
            $error = true;
        }

        if(!$error){
            echo "<div class=\"alert alert-success\"><strong>Success!</strong> ".$title." has been added to the database.</div>";

            $db->query("update MaxMovieID set id = id+1");
            $res=$db->query("select * from MaxMovieID");
            $row=$res->fetch_assoc();
            $id=$row['id'];

            function add_quotes($str){
                return "\"".$str."\"";
            }

            $query = "insert into Movie values(".$id.", ".add_quotes($title).", ".$year.", ".add_quotes($rate).", ".add_quotes($company).");";
            //echo $query;
            $rs = $db->query($query);

            if($_GET["genre"]){
                foreach ($_GET["genre"] as $g) {
                    $db->query("insert into MovieGenre values(".$id.", ".add_quotes($g).");");
                }
            }                    
        }
    }
    //get genres
    // $genres=array();
    // if(isset($_GET["genre"])){
    //     foreach ($_GET["genre"] as $g) {
    //         array_push($genres, $g);
    //     }
    // }

    // $midQuery = "SELECT id FROM MaxMovieID";
    // $midGet = $db->query($midQuery);
    // $midFinal = $midGet->fetch_row($midGet);    
    // $mid = $midFinal[0];
    // print_r($midGet);
    // print_r($genres);

    // echo $title." ".$company." ".$year." ".$rate." ";
    // foreach ($genre as $key) {
    //     echo $key."<br />";
    // }

?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add new Team
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Country:</label>
                                            <input class="form-control" name="title">
                                            <span class="error"><?php echo $titleErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>League:</label>
                                            <input class="form-control" name="company">
                                            <span class="error"><?php echo $companyErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Year founded:</label>
                                            <input class="form-control" name="year">
                                            <span class="error"><?php echo $yearErr;?></span>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>MPAA Rating:</label>
                                            <select class="form-control" name="rate">
                                                <option value="G">G</option>
                                                <option value="NC-17">NC-17</option>
                                                <option value="PG">PG</option>
                                                <option value="PG-13">PG-13</option>
                                                <option value="R">R</option>
                                                <option value="surrendere">surrendere</option>
                                            </select>
                                            <span class="error"><?php echo $rateErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Genre:</label>
                                            <select multiple class="form-control" name="genre[]">
                                                <option value="Action">Action</option>
                                                <option value="Adult">Adult</option>
                                                <option value="Adventure">Adventure</option>
                                                <option value="Animation">Animation</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Crime">Crime</option>
                                                <option value="Documentary">Documentary</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Family">Family</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Musical">Musical</option>
                                                <option value="Mystery">Mystery</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Sci-Fi">Sci-Fi</option>
                                                <option value="Short">Short</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="War">War</option>
                                                <option value="Western">Western</option>
                                            </select>
                                        </div> -->
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/.panel-body-->

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
