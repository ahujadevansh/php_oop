<?php
/*
    mysqli_connect():
        this function is used to connect only mysql database
        On success: returm=ns a link identifier
        on failure : throws error

        syntax $conn = mysqli_connect("hostname", 'user_name, 'password', 'databasename', 'port');

    To know error mysqli_connect_error():
        mysqli_connect throws an error on failure which is stored by mysqli_connect_eror
        if there is no error NULL

        sample code:

        $conn = mysqli_connect("hostname", 'user_name, 'password', 'databasename', 'port');
        if(mysqli_connect_error()):
        {
            $log_message = 'Mysql Error: '.mysqli_connect_error();

            die('message');
        }

    TO CHANGE THE DATABASE IN USE ,WE CAN USE mysqli_select_db():
    example: mysqli_select_db($conn, 'new_database')

    mysqli_close():
        use to close the connection
        returns true on success and false on failure
        mysqli_close($conn)

    mysqli_query():

        This is the function used for executing mysql queries.
        it returns false on faliure.
        for select query where there is a result it returns a mysqli resultset (resource) whic can be used later to fetch data.
        sample code:
        if (mysqli_query($conn, $query)) {
            //iterate and display
        }
        else {
            // show error
        }

    mysqli_fetch_array():
        This function is used for reading a data from a mysql result set it reads and returns one row of data as an indexed 
        and assoc array and then moves the pointer to the next row 
        when there are no rows left it returns NULL
        // mixed array
    mysqli_fetch_row():
        // indexed array only
    mysqli_fetch_assoc():
        // assoc array only
    
    mysqli_free_result():
        free result set

        immediately after using a result set, you can free the memory used for it as below.
        Example: mysqli_free_result($result);

    mysqi_num_rows();
        returns the number of rows in a result set
        example: mysqli_num_rows($result)

    mysqli_affected_rows():
        this function provides information on last mysql query executed. for insert, update, replace and delete,
        it provides number of rows affected
        for select it returns number of rows in the result set as mysqi_num_rows()
        example: mysqli_affected_rows($conn)

    mysqli_insert_id:
        returns the id of the last record that was inserted mysqli_insert_id($conn);

    mysqli_error():
        if there was an error in the last mysql query this function will return the error else return empty string

    mysqli_real_escape_string():
        some characters like single quote has special meaning in sql statements. for an example,
        single quote is used for wrapping strings so, if your sql statements contains these special characters 
        you need to escape them via mysqli_real_escape_string() before sending the query to mysqli_query().

        sample code:
        $query = "select 'id' from 'contacts' where 'last_name' = 'O'NEIL'";
        mysqli_query($conn, $query);
        Note: this gives an error

        $name = mysqli_real_escape_string($conn, "O'Neil");
        $query = "select 'id' from 'contacts' where 'last_name' = '$name'";
        mysqli_query($conn, $query);


 */

//  $arr = array(1,2,3,4);
//  print_r($arr);
//  $arr['name'] = "Nikki";
//  print_r($arr);
//  $arr[] = "Nikki";
//  print_r($arr);

//  function db_connect() 
// {
//     static $connection;

//     if(!$connection):
//         $config  = parse_ini_file('php_project1/config.ini');
//         $connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['dbname'], $config['port']);
//     endif;

//     if($connection === false):
//         return mysqli_connect_error();
//     endif;

//     return $connection;
// }
// function db_query($query)
// {
//     $connection = db_connect();
//     $result = mysqli_query($connection, $query);

//     return $result;
// }

// function db_select($query)
// {
//     $result = db_query($query);

//     if($result === false):
//         return false;
//     endif;

//     $rows = array();

//     while($row = mysqli_fetch_array($result)):
//         $rows[] = $row;
//     endwhile;

//     return $rows;

// }
// echo "<br>";

// print_r(db_select("SELECT * FROM contacts WHERE id=1"));

?>
