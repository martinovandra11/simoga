<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <tr>
            <th>PKS</th>
            <th>Grade</th>
            <th>Produksi</th>
            <th>Persen</th>
        </tr>
        <?php foreach ($totalpkssgh as $tpks) :
            $detail_grade = $this->db->query("SELECT grade.grade,
            (
                SELECT SUM(netto) as a
                FROM sortasi_plasma WHERE sortasi_plasma.grade = grade.grade AND sortasi_plasma.kode_kebun = '$tpks[kode_kebun]' AND sortasi_plasma.tanggal = DATE(NOW())
            ) as totalnetto FROM grade WHERE grade.unit = '$tpks[kode_kebun]'")->result_array() ?>
            <tr>
                <td><?= $tpks['kode_kebun'] ?></td>
                <td>
                    <?php foreach ($detail_grade as $dg) : ?>
                        <div>
                            <div style="padding: 5px; text-align: center;"><?= $dg['grade']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($detail_grade as $dg) : ?>
                        <?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
                        <div style="padding: 5px; text-align: center;"><?= $dg['totalnetto']; ?></div>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($detail_grade as $dg) : ?>
                        <?php if ($dg['totalnetto'] == NULL) $dg['totalnetto'] = 0 ?>
                        <div style="padding: 5px; text-align: center;"><?= round($dg['totalnetto'] / $tpks['totalpkssgh'] * 100, 2); ?> %</div>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>