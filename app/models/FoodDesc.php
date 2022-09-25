<?php
class FoodDesc
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFoodDescs()
    {

        $this->db->query('SELECT ndb_no, long_desc FROM food_des LIMIt 20');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getFoodNutritionalElements($ndb_no)
    {
        
        $this->db->query('SELECT * FROM nut_data WHERE ndb_no = :ndb_no');

        // Bind values
        $this->db->bind(':ndb_no', $ndb_no);

        $results = $this->db->resultSet();

        return $results;
    }
}
