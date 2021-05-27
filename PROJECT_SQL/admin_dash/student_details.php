<?php
session_start();
require  '../dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
<title>student requests</title>

</head>

<body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="#" class="logo">CMS</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="admindash.php"><span class="fa fa-home"></span>DASHBOARD</a>
          </li>
		  <li>
            <a href="admin_profile_details.php"><span class="fa fa-user"></span>PROFILE DETAILS</a>
          </li>
          <li>
            <a href="add_new_student.php"><span class="fa fa-user-plus"></span>ADD NEW STUDENT</a>
          </li>
          <li>
            <a href="add_new_prof.php"><span class="fa fa-user-plus"></span>ADD NEW PROFESSOR</a>
          </li>
          <li>
            <a href="add_new_course.php"><span class="fa fa-upload"></span>ADD NEW COURSE</a>
          </li>
          <li>
            <a href="view_student_request.php"><span class="fa fa-newspaper-o"></span>VIEW STUDENTS REQUESTS</a>
          </li>
          <li>
            <a href="anotifications.php"><span class="fa fa-paper-plane"></span>SEND NOTIFICATIONS</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out"></span>LOG OUT</a>
          </li>
        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
		</div>
        </nav>



        <div class="container" >
<div class="row">
<h4><center>Students Details</center></h4>


<table class="table table-bordered">
    <thead>
      <tr>
	    <th>S.No</th>
        <th>Rollno</th>
        <th>Name</th>
        <th>Password</th>
		<th>Noofcourses</th>
		<th>Edit</th>
		<th>Delete</th>
		
      </tr>
    </thead>
    <tbody class="tbody">
	<?php
	   $query="select * from student_details";
	   $result=mysqli_query($con,$query);
	   if($result->num_rows >0)
	   {      $i=0;
	          while($row=$result->fetch_assoc() )
			  {
				  $i++;
				  echo "<tr>
				       <td>{$i}</td>
					   <td>{$row['rollno']}</td>
			           <td>{$row['name']}</td>
					   <td>{$row['password']}</td>
					   <td></td>
					   <td><button type='button' class='btn btn-success editbtn' data-bs-toggle='modal' data-bs-target='#editmodal'>Edit</button></td>
					   <td><button type='button' class='btn btn-danger deletebtn' data-bs-toggle='modal' data-bs-target='#DeleteConfirm'>Delete</button></td>
					   </tr>";
					   
					   
			  }
	   }
	   else{
		   echo "No records found";
	   }
	
	?>
      
    </tbody>
  </table>
 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="student_details.php" method="POST" >
<div class="form-group align-items-center">
<input type="hidden" id="sno"></input>
<label class="control-label" ><i class="fas fa-lock fa-1.5x"></i> rollno</label>
<input type="text"  class="form-control" name="srollno"  id="srollno"></div>
<div class="form-group">
<label class="control-label" ><i class="fa fa-address-card" ></i>  Name</label>
<input type="text"  class="form-control" name="sname" id="sname"></div>
<div class="form-group">
<label class="control-label" ><i class="fa fa-birthday-cake"></i>  password</label>
<input type="text"  class="form-control" name="spass" id="spass"></div>
<input type="hidden" id="noofcourses"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div></form>
    </div>
  </div>
</div>
<div class="modal fade" id="DeleteConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><form action="student_details.php" method="POST">
      <div class="modal-body">
	  
        <h5>Are You sure want to delete this record?</h5>
		<input type="text" name="delete_id" id="delete_id"></input>
      </div>
      <div class="modal-footer" >
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
		<button type="submit" class="btn btn-danger" name="delete" >Delete</button>
      </div></form>
    </div>
  </div>
</div>
<?php

if(isset($_POST['delete']))
{
	
	$id=$_POST['delete_id'];
	
	$query="delete from student_details WHERE rollno='$id'";
	$query_run=mysqli_query($con,$query);
	
	if($query_run){
		echo "<script type='text/javascript'> alert('data deleted');</script>";
		
	}
	else{
		echo "<script type='text/javascript'> alert('unsuccessfull deletion');</script>";
		
	}
	
}


?>
<?php

if(isset($_POST['update']))
{
	
	$id=$_POST['srollno'];
	$sname=$_POST['sname'];
	$spass=$_POST['spass'];
	$query="update student_details set name='$sname',password='$spass' where rollno='$id'";
	$query_run=mysqli_query($con,$query);
	
	if($query_run){
		echo "<script type='text/javascript'> alert('data updated');</script>";
		
	}
	else{
		echo "<script type='text/javascript'> alert('unsuccessfull updation');</script>";
		
	}
	
}


?>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"  type="text/javascript" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="/PROJECT_SQL/bootstrap/js/popper.min.js"></script>
    <script src="/PROJECT_SQL/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
$(document).ready(function(){
	$('.editbtn').on('click',function(){
		$('#editmodal').modal('show');
          var currrow=$(this).closest('tr');
          var data1=currrow.find('td:eq(1)').text();
		  var data2=currrow.find('td:eq(2)').text();
		  var data3=currrow.find('td:eq(3)').text();
		   
		 $('#srollno').val(data1);
		  $('#sname').val(data2);
		   $('#spass').val(data3);
		  console.log(data1);
		   console.log(data2);
		    console.log(data3);
		  
			 
});
});
		  
          		  
</script>
	<script>
$(document).ready(function(){
	$('.deletebtn').on('click',function(){
		$('#DeleteConfirm').modal('show');
          var currrow=$(this).closest('tr');
          var data1=currrow.find('td:eq(1)').text();
		 // var data2=currrow.find('td:eq(2)').text();
		//  var data3=currrow.find('td:eq(3)').text();
		   
		 $('#delete_id').val(data1);
		 // $('#profname').val(data2);
		 //  $('#profpass').val(data3);
		  console.log(data1);
		 //  console.log(data2);
		  //  console.log(data3);
		  
			 
});
});
  
          		  
</script>	</script>
<script src="main.js"></script>
</body>
</html>
