<?php
class Node {

    public $id;
    public $data;
    public $parent_id;
    public $row;
    public $children;
    public $descendant_count;

    /**
     * @param $node_data - the data from the sql query
     */
    function Node($node_data) {

        $this->id = $node_data['id'];
        $this->data = $node_data;
        $this->parent_id = $node_data['parent_id'];
        $this->row = $node_data['row'];
        $this->children = array();
        $this->descendant_count = 0;
    }

    /**
     * @param Node $child
     */
    function addChild(Node $child) {

        $this->descendant_count++; //count the child
        $this->descendant_count+= $child->descendant_count; //count the child's descendants
        $this->children[] = $child; //add child to parent
    }

}
 