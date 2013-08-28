<!DOCTYPE html>

<html>
<head>
    <title>CRUD Application</title>
    <!--Script displays number values within textbox with id 'textInput'-->
    
    <script type="text/javascript">
        function updateTextInput(val){
            document.getElementById('textInput').value=val;
        }
    </script>
</head>


<body>
    
    <?php
    
    //Database include file Opens connection, creates database and table
    
    include "dbconnect.php";
    
    //Populates database table fields with INSERT command
    if (isset($_POST['enter'])){
        
    $sql= "INSERT INTO Cars (ModelName, ModelMake, Year)
        VALUES
        ('$_POST[modelname]','$_POST[modelmake]','$_POST[year]')";
        
    if (!mysqli_query($connection,$sql))
        {
            die('Error: ' . mysqli_error($connection));
        }
    /*echo "1 car added";*/
    
    }
    
    //Delete listing by ID
    
    if (isset($_POST['deletebutton'])){
        $delete = $_POST['delete'];
        mysqli_query($connection,"DELETE FROM Cars WHERE ID='$delete'");
    }
    
  


/*mysqli_close($connection);*/

?>
    
  <!--Form fields for inserting a record-->
  
    <form action="index.php" method="post">
        Model Name: <input type="text" name="modelname">
        Model Make: <input type="text" name="modelmake">
        Year: <input type="text" name="year">
        <input type="submit" name="enter">
    </form>
    
    <br>
        
    <!--Record deleted by entering ID-->
    
     <form action="index.php" method="post">
    <label for="id">Delete Listing by ID: </label>
    <input type="range" name="id" id="id" min="1" max="100" onchange="updateTextInput(this.value);">
    <input type="text" id="textInput" name="delete">
    <input type="submit" name="deletebutton">
     </form>
     
        
    <br>
  
        <br>

 <?php

 //READS Table and displays it
 
 if (!isset($_POST['submit'])){   
//Display Table Data

    $table = mysqli_query($connection,"SELECT * FROM Cars");
    
    echo "<table border='1'>
    
    <tr>
    <th>ID</th>
    <th>Model Name</th>
    <th>Model Make</th>
    <th>Year</th>
    </tr>";
    
    while ($row = mysqli_fetch_array($table))
        {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['ModelName'] . "</td>";
            echo "<td>" . $row['ModelMake'] . "</td>";
            echo "<td>" . $row['Year'] . "</td>";
            echo "</tr>";
        }
          echo "</table>";
       
}

?>
     <br>
   
   <!--Button that calls on upadate.php and views it's contents-->
    <form action="index.php" method="post">
    <input type="submit" value="Upate Record" name="updatebutton">
    </form>
    
<?php

  //Update listiing // Displays contents of update.php file
    
    if (isset($_POST['updatebutton'])){
        include "update.php";
       
    }
    
    //updates listing in database by ID // processes update.php file
    
     if (isset($_POST['updatelisting'])){
        $update = $_POST['update'];
    mysqli_query($connection,"UPDATE Cars SET ModelName='$_POST[modelname]', ModelMake='$_POST[modelmake]', Year='$_POST[year]'
    WHERE ID='$update'");
    ?>
    
    <!--Script reloads page so updated field can be viewed-->
    
    <script type="text/javascript">
        parent.window.location.href="index.php";
    </script>
    
    <?php
    }
    

?>

</body>
</html>
