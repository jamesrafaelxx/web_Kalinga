<?php
    session_start();

    include 'components/connection.php';
	include 'components/functions.php';

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		//something was posted
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$birthday = $_POST['birthday'];
		$age = $_POST['age'];
		$sex = $_POST['sex'];
		$doctorNumber = $_POST['doctorNumber'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phoneNumber = $_POST['phoneNumber'];
		$password = $_POST['password'];

		if(!empty($firstName) && !empty($lastName) && !empty($birthday) && !empty($age) && !empty($doctorNumber) && !empty($username) && !empty($email) && !empty($phoneNumber) && !empty($password) && !is_numeric($firstName) && !is_numeric($lastName) && !is_numeric($usename) && !is_numeric($email)) {

			//save to database
			$user_id = random_num(20);
			$query = "insert into doctor (user_id,type,firstName,lastName,birthday,age,sex,doctorNumber,username,email,phoneNumber,password) values ('$user_id','Doctor','$firstName','$lastName','$birthday','$age','$sex','$doctorNumber','$username','$email','$phoneNumber','$password')";

			mysqli_query($con, $query);

			header("Location: doctor_login.php");
			die;
		}
        
        else {
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Signup Page</title>

		<!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

		<!-- google fonts link  -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/signup_style.css">
    </head>

    <body>
        <div class="container">
            <h1 class="form-title">Registration</h1>
            
            <form method="post">
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" placeholder="Enter First Name" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="birthday">Birthday</label>
                        <input type="text" id="birthday" name="birthday" placeholder="Enter Birthday (yyyy-mm-dd)" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="age">Age</label>
                        <input type="text" id="age" name="age" placeholder="Enter Age" required/>
                    </div>
        
                    <div class="sex-details-box">
                        <span class="sex-title">Sex</span>
                        <div class="sex-category" required>
                            <input type="radio" name="sex" value="Male" id="male">
                            <label for="male">Male</label>
                            <input type="radio" name="sex" value="Female" id="female">
                            <label for="female">Female</label>
                        </div>
                    </div>

                    <div class="user-input-box">
                    </div>

                    <div class="user-input-box">
                        <label for="doctorNumber">ID Number</label>
                        <input type="text" id="doctorNumber" name="doctorNumber" placeholder="Enter ID Number" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required/>
                    </div>

                    <div class="user-input-box">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required/>
                    </div>
                </div>

                <div class="form-submit-btn">
                    <input id="button" type="submit" value="Register">
                </div>
                
                <div class="signup-link">Already have an account? <a href="doctor_login.php">Login here</a></div>
            </form>
        </div>
    </body>
</html>