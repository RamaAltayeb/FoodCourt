<?php
class FoodGroup
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getGroups()
    {
        $this->db->query('SELECT * FROM fd_group WHERE fddrp_desc != \'null\'');

        return $this->db->resultSet();
    }

    public function findGroupByCD($cd)
    {
        $this->db->query('SELECT * FROM fd_group WHERE fdgrp_cd = :cd');
        $this->db->bind(':cd', $cd);

        $this->db->single();

        //Check Rows
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addGroup($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO fd_group (fdgrp_cd, fddrp_desc) 
      VALUES (:fdgrp_cd, :fddrp_desc)');

        // Bind Values
        $this->db->bind(':fdgrp_cd', $data['fdgrp_cd']);
        $this->db->bind(':fddrp_desc', $data['fddrp_desc']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteGroup($id)
    {
        if (sizeof($this->getGroupFoods($id)) > 0) {
            // Prepare Query
            $this->db->query('UPDATE fd_group SET fddrp_desc = \'null\' WHERE fdgrp_cd = :id');
        } else {
            // Prepare Query
            $this->db->query('DELETE FROM fd_group WHERE fdgrp_cd = :id');
        }
        // Bind Values
        $this->db->bind(':id', $id);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getGroupFoods($id)
    {
        // Prepare Query
        $this->db->query('SELECT * FROM food_des WHERE fdgrp_cd = :id');

        // Bind Values
        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }
}
