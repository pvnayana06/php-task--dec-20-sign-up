<!DOCTYPE html>  
<html>  
<head>  
<title>Sign-up</title>
<style>
     .container 
  {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 10%;
    background-image: url("https://wallpapercave.com/wp/wp8704367.jpg");
    background-size: cover;
  }

  .container h2 
  {
    color:black;
    font-family: sans-serif;
    align-items: center;
   
  }
  .container .submit 
  {
    width: 100%;
    padding: 10px 0;
    font-size: 20px;
    color: rgb(44, 44, 44);
    background-color: #ffe283;
    border-radius: 5px;
    align-items: center;
  }
  
  .container .submit:hover 
  {
    box-shadow: 3px 3px 6px rgb(255, 169, 88);
  }
  .error 
  {
      color: #FF0001;
    } 
    </style>
</head> 
<body>    
  
<?php  
 
$nameErr = $emailErr =  $mobileErr = $zipErr = $genderErr = "";  
$name = $email =  $mobileno = $zip = $gender =  ""; 
 
function input_data($data) 
{  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
    if (empty($_POST["name"])) 
    {  
         $nameErr = "Name is required";  
    } 
    else 
    {  
        $name = input_data($_POST["name"]);    
         if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
          {  
             $nameErr = "Invalid name";  
          }  
    }  
      
    if (empty($_POST["email"]))
     {  
        $emailErr = "Email is required";  
     } 
    else 
    {  
        $email = input_data($_POST["email"]);  
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {  
                $emailErr = "Invalid email format";  
            }  
     }  
  
    if (empty($_POST["mobileno"]))
     {  
            $mobileErr = "Mobile no is required";  
     } 
    else 
    {  
            $mobileno = input_data($_POST["mobileno"]);  
            
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) 
            {  
            $mobileErr = "Only numeric value is allowed.";  
            }  
        if (strlen ($mobileno) != 10) {  
            $mobileErr = "Must contain 10 digits.";  
            }  
    }  

    if (empty($_POST["zip"]))
    {  
        $zipErr = "Zipcode is required";  
    } 
   else 
   {  
        $zip = input_data($_POST["zip"]);  
           
        if (!preg_match ("/^[0-9]*$/", $zip) ) 
           {  
            $zipErr = "Only numeric value is allowed.";  
           }  
        if (strlen ($zip) != 6) 
           {  
            $zipErr = "Must contain 6 digits.";  
           }  
   }
       
    if (empty ($_POST["gender"])) 
    {  
        $genderErr = "Gender is required";  
    } 
    else 
    {  
        $gender = input_data($_POST["gender"]);  
    }  
}  
 
?>  

<div class="container">
<h2>Sign-up Form</h2>  <br>
<span class = "error">* The fields are required </span><br>      

<form method="post" action="
    <?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]); 
     ?>" 
>    
<table>
   <tr>
       <td>Name: </td>
       <td><input type="text" name="name">  
        <span class="error"> 
           <?php echo $nameErr; ?> 
        </span>  <br>
        </td>
   </tr> 
        
    <tr>
        <td>E-mail: </td>  
        <td><input type="text" name="email">  
        <span class="error">
            <?php echo $emailErr; ?> 
        </span>  <br>    
        </td>
    </tr>
      
    <tr> 
        <td>Mobile No: </td>
        <td><input type="text" name="mobileno"> 
        <span class="error">
            <?php echo $mobileErr; ?> 
        </span>  <br>    
        </td> 
    </tr> 

    <tr> 
        <td>Zipcode: </td>
        <td><input type="text" name="zip"> 
        <span class="error">
            <?php echo $zipErr; ?> 
        </span>  <br>    
        </td> 
    </tr>
       
    <tr>  
        <td> Gender:</td>
        <td><input type="radio" name="gender" value="male"> Male  
            <input type="radio" name="gender" value="female"> Female  
            <input type="radio" name="gender" value="other"> Other 
         
            <span class="error">
               <?php echo $genderErr; ?> 
            </span>  <br>   
            </td>
    </tr>
 
     <td>                          
    <input type="submit" name="submit" value="Submit">  </td>        
                          
</form>  
</table>
  
<br>
<?php  
    if(isset($_POST['submit'])) 
    {  
          if($nameErr == "" && $emailErr == ""  && $mobileErr == ""  && $zipErr == "" && $genderErr == "") 
           {  
             echo "<h3> <b>Sucessfully Registered.</b> </h3>";  
             echo "<h2>Your Input:</h2>";  
             echo "Name: " .$name; 
             echo "<br><br>";  
             echo "Email: " .$email;  
             echo "<br><br>";  
             echo "Mobile No: " .$mobileno;  
             echo "<br><br>";   
             echo "Zipcode: " .$zip;  
             echo "<br><br>"; 
             echo "Gender: " .$gender; 
             echo "<br><br>"; 
           } 
           else 
              {  
               echo "<h2> <b>Should fill up the form correctly.</b> </h2>";  
              }  
    }  
?>  

</body>  
</html>