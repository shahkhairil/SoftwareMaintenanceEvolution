<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	
	<body>
		<div class="main-page">
			<div class="container-fluid">
				<div class="row page-title-div">
					<div class="col-md-6">
						<h2 class="title">Add Subject Combination</h2>
					</div>
				</div>

				<div class="row breadcrumb-div">
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li> Subjects</li>
                            <li class="active">Add Subject Combination</li>
                        </ul>
                    </div>
                </div>
			</div>

			<div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h5>Add Subject Combination</h5>
                                </div>
                            </div>
                            <div class="panel-body">
			</div>
			<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
<?php $sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Subject</label>
                                                        <div class="col-sm-10">
 <select name="subject" class="form-control" id="default" required="required">
<option value="">Select Subject</option>
<?php $sql = "SELECT * from tblsubjects";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SubjectName); ?></option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
		</div>
	</body>
</html>
