<?php
session_start();
error_reporting( 0 );
include( 'includes/config.php' );
if ( strlen( $_SESSION['alogin'] ) == "" ) {

    header( "Location: index.php" );

} else {
    if ( isset( $_POST['submit'] ) ) {
        
        $id = $_POST['id'];
        $username = $_POST['username'];
        $pwd = md5( $_POST['pwd'] );

        $sql = "INSERT INTO admin (id, UserName, Password) VALUES (:id, :username, :pwd);";
        $query = $dbh->prepare( $sql );
        $query->bindParam( ':id', $id, PDO::PARAM_STR );
        $query-> bindParam( ':username', $username, PDO::PARAM_STR );
        $query-> bindParam( ':pwd', $pwd, PDO::PARAM_STR );

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ( $lastInsertId ) {
            $msg = "Admin info added successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }

    }
    ?>
    <!DOCTYPE html>
    <html lang = "en">
    <head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <title>SMS Admin| Add Admin< </title>
    <link rel = "stylesheet" href = "css/bootstrap.min.css" media = "screen" >
    <link rel = "stylesheet" href = "css/font-awesome.min.css" media = "screen" >
    <link rel = "stylesheet" href = "css/animate-css/animate.min.css" media = "screen" >
    <link rel = "stylesheet" href = "css/lobipanel/lobipanel.min.css" media = "screen" >
    <link rel = "stylesheet" href = "css/prism/prism.css" media = "screen" >
    <link rel = "stylesheet" href = "css/select2/select2.min.css" >
    <link rel = "stylesheet" href = "css/main.css" media = "screen" >
    <script src = "js/modernizr/modernizr.min.js"></script>
    </head>
    <body class = "top-navbar-fixed">
    <div class = "main-wrapper">

    <!-- ===  ===  ===  = TOP NAVBAR ===  ===  ===  = -->
    <?php include( 'includes/topbar.php' );
    ?>
    <!-- ===  ===  ===  = WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ===  ===  ===  = -->
    <div class = "content-wrapper">
    <div class = "content-container">

    <!-- ===  ===  ===  = LEFT SIDEBAR ===  ===  ===  = -->
    <?php include( 'includes/leftbar.php' );
    ?>
    <!-- /.left-sidebar -->

    <div class = "main-page">

    <div class = "container-fluid">
    <div class = "row page-title-div">
    <div class = "col-md-6">
    <h2 class = "title">Add Admin</h2>

    </div>

    <!-- /.col-md-6 text-right -->
    </div>
    <!-- /.row -->
    <div class = "row breadcrumb-div">
    <div class = "col-md-6">
    <ul class = "breadcrumb">
    <li><a href = "dashboard.php"><i class = "fa fa-home"></i> Home</a></li>

    <li class = "active">Add Admin</li>
    </ul>
    </div>

    </div>
    <!-- /.row -->
    </div>
    <div class = "container-fluid">

    <div class = "row">
    <div class = "col-md-12">
    <div class = "panel">
    <div class = "panel-heading">
    <div class = "panel-title">
    <h5>Enter Admin Info</h5>
    </div>
    </div>
    <div class = "panel-body">
    <?php if ( $msg ) {
        ?>
        <div class = "alert alert-success left-icon-alert" role = "alert">
        <strong>Well done!</strong><?php echo htmlentities( $msg );
        ?>
        </div><?php } else if ( $error ) {
            ?>
            <div class = "alert alert-danger left-icon-alert" role = "alert">
            <strong>Oh snap!</strong> <?php echo htmlentities( $error );
            ?>
            </div>
            <?php }
            ?>
            <form class = "form-horizontal" method = "post">

            <div class = "form-group">
            <label for = "default" class = "col-sm-2 control-label">Id</label>
            <div class = "col-sm-10">
            <input type = "text" name = "id" class = "form-control" id = "id" maxlength = "2" required = "required" autocomplete = "off">
            <span class = "help-block">Please input unused ID from database only</span>
            </div>
            </div>

            <div class = "form-group">
            <label for = "default" class = "col-sm-2 control-label">Username</label>
            <div class = "col-sm-10">
            <input type = "text" name = "username" class = "form-control" id = "username" required = "required" autocomplete = "off">
            </div>
            </div>

            <div class = "form-group">
            <label for = "default" class = "col-sm-2 control-label">Password</label>
            <div class = "col-sm-10">
            <input type = "password" name = "pwd" class = "form-control" required = "required" id = "success">
            </div>
            </div>

            <!--
            <div class = "form-group has-success">
            <label for = "success" class = "control-label">Password</label>
            <div class = "">
            <input type = "password" name = "password" class = "form-control" required = "required" id = "success">
            </div>
            </div>
             -->

            <div class = "form-group">
            <div class = "col-sm-offset-2 col-sm-10">
            <button type = "submit" name = "submit" class = "btn btn-primary">Add</button>
            </div>
            </div>
            </form>

            </div>
            </div>
            </div>
            <!-- /.col-md-12 -->
            </div>
            </div>
            </div>
            <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
            </div>
            <!-- /.main-wrapper -->
            <script src = "js/jquery/jquery-2.2.4.min.js"></script>
            <script src = "js/bootstrap/bootstrap.min.js"></script>
            <script src = "js/pace/pace.min.js"></script>
            <script src = "js/lobipanel/lobipanel.min.js"></script>
            <script src = "js/iscroll/iscroll.js"></script>
            <script src = "js/prism/prism.js"></script>
            <script src = "js/select2/select2.min.js"></script>
            <script src = "js/main.js"></script>
            <script>
            $( function( $ ) {
                $( ".js-states" ).select2();
                $( ".js-states-limit" ).select2( {
                    maximumSelectionLength: 2
                }
            );
            $( ".js-states-hide" ).select2( {
                minimumResultsForSearch: Infinity
            }
        );
    }
);
</script>
</body>
</html>
<?PHP }
?>
