<?php

/**
 * add new client
 * @param $name
 * @param $phone
 * @param $email
 * @param $city
 * @return bool
 */
function addClient($name,$phone,$email,$city,$image='no-image.jpg')
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    //2-query
    $query = mysqli_query($connection,"INSERT INTO `clients`(`name`, `email`, `phone`, `city`,`image`) VALUES ('$name','$email','$phone','$city','$image')");

    if(mysqli_affected_rows($connection) >0)
    {
        //3- close
        mysqli_close($connection);
        return true;
    }
    //3- close
    mysqli_close($connection);
    return false;
}


function updateClient($id,$name,$phone,$email,$city)
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    //2-query
    $query = mysqli_query($connection,"UPDATE `clients` SET `name`='$name', `email`='$email', `phone`='$phone', `city`='$city' WHERE `id`=$id");

    if(mysqli_affected_rows($connection) >0)
    {
        //3- close
        mysqli_close($connection);
        return true;
    }
    //3- close
    mysqli_close($connection);
    return false;
}

function deleteClient($id)
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    $clientData = getClient($id);
    $clientImage = $clientData['image'];
    //2-query
    $query = mysqli_query($connection,"DELETE FROM `clients` WHERE `id`=$id");

    if(mysqli_affected_rows($connection) >0)
    {
        if($clientImage !== 'no-image.jpg')
            unlink('uploads/'.$clientImage);
        //3- close
        mysqli_close($connection);
        return true;
    }
    //3- close
    mysqli_close($connection);
    return false;
}


function getClients()
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    //2-query
    $query = mysqli_query($connection,"SELECT * FROM `clients`");

    $clients = [];
    if(mysqli_num_rows($query) >0)
    {
        while($row = mysqli_fetch_assoc($query))
            $clients[] = $row;
    }
    //3- close
    mysqli_close($connection);
    return $clients;
}



function searchClients($keyword)
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    //2-query
    $query = mysqli_query($connection,"SELECT * FROM `clients` WHERE `name` LIKE '%$keyword%' OR `phone` LIKE '%$keyword%' OR `email` LIKE '%$keyword%'");

    $clients = [];
    if(mysqli_num_rows($query) >0)
    {
        while($row = mysqli_fetch_assoc($query))
            $clients[] = $row;
    }
    //3- close
    mysqli_close($connection);
    return $clients;
}



function getClient($id)
{
    //1-connection
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit("Error : ".mysqli_error($connection));

    //2-query
    $query = mysqli_query($connection,"SELECT * FROM `clients` WHERE `id`=$id");

    $client = [];
    if(mysqli_num_rows($query) >0)
    {
        $client = mysqli_fetch_assoc($query);
    }
    //3- close
    mysqli_close($connection);
    return $client;
}

function uniqueName()
{
    $name = uniqid('syam_').time().rand(10000,100000);
    return $name;
}

//name => db.pdf
function getExt($name)
{
    $explodedName = explode('.',$name);
    $ext = end($explodedName);
    return $ext;
}