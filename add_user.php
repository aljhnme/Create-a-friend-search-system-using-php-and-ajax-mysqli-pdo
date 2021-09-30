<!DOCTYPE html>
<html>
<head>
    <?php include 'mysqli.php';?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="add">
      <div class="account-add">
        <h1>Add User</h1>
        <form  method="post" class="add-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="add-form">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label  for="gender">Gender</label>
                 <select name="gender" id="gender" class="form-control">
                    <option selected></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <h4 id="alert">
                
            </h4>
             <button name="click" class="btn">Add</button>
        </form>
      </div>
  </div>
</body>
<style type="text/css">
* {
margin: 0px;
padding: 0px;
}
.add {
background: linear-gradient(to bottom, #0099ff 0%, #fff 100%);
height: 100vh;
width: 100%;
justify-content: center;
align-items: center;
display: flex;
}
.account-add {
width: 500px;
}
.form-control:focus {
box-shadow: none;
}

.account-add h1 {
font-size: 25px;
text-align: left;
color: #fff;
text-transform: uppercase;
font-weight: bold;
border-radius: 5px;
}
.add-form input {
width: 100%;
position: relative;
border-bottom: 1px solid #a39e9e;
padding: 0;
border-top: 0px;
border-left: 0px;
border-right: 0px;
box-shadow: none;
height: 63px;
border-radius: 0px;
}
.add-form {
background: #fff;
float: left;
width: 100%;
padding: 40px;
border-radius: 5px;
}
button.btn {
width: 100%;
background: #009cff;
font-size: 20px;
padding: 11px;
color: #fff;
border: 0px;
margin: 10px 0px 20px;
}
</style>
</html>
<?php
 $m_s="";
 if (isset($_POST['click'])) 
 { 
     if (empty($_POST['name'])) 
     {
        $m_s="Please add a name";
     }

     if (empty($_POST['city'])) 
     {
        $m_s="Please add your city name";
     }

     if ($m_s == "") 
     {
       $query="INSERT INTO `users`(`name`, `city`, `gender`) VALUES (:name , :city , :gender)"; 

       $stm=$connect->prepare($query); 

       $stm->bindParam(':name',$_POST['name'],PDO::PARAM_STR); 
       $stm->bindParam(':city',$_POST['city'],PDO::PARAM_STR); 
       $stm->bindParam(':gender',$_POST['gender'],PDO::PARAM_STR); 

       
       if ($stm->execute()) 
         {
           $m_s="successfully inserted";
         }
 
     }

     ?>
      <script type="text/javascript">
          var m_s='<?php echo $m_s ?>';
          $("#alert").html('<div class="alert alert-warning" role="alert">'+m_s+'</div>');
      </script>
     <?php

     $m_s="";
   
 } 

?>