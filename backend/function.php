<?php

include 'database.php';

function strandName($id){
    global $conn;
    $query = 'SELECT strand FROM tbl_strand where strand_id=?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($strandName);
    $stmt->fetch();
    $stmt->close();
    return $strandName;
}

?>