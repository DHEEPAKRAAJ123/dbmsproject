<?php
session_start();
  require '../dbconfig/config.php';

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
<title>view_all_course</title>

</head>
<body>

<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
			
			 <h1><a href="#" class="logo">CMS</a></h1>
				<?php  echo $_SESSION['pname']?></h1>
         <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="profdash.php"><span class="fa fa-home"></span>DASHBOARD</a>
          </li>
		   <li>
            <a href="professor_profile_details.php"><span class="fa fa-user"></span>PROFILE DETAILS</a>
          </li>
		  <li>
            <a href="professor_update_details.php"><span class="fa fa-user-plus"></span>UPDATE PROFILE DETAILS</a>
          </li>
          <li>
            <a href="course_details.php#navStudentDetails" onclick='show_course_details()'><span class="fa fa-sticky-note"></span>VIEW ALL COURSES</a>
          </li>
		  <li>
            <a href="course_details.php#navCourseMaterials" onclick='show_course_materials()'><span class="fa fa-upload"></span>UPLOAD STUDY MATERIALS</a>
          </li>
		  <li>
            <a href="course_details.php#navCourseNotifications" onclick='show_course_notifications()'><span class="fa fa-paper-plane"></span> SEND NOTIFICATION</a>
          </li>
          <li>
            <a href="log_out.php"><span class="fa fa-sign-out"></span>LOGOUT</a>
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


            </div>
        </nav>

 <div class="container-fluid p-0" id="enrolledcourses">
        <h3 style="margin:20px">All Courses:</h3>
     <div class="container" id="box">
        <div class="row" id='courserow'>                         
        </div>
    </div>
</div>
  </div>
</div>
    <script>
        function load_all_courses(){
            $.get('api/load_all_courses.php', function(data){
                $('#courserow').html(data);
            })
        }

        function load_course_details(cid){
            $.post('api/set_course.php', {
                course_id: cid
            },function(data){
                $('#box').html(data);
            })
        }
        $(document).ready(function(){
            load_all_courses();
        });
    </script>
	<script src="main.js"></script>
</body>
</html>
