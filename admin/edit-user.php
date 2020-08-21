<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {
	
	$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];
$batch=$_POST['batch'];
$mobileno=$_POST['mobileno'];
$prefa=$_POST['pref1'];
$prefb=$_POST['pref2'];
$prefc=$_POST['pref3'];
$prefd=$_POST['pref4'];
$why=$_POST['why'];
$text=$_POST['text'];

	$sql="UPDATE users SET name=(:name), email=(:email), branch=(:branch), batch=(:batch), mobile=(:mobileno), prefa=(:prefa), prefb=(:prefb), prefc=(:prefc), prefd=(:prefd), why=(:why), text=(:text) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':branch', $branch, PDO::PARAM_STR);
$query-> bindParam(':batch', $batch, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> bindParam(':prefa', $prefa, PDO::PARAM_STR);
$query-> bindParam(':prefb', $prefb, PDO::PARAM_STR);
$query-> bindParam(':prefc', $prefc, PDO::PARAM_STR);
$query-> bindParam(':prefd', $prefd, PDO::PARAM_STR);
$query-> bindParam(':why', $why, PDO::PARAM_STR);
$query-> bindParam(':text', $text, PDO::PARAM_STR);
	$query->execute();
	$msg="Information Updated Successfully";
}    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Edit User</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
<?php
		$sql = "SELECT * from users where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Edit User : <?php echo htmlentities($result->name); ?></h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
<div class="form-group">
<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name);?>">
</div>
<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="email" name="email" class="form-control" required value="<?php echo htmlentities($result->email);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Branch<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="branch" class="form-control" required value="<?php echo htmlentities($result->branch);?>">
</div>
<label class="col-sm-2 control-label">Batch<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="email" name="batch" class="form-control" required value="<?php echo htmlentities($result->batch);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Mobile No.<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="mobileno" class="form-control" required value="<?php echo htmlentities($result->mobile);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Pref 1<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
							<option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Credit Manager">Credit Manager</option>
                            <option value="Technical">Technical Support</option>
                            </select>
</div>
<label class="col-sm-2 control-label">Pref 2<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
							<option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Credit Manager">Credit Manager</option>
                            <option value="Technical">Technical Support</option>
                            </select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Pref 3<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
							<option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Credit Manager">Credit Manager</option>
                            <option value="Technical">Technical Support</option>
                            </select>
</div>
<label class="col-sm-2 control-label">Pref 4<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
							<option value="">Select</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Co Designer">Co Designer</option>
                            <option value="Public">Public Relations</option>
                            <option value="Student">Student Rep</option>
                            <option value="Programme Coordinator">Programme Coordinator</option>
                            <option value="Registration">Registration</option>
                            <option value="Credit Manager">Credit Manager</option>
                            <option value="Technical">Technical Support</option>
                            </select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Why ISTE<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="why" class="form-control" required value="<?php echo htmlentities($result->why);?>">
</div>
<label class="col-sm-2 control-label">Text<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="text" class="form-control" required value="<?php echo htmlentities($result->text);?>">
</div>
</div>

</div>
</div>


<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?php } ?>