<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 02:46 ص
 */
/**
 * getAllClients
 * @return array
 */
     function getClients(){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"SELECT * FROM `clients`");
        if(!$query)
            exit('Error : '.mysqli_error($connection));
        $clients = []; //All clients
        if(mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query))
                $clients[] = $row;
        }
        mysqli_close($connection);
        return $clients;
}

/**
 * search client
 * @param $keyword
 * @return array
 */
    function searchClients($keyword){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"SELECT * FROM `clients` WHERE `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%' OR `city` LIKE '%$keyword%' OR `phone` LIKE '%$keyword%'");
        if(!$query)
            exit('Error : '.mysqli_error($connection));
        $clients = []; //All clients
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query))
                $clients[]=$row;
        }
        mysqli_close($connection);
        return $clients;
}

/**
 * get Client By id
 * @param $id
 * @return array|null
 */
    function getClient($id){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"SELECT * FROM `clients` WHERE `id` = $id");
        if(!$query)
            exit('Error : '.mysqli_error($connection));
        $client=[];
        if(mysqli_num_rows($query)) {
            $client = mysqli_fetch_assoc($query);
        }
        mysqli_close($connection);
        return $client;
}

/**
 * Add New Client
 * @param $name
 * @param $email
 * @param $phone
 * @param $city
 * @return bool
 */
    function addClient($name,$email,$phone,$city){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"INSERT INTO `clients`(`name`, `email`, `city`, `phone`) VALUES ('$name','$email','$city','$phone')");
        if($query && mysqli_affected_rows($connection) > 0)
            return true;
        return false;
}

/**
 * update Client data
 * @param $id
 * @param $name
 * @param $email
 * @param $phone
 * @param $city
 * @return bool
 */
    function updateClient($id,$name,$email,$phone,$city){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"UPDATE `clients` SET `name`='$name',`email`='$email',`city`='$city',`phone`='$phone' WHERE `id`= $id");
        if($query && mysqli_affected_rows($connection) > 0)
            return true;
        return false;
}

/**
 * delete client by id
 * @param $id
 * @return bool
 */
    function deleteClient($id){
        $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
        $query = mysqli_query($connection,"DELETE FROM `clients` WHERE `id`= $id");
        if($query && mysqli_affected_rows($connection)>0)
            return true;
        return false;
}