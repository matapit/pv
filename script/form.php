<!DOCTYPE html>
<html>
<head>
  <title>
    
  </title>
</head>
<body>
  
  <div class="container">
  

     <form action="addp.php" >
  <div class="form-group">
    <label for="fname">First name:</label>
    <input type="text" placeholder = "Enter firstname" class="form-control" name="fname">
  </div>
  <div class="form-group">
    <label for="lname">Last name:</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" class="form-control" name="address">
  </div>
  <div class="radio">
               <label for="sex">Sex:</label><br>
                <label><input type="radio" id="sex" required name="sex" value="Male">Male</label>
              </div>
              <div class="radio">
                <label><input type="radio" id="sex" required name="sex" value="Female">Female</label>
              </div>
  <div class="form-group">
    <label for="dob">Date of Birth:</label>
    <input type="date" class="form-control" name="dob">
  </div>
  <div class="form-group">
    <label for="pob">Place of Birth:</label>
    <input type="text" class="form-control" name="pob">
  </div>
  <div class="form-group">
    <label for="lname">ID card:</label>
    <input type="number" class="form-control" name="idcard">
  </div>
  <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="telnum">Telephone Number:</label>
    <input type="number" class="form-control" name="telnum">
  </div>
  <div class="form-group">
    <label for="driv">Driving Licence:</label>
    <input type="text" class="form-control" name="driv">
  </div>
  <div class="form-group">
    <label for="pass">Pasport:</label>
    <input type="text" class="form-control" name="pass">
    <div>
     <div class="form-group">
    <label for="cv">CV:</label>
    <input type="number" class="form-control" id="cv">
    <div>
    <br>
     <div class="form-group">
       <label for="department">Select Department:</label>
        <input type="text" class="form-group" name="department">
    <div>
     <div class="form-group">
    <label for="post">Post:</label>
    <input type="text" class="form-control" name="post">
    <div>
     <div class="form-group">
    <label for="cat">Category:</label>
    <input type="text" class="form-control" name="cat">
    <div>
     <div class="form-group">
    <label for="mat">Matricul:</label>
    <input type="text" class="form-control" name="mat">
    <div>
      <div class="form-group">
    <label for="pwd">Username:</label>
    <input type="text" class="form-control" name="usn">
    <div>
      <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="text" class="form-control" name="pwd">
    <div>
    <div class="form-group">
              <label for="pic">Picture:</label>
              <input type="file" class="form-control" id="pic" name="pic">
            </div>
    <br>
   <button type="submit" style="margin-left : 45%" class="btn btn-primary">Submit</button></div>
  </div>
  </div>

</body>
</html>