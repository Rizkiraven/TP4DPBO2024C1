<?php

class Hero extends DB
{
    function getHero()
    {
        $query = "SELECT hero.*, type.type_name, bestpos.jenis_langganan FROM hero
        LEFT JOIN type ON hero.type_id = type.type_id
        LEFT JOIN bestpos ON hero.bestpos_id = bestpos.bestpos_id ";
        return $this->execute($query);
    }

    function getHeroById($id) {
        $query = "SELECT * FROM hero WHERE id = '$id'";
        $result = $this->execute($query);
        return mysqli_fetch_assoc($result);
    }

    function add($data)
    {
        $hero_name = $data['hero_name'];
        $hero_altname = $data['hero_altname'];
        $hero_description = $data['hero_description'];
        $type_id = $data['type_id'];
        $bestpos_id = $data['bestpos_id'];

        $query = "insert into hero (hero_name, hero_altname, hero_description, type_id, bestpos_id) values ('$hero_name', '$hero_altname', '$hero_description', '$type_id', '$bestpos_id')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM hero WHERE id = '$id'";
        return $this->execute($query);
    }

    function update($data)
    {
        $hero_id = $data['hero_id'];
        $hero_name = $data['hero_name'];
        $hero_altname = $data['hero_altname'];
        $hero_description = $data['hero_description'];
        $type_id = $data['type_id'];
        $bestpos_id = $data['bestpos_id'];

        $hero_name = mysqli_real_escape_string($this->db_link, $hero_name);
        $hero_altname = mysqli_real_escape_string($this->db_link, $hero_altname);
        $hero_description = mysqli_real_escape_string($this->db_link, $hero_description);
        $type_id = mysqli_real_escape_string($this->db_link, $type_id);
        $bestpos_id = mysqli_real_escape_string($this->db_link, $bestpos_id);
    
        $query = "UPDATE hero SET hero_name = '$hero_name', hero_altname = '$hero_altname', hero_description = '$hero_description', type_id = '$type_id', bestpos_id = '$bestpos_id' WHERE hero_id = '$hero_id'";
        return $this->execute($query);
    }
}