<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?
// setup connection with Oracle
$connection = oci_connect ("gq016", "fobblk", "gqiannew2:1521/pdborcl");
if ($connection == false){
   // For oci_connect errors, no handle needed
   $e = oci_error(); 
   die($e['message']);
}

// this is the SQL command to be executed
$query = "select SNAME, SSNO, STULEVEL from Student WHERE curaddress = 'OKC'";
// parse the SQL command
$cursor = oci_parse ($connection, $query);
if ($cursor == false){
   // For oci_parse errors, pass the connection handle
   $e = oci_error($connection);  
   die($e['message']);
}

// execute the command
$result = oci_execute ($cursor);
if ($result == false){
   // For oci_execute errors pass the cursor handle
   $e = oci_error($cursor);  
   die($e['message']);
}

// display the results
echo "<table class=\"table table-hover\" border=1>";
echo "<thead><tr> <th>Name</th> <th>SSN</th> <th>Level</th>" . 
     " </tr></thead>";
echo "<tbody>";
// fetch the result from the cursor one by one
while ($values = oci_fetch_array ($cursor)){
  $name = $values[0];
  $ssn = $values[1];
  $level = $values[2];

  echo "<tr><td>$name</td> <td>$ssn</td> <td>$level</td>" .
        "</tr>";
}

echo "</tbody></table>";

// free up resources used by the cursor
oci_free_statement($cursor);

// close the connection with oracle
oci_close ($connection);
?>

