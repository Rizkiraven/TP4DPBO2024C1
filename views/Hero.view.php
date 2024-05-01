<?php
class HeroView
{
    public function render($data)
    {
        $no = 1;
        $dataHero = null;
        $dataType = null;
        $dataBestpos = null;
            foreach($data['hero'] as $val){
                list($hero_id, $hero_name, $hero_altname, $hero_description, $type_id, $bestpos_id) = $val;
                $dataHero .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $hero_name . "</td>
                        <td>" . $hero_altname . "</td>
                        <td>" . $hero_description . "</td>
                        <td>" . $type_id . "</td>
                        <td>" . $bestpos_id . "</td>
                        <td>
        <a class='btn btn-success' href='edit.php?id=" . $hero_id . "'>Edit</a>
        <a class='btn btn-danger' href='delete.php?id=" . $hero_id . "'>Delete</a>
        </td>
        </tr>";
        }

        foreach($data['type'] as $val){
            list($type_id, $type_name) = $val;
            $dataType .= "<option value='".$type_id."'>".$type_name."</option>";
        }

        foreach($data['bestpos'] as $val){
            list($bestpos_id, $bestpos_name) = $val;
            $dataBestpos .= "<option value='".$bestpos_id."'>".$bestpos_name."</option>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("OPTION", $dataType);
        $tpl->replace("OPTION2", $dataBestpos);
        $tpl->replace("DATA_TABEL", $dataHero);
        $tpl->write();
    }
}