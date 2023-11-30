<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; box-sizing: border-box;">

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 50%;">
                <h3 style="margin-bottom: 10px;">PIMPINAN CABANG PERSATUAN ISLAM (PERSIS) PAMENGPEUK</h3>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%;"></td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%;"></td>
        </tr>
    </table>
    <hr style="border: 2px solid #000; margin: 0;">
    <hr style="border: 1px solid #000; margin: 0; margin-top:5px;">
    <table style="width: 100%; border-collapse: collapse; ">
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%;"></td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; margin-bottom: 10px; padding: 10px;">
                DATA OBJEK WAKAF
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%;">NO. <?= $data_objek_wakaf['NO_OBJEK'] ?></td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>NO.</strong> </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">
                <strong>NAMA MUWAKIF</strong>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>ALAMAT MUWAKIF</strong> </td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000;">1. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                <?= $muwakif['NAMA_MUWAKIF'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;"> <?= $muwakif['ALAMAT_MUWAKIF'] ?></td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top:20px;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>NO.</strong> </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">
                <strong>NADZHIR</strong>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>ALAMAT NADZHIR </strong></td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">1. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                <?= $nadzir['NAMA_NADZIR'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;"> <?= $nadzir['ALAMAT_NADZIR'] ?> </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top:20px;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">NO. </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">
                <strong>JENIS TANAH WAKAF</strong>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>LUAS</strong> </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>LOKASI WAKAF</strong> </td>

        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">1. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                <?= $data_objek_wakaf['JENIS_TANAH'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;"><?= $data_objek_wakaf['LUAS_TANAH'] ?> </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;"><?= $data_objek_wakaf['LOKASI_TANAH'] ?> </td>

        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top:20px;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">strong NO. </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">
                <strong>FUNGSI WAKAF</strong>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>LUAS</strong> </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>NAMA PENGELOLA</strong> </td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">1. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                <?= $data_objek_wakaf['FUNGSI_WAKAF'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;"><?= $data_objek_wakaf['LUAS_FUNGSI'] ?> </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;"><?= $data_objek_wakaf['NAMA_PENGELOLA'] ?> </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top:20px;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>NO.</strong> </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;">
                <strong>STATUS WAKAF</strong>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; background-color:grey; color:white; font-size:12px;"><strong>TANGGAL</strong> </td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">1. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                BASTW Nomor : <?= $data_objek_wakaf['BASTW_NOMOR'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;">Tanggal : <?= $data_objek_wakaf['TANGGAL_BASTW'] ?> </td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">2. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                AIW/PPAIW Nomor : <?= $data_objek_wakaf['AIW_NOMOR'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;">Tanggal : <?= $data_objek_wakaf['TANGGAL_AIW'] ?> </td>
        </tr>
        <tr>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 2px solid #000; font-size:12px;">3. </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                Sertifikat Nomor : <?= $data_objek_wakaf['SERTIFIKAT_NOMOR'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 2px solid #000; font-size:12px;">Tanggal : <?= $data_objek_wakaf['TANGGAL_SERTIFIKAT'] ?> </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top:20px;">
        <tr>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">
                JAMAAH : <?= $data_objek_wakaf['JAMAAH'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">RANTING :<?= $data_objek_wakaf['RANTING'] ?></td>
            <td style="box-sizing: border-box; padding: 0 5px; width: 10%; margin-bottom: 10px; padding: 10px; border: 2px solid #000; font-size:12px;">CABANG :<?= $data_objek_wakaf['CABANG'] ?></td>

        </tr>
    </table>


    <table style="width: 100%; border-collapse: collapse; border: 0 Cpx solid #000; margin-top:20px;">
        <tr>

            <td style="box-sizing: border-box; padding: 0 10px; width: 20%; margin-bottom: 10px; padding: 10px; border: 0px solid #000;">

            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 0px solid #000;"> </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 0px solid #000;"><?= $data_objek_wakaf['CABANG'] ?>< , <?= $this->M_gzl->ubahFormatTanggal($data_objek_wakaf['date_g']) ?> <br> PC PERSIS PAMENGPEUK</td>

        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; border: 0 Cpx solid #000; margin-top:100px;">
        <tr>

            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; margin-bottom: 10px; padding: 10px; border: 0px solid #000;">
                <?= $user['nama'] ?> <br> NIAT : <?= $user['NIAT'] ?>
            </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 10%; border: 0px solid #000;"> </td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 0px solid #000;">H. ENDANG ASMARA <br> NIAT : 0123123</td>
            <td style="box-sizing: border-box; padding: 0 10px; width: 33.33%; border: 0px solid #000;"> H. MUSNI TAMRGIN S.Ag <br> NIAT : 0123123</td>

        </tr>
    </table>

</body>

</html>