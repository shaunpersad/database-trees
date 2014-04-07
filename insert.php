<?php


/*
 * $parent_id = the comment you commented on
 */
$parent_id = intval($_POST['parent_id']);//in our example, this equals 5
$body = $_POST['comment_body']; //unescaped for brevity, but DONT FORGET TO SANITIZE DATA

$sql_to_query = "SELECT `row` AS parent_row,`post_id` FROM posts WHERE comment_id = $parent_id";
/**
 * Note: specific database implementation intentionally missing.
 * fetch parent_row as $parent_row and post_id as $post_id using the above sql.
 */
$row = $parent_row + 1; //your new row is below the parent's


$sql_to_insert = "INSERT INTO comments (`parent_id`, `row`, `post_id`, `body`)
                  VALUES ($parent_id, $row, $post_id, $body)";
/**
 * Note: specific database implementation intentionally missing.
 * Insert new data into database using above sql.
 */

