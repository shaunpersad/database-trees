<?php
/**
 * Tree class file.
 *
 * PHP Version 5.3
 *
 * @package  TopHat
 * @author   Shaun Persad <shaunpersad@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://shaunpersad.com
 */

class Tree {


    private $nodes;
    private $roots;
    private $root_id;
    private $root_level;
    const DEPTH_FIRST = 0;
    const BREADTH_FIRST = 1;

    /**
     * @param int $root_id
     */
    function Tree($root_id = 0) {

        $this->nodes = array();
        $this->roots = array();
        $this->root_id = $root_id;
        $this->root_level = NULL;
    }

    /**
     * @param Node $node
     */
    function addNode(Node $node) {

        $current_row = $node->row;

        if($this->root_level === NULL) {

            $this->root_level = $current_row; //set the root level
        }
        /* if the current root level is higher than the level
        of the newly added node, then it cannot be the root level,
        so set the root level to the new, lower node's level
        */

        if($this->root_level > $current_row) {

            $this->root_level = $current_row;
        }
        $this->nodes[$node->id] = $node;
    }


    /**
     * Orders the added Nodes.
     *
     * Warning: the validity of this function depends on
     * the initial SQL query being ordered by DESC row,
     * i.e. returning the children before the parents.
     *
     * @return array
     */
    function orderNodes() {

        foreach($this->nodes as $node) {

            $parent_id = $node->parent_id;

            if(isset($this->nodes[$parent_id])) { //if the parent is present in the array of nodes

                $parent = $this->nodes[$parent_id];
                $parent->addChild($node); //add the child to the parent


            }
            /* if the node is on the root level but it is not the root,
            remove it and all of its children,
            but only if the root id is not 0,
            because a root id of 0 means that there may be multiple roots
            */
            if($node->row == $this->root_level &&
                $node->id != $this->root_id &&
                $this->root_id != 0) {

                $this->walk(Tree::DEPTH_FIRST, $node, array($this,'deleteNode')); //delete nodes
            }

            if(!isset($this->nodes[$parent_id]) && isset($this->nodes[$node->id])) {

                $this->roots[] = $node;
            }
        }
        return $this->roots;
    }

    /**
     * @param $traversal
     * @param Node $node
     * @param $callback
     * @param array $params
     */
    function walk($traversal, Node $node, $callback, $params = array()) {

        $container = array($node);

        while(count($container) > 0) {

            if($traversal == Tree::BREADTH_FIRST) {

                $current_node = array_shift($container); //breadth-first: uses more memory
            }
            else {

                $current_node = array_pop($container); //depth-first: uses less memory
            }

            foreach($current_node->children as $child) {

                $container[] = $child;
            }
            $node_and_params = array($current_node) + $params;
            call_user_func_array($callback, $node_and_params);
        }
    }

    /**
     * @param Node $node
     */
    function deleteNode(Node $node) {

        if(isset($this->nodes[$node->id])) {

            unset($this->nodes[$node->id]);
        }
    }

    /**
     * @param $node_id
     * @return Node|bool
     */
    function getNode($node_id) {

        if(isset($this->nodes[$node_id])) {

            return $this->nodes[$node_id];
        }
        else {

            return false;
        }
    }

    /**
     * @return Node[]
     */
    function getNodes() {

        return $this->nodes;
    }

    /**
     * @return Node[]
     */
    function getRoots() {

        return $this->roots;
    }


}
 