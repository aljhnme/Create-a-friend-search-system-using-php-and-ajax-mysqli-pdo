<!DOCTYPE html>
<html>
<head>
  <?php include 'mysqli.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
     search
   </button>
   <br>
   <br>
  <div class="row" id="users">

  </div>
</div>
  <div class="modal" id="myModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Look for friends</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                 
                  <div class="form-group">
                    <label for="inputAddress">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                  </div>
                 <div class="form-row">
                   <div class="form-group col-md-6">
                     <label for="inputCity">City</label>
                     <input type="text" class="form-control" id="City">
                   </div>
                 <div class="form-group col-md-4">
                   <label for="inputState">gender</label>
                     <select id="gender" class="form-control">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                </div>
              </div>
                  <div class="form-group">
                   <label for="how_to_search">how to search</label>
                     <select id="how_to_search" class="form-control">
                      <option value="one">Search by one value</option>
                      <option value="multiple">Search by multiple values</option>
                    </select>
                  </div>
                <button type="submit" id="search" class="btn btn-primary">Search</button>
              
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
</body>
<style type="text/css">
body{
    margin-top:20px;
    background:#eee;
}
.avatar.avatar-xl {
    width: 5rem;
    height: 5rem;
}
.avatar {
    width: 2rem;
    height: 2rem;
    line-height: 2rem;
    border-radius: 50%;
    display: inline-block;
    background: #ced4da no-repeat center/cover;
    position: relative;
    text-align: center;
    color: #868e96;
    font-weight: 600;
    vertical-align: bottom;
}
.card {
    background-color: #fff;
    border: 0 solid #eee;
    border-radius: 0;
}
.card {
    margin-bottom: 30px;
    -webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
    box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
}
.card-body {
    padding: 1.25rem;
}
.tile-link {
    position: absolute;
    cursor: pointer;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 30;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){

     $("#search").click(function(){
        
        var name=$("#name").val();
        var city=$("#City").val();
        var gender=$("#gender").val();
        var how_to_search=$("#how_to_search").val();

        fetch_users(name,city,gender,how_to_search);

	  });

       fetch_users();
       function fetch_users(name , city , gender , how_to_search)
       {
       	 $.ajax({
       	 	url:"fetch_user.php",
       	 	method:"post",
       	 	data:{name:name,city:city,gender:gender,how_to_search:how_to_search},
       	 	success:function(data)
       	 	{
               $("#users").html(data);
       	 	}
       	 });
       }
	});
</script>
</html>