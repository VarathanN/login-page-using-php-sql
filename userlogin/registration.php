<?php
    require('connection.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $sql = "select email from userlogin where email = '$email'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count >= 1){ 
            
            echo "
            <script>
                if(confirm('Email already exist'))
                {
                    window.location.href = 'index.html';
                }
                else
                {
                    window.location.href = 'index.html';
                }
            </script>
            ";
        }  
        else{
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $query    = "INSERT into `userlogin` (username, password, email, name)
                     VALUES ('$username', '$password', '$email', '$name')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  
                  </div>";
        } //else {
        //     echo "<div class='form'>
        //           <h3>Required fields are missing.</h3><br/>
        //           <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
        //           </div>";
        // }
    }
}
?>
<script>
 
 

</script>