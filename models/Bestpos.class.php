<?php

class Bestpos extends DB
{
    function getBestpos()
    {
        $query = "SELECT * FROM bestpos";
        return $this->execute($query);
    }

    function getBestposById($id)
    {
        $query = "SELECT * FROM bestpos WHERE bestpos_id = $id";
        $result = $this->execute($query);
        return mysqli_fetch_assoc($result);
    }

    function add($data)
    {
        $bestpos_name = $data['tname'];
        $query = "INSERT INTO bestpos (bestpos_name) VALUES ('$bestpos_name')";

        return $this->execute($query);
    }

    function update($id, $data)
    {
        $bestpos_name = $data['tname'];
        $query = "UPDATE bestpos SET bestpos_name='$bestpos_name' WHERE bestpos_id=$id";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM bestpos WHERE bestpos_id=$id";
        return $this->execute($query);
    }
}