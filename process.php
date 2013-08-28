<?php

//Check connection

//DB connction created
    $connection=mysqli_connect("localhost", "root", "");
    
    //Connection check
    if (mysqli_connect_errno($connection))
        {
            echo "Failed to connect to database crud: " . mysqli_connect_error();
        }
        
//DB creation
    $sql="CREATE DATABASE IF NOT EXISTS crud";
    if(mysqli_query($connection,$sql))
    {
        echo "Database crud sucessfully created ";
    }
    else
    {
        echo "Error creating database: " . mysqli_error($connection);
    }
    
    //Select database
    $dbselect = mysqli_select_db($connection, "crud");
    if(!$dbselect){
        die ("Can\'t use crud:" . mysqli_error($connection));
    }
 
    //Create Table
    $sql = "CREATE TABLE IF NOT EXISTS Cars(ModelName VARCHAR(30), ModelMake VARCHAR(30), Year YEAR, Inventory INT)";
    if(mysqli_query($connection,$sql))
    {
        echo "Table Cars created sucessfully";
    }
    else{
        echo "Error creating table: " . mysqli_error($connection);
    }
        
        
//INSERT



$sql= "INSERT INTO Cars (ModelName, ModelMake, Year)
        VALUES
        ('$_POST[modelname]','$_POST[modelmake]','$_POST[year]')";
        
    if (!mysqli_query($connection,$sql))
        {
            die('Error: ' . mysqli_error($connection));
        }
    echo "1 car added";
    


mysqli_close($connection);

?>

<a href="index.php">Go Back</a>