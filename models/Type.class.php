<?php

class Type extends DB
{
    function getType()
    {
        $query = "SELECT * FROM type";
        return $this->execute($query);
    }

    function getTypeById($id)
    {
        $query = "SELECT * FROM type WHERE type_id = $id";
        $result = $this->execute($query);
        return mysqli_fetch_assoc($result);
    }

    function add($data)
    {
        $type_name = $data['tname'];
        $query = "INSERT INTO type (type_name) VALUES ('$type_name')";

        return $this->execute($query);
    }

    function update($id, $data)
    {
        $type_name = $data['tname'];
        $query = "UPDATE type SET type_name='$type_name' WHERE type_id=$id";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM type WHERE type_id=$id";
        return $this->execute($query);
    }
}