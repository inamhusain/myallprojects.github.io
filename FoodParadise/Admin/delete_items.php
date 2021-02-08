<?php
include 'conn.php';
$id=$_GET['id'];
$delete_items = mysqli_query($con,"DELETE FROM `items_master` WHERE `id`=$id;");

if($delete_items)
{
    header('location: list_items.php');
}
?>