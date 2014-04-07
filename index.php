<?php
require 'meekrodb.2.2.class.php';
require 'Node.php';
require 'Tree.php';

/**
 * Prints out the node id, and it's children's ids.
 *
 * @param Node $node
 */
function printTree(Node $node) {

    echo 'This node is: '.$node->id.' and its children are: ';

    foreach($node->children as $child) {

        echo $child->id.', ';
    }
    echo '<br />';

}

DB::$host = 'localhost';
DB::$dbName ='treetest';
DB::$user = 'root';
DB::$password = '';


$tree = new Tree(); //create Tree

$results = DB::query('SELECT * FROM tree_data ORDER BY `row` DESC, id ASC');

foreach ($results as $node_data) {
    $node = new Node($node_data);
    $tree->addNode($node);
}

$roots = $tree->orderNodes(); //order the nodes

/* now you can do work on the tree */

/**
 * This prints out each tree found in the data set,
 * using the printTree function created earlier.
 */
foreach($roots as $root) {
    echo 'A TREE:<br/>';
    $tree->walk(Tree::BREADTH_FIRST, $root, 'printTree');
}


/**
 * This gets arbitrary node 2
 * and walks on its descendents,
 * effectively creating a subtree who's root is node 2
 */
echo '<br />A SUBTREE STARTING FROM 2:<br />';
$some_node = $tree->getNode(2);
$tree->walk(Tree::DEPTH_FIRST, $some_node, 'printTree');

/**
 * This gets arbitrary node 5
 * and walks on its descendents,
 * effectively creating a subtree who's root is node 5
 */
echo 'A SUBTREE STARTING FROM 5:<br />';
$some_node = $tree->getNode(5);
$tree->walk(Tree::DEPTH_FIRST, $some_node, 'printTree');