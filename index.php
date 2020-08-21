<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

// $file = $_FILES['image']['name'];
// $file_loc = $_FILES['image']['tmp_name'];
// $folder="images/"; 
// $new_file_name = strtolower($file);
// $final_file=str_replace(' ','-',$new_file_name);

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



// echo("$name,$email,$branch,$batch,$mobileno,$prefa,$prefb,$prefc,$prefd,$why,$text");

// if(move_uploaded_file($file_loc,$folder.$final_file))
// 	{
// 		$image=$final_file;
//     }
// $notitype='Create Account';
// // $reciver='Admin';
//  $sender=$email;

    
$sql ="INSERT INTO `users`(`name`, `email`, `branch`, `batch`, `mobile`, `prefa`, `prefb`, `prefc`, `prefd`, `why`, `text`, `status`) VALUES (:name, :email, :branch, :batch, :mobileno, :prefa, :prefb, :prefc, :prefd, :why, :text, 0)";
$query= $dbh -> prepare($sql);
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
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

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

    <link rel="stylesheet" href="css/trial.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">

// 	function validate()
//         {
//             var extensions = new Array("jpg","jpeg");
//             var image_file = document.regform.image.value;
//             var image_length = document.regform.image.value.length;
//             var pos = image_file.lastIndexOf('.') + 1;
//             var ext = image_file.substring(pos, image_length);
//             var final_ext = ext.toLowerCase();
//             for (i = 0; i < extensions.length; i++)
//             {
//                 if(extensions[i] == final_ext)
//                 {
//                 return true;
                
//                 }
//             }
//             alert("Image Extension Not Valid (Use Jpg,jpeg)");
//             return false;
//         }
        
// </script>
</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center text-bold mt-2x">Register</h1>
                        <div class="hr-dashed"></div>
						<div class="well row pt-2x pb-3x bk-light text-center">
                         <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Name<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="name" class="form-control input" required>
                            </div>
                            <label class="col-sm-1 control-label">Email<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">Branch<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="branch" class="form-control input" required>
                            </div>
                            <label class="col-sm-1 control-label">Batch<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="batch" class="form-control" required>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="col-sm-1 control-label">Phone<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="number" name="mobileno" class="form-control" required>
                            </div>
                            </div>

                            <h1 class="text-center text-bold mt-2x">ISTE</h1>

                            <div class="form-group">
                            <label class="col-sm-1 control-label">&nbsp;1<sup>st</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref1" class="form-control" required>
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
                            <label class="col-sm-1 control-label">&nbsp;2<sup>nd</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref2" class="form-control" required>
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
                            <label class="col-sm-1 control-label">&nbsp;3<sup>rd</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref3" class="form-control" required>
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
                            <label class="col-sm-1 control-label">&nbsp;4<sup>th</sup> Pref<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="pref4" class="form-control" required>
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
                            <label class="col-sm-1 control-label">Why ISTE<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="why" class="form-control input" required>
                            </div>
                            <label class="col-sm-1 control-label">Text<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="text" class="form-control" required>
                            </div>
                            </div>
                            

                            <!-- <div class="form-group">
                            <label class="col-sm-1 control-label">Password<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="password" required >
                            </div>

                            <label class="col-sm-1 control-label">Designation<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <input type="text" name="designation" class="form-control" required>
                            </div>
                            </div>

                             <div class="form-group">
                            <label class="col-sm-1 control-label">&nbsp;Gender<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <select name="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>

                             <div class="form-group">
                            <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span><br></label>
                            <div class="col-sm-5">
                            <div><input type="file" name="image" class="form-control"></div>
                            </div>
                            </div>-->

								<br>
                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                </form>
                                <br>
                                <br>
								<p>Login as a Admin <a href="admin/index.php" >Admin</a></p>
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

</body>
</html>