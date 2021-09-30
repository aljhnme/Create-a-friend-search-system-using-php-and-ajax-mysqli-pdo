   
   <?php 
    include 'mysqli.php';

    if (isset($_POST['how_to_search'])) 
    { 
      $name="";
      $city="";
      $gender="";
      if ($_POST['how_to_search'] == "one") 
      { 
        $type_se=' AND ';
      }
     if ($_POST['how_to_search'] == "multiple") 
      { 
        $type_se=' OR ';
      }

      if (!empty($_POST['name'])) 
      {
        $name.=">name='".$_POST['name']."'<";
      }

      if (!empty($_POST['city'])) 
      {
        $city.=">city='".$_POST['city']."'<";
      }

      if (!empty($_POST['gender'])) 
      {
         $gender.=">gender='".$_POST['gender']."'<";
      }

      $tables=$name.$city.$gender;
      $clean_tb=str_replace(array(">","<"),'',str_replace("<>",$type_se,$tables));
      $query="SELECT * FROM `users` WHERE $clean_tb";   
    }else{
      $query="SELECT * FROM `users`";
    }

    $stm=$connect->prepare($query);
    $stm->execute();

    $data=$stm->FetchAll();

    foreach ($data as $row) 
    {
    	if ($row['gender'] == "male") 
    	{
    	  $image="man.png";
    	}
        
        if ($row['gender'] == "female") 
        {
          $image="woman.png";	 
        }
   ?>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center">
          	<span style="background-image: url(<?php echo $image; ?>)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0"><?php echo $row['name'];?></h5>
              <p class="card-text text-uppercase text-muted"><?php echo $row['city'];?></p>-
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      }
    ?>