<?php

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
        echo "Welcome to Cars Inventory Program"; ?> <br> <?php
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
    $sql = "CREATE TABLE IF NOT EXISTS Cars(ID int NOT NULL AUTO_INCREMENT, ModelName VARCHAR(30), ModelMake VARCHAR(30), Year YEAR, PRIMARY KEY (ID))";
    if(mysqli_query($connection,$sql))
    {
        echo "Table 'Cars' created sucessfully"; ?> <br><br> <?php
    }
    else{
        echo "Error creating table: " . mysqli_error($connection);
    }
    
     /*mysqli_close($connection);*/

?>