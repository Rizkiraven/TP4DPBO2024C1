<?php
class TypeView
{
    public function render($data)
    {
        $no = 1;
        $dataType = null;
        foreach ($data as $val) {
            list($id, $nama) = $val; {
                $dataType .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='type.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='type.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
            }
        }
        $tpl = new Template("templates/type.html");
        $tpl->replace("DATA_TABEL", $dataType);
        $tpl->write();
    }
}
