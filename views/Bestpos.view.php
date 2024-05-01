<?php
class BestposView
{
    public function render($data)
    {
        $no = 1;
        $dataBestpos = null;
        foreach ($data as $val) {
            list($id, $nama) = $val; {
                $dataBestpos .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='bestpos.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='bestpos.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
            }
        }
        $tpl = new Template("templates/bestpos.html");
        $tpl->replace("DATA_TABEL", $dataBestpos);
        $tpl->write();
    }
}
