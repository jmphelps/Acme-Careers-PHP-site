<?php

/* 
 *  WEB 182 Project: Acme Careers 
 *  model/category_db.php 
 *  Gets the job categories from the database
 */

function get_categories() {
    global $db;
    $query = 'SELECT * FROM jobs_category
              ORDER BY catID';
    $result = $db->query($query);
    return $result;
}


function get_category_name($category_id) {
    global $db;
    $query = "SELECT * FROM jobs_category
              WHERE catID = $category_id";
    $category = $db->query($query);
    $category = $category->fetch();
    $category_name = $category['catName'];
    return $category_name;
}

/*

function add_category($name) {
    global $db;
    $query = "INSERT INTO jobs_category (catName)
              VALUES ('$name')";
    $db->exec($query);
}

function delete_category($category_id) {
    global $db;
    $query = "DELETE FROM jobs_category
              WHERE catID = '$category_id'";
    $db->exec($query);
}

*/
?>