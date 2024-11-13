<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELIVERY ORDER #<?= $detail['REQUEST_ORDER']['ORDER_NO'] ?></title>
    <link rel="icon" href="<?= base_url('assets/img/cj-logo.png') ?>" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            /* width: 70%; */
            /* margin: auto; */
            border: 1px solid black;
            /* padding: 20px; */
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
            font-size: 12px;
            padding: 20px
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content th, .content td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        .content th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <img style="width: 200px;position: absolute;  text-align: left" src="./assets/img/logo.png" alt="">
            <h2 style="margin:25px 0px 0px 0px;">DELIVERY ORDER</h2>
            <h3 style="margin:0px;">AYAM BROILER</h3>
        </div>

        <div class="content">
            <table>
                <tr>
                    <td style="border: none; padding: 5px 10px">Pelanggan</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['FULL_NAME'] ?></td>
                    <td style="border: none; padding: 5px 10px">Plant</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['PLANT_NAME'] ?></td>
                </tr>
                <tr>
                    <td style="border: none; padding: 5px 10px; vertical-align: top !important;">Alamat</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['ADDRESS'] ?></td>
                    <td style="border: none; padding: 5px 10px">Order No.</td>
                    <td style="border: none; padding: 5px 10px">: #<?= $detail['REQUEST_ORDER']['ORDER_NO'] ?></td>
                </tr>
                <tr>
                    <td style="border: none; padding: 5px 10px">No. Telp</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['PHONE'] ?></td>
                    <td style="border: none; padding: 5px 10px">Farm</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['FARM_NAME'] ?></td>
                </tr>
                <tr>
                    <td style="border: none; padding: 5px 10px">No. Fax</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['FAX_NO'] ?></td>
                    <td style="border: none; padding: 5px 10px; vertical-align: top !important;">Lokasi</td>
                    <td style="border: none; padding: 5px 10px">: <?= $detail['ORDER']['FARM_ADDRESS'] ?></td>
                </tr>
                <tr>
                    <td style="border: none;">Jumlah</td>
                    <td style="border: none;">: <?= $detail['ORDER']['QTY'] ?> Ekor</td>
                    <td style="border: none;">BW</td>
                    <td style="border: none;">: <?= $detail['ORDER']['NOTE'] ?> KG</td>
                </tr>
                <tr>
                    <td style="border: none;">Catatan</td>
                    <td style="border: none;">: </td>
                </tr>
            </table>

            <!-- <p><strong>Jumlah:</strong> 350 Ekor &nbsp; | &nbsp; <strong>BW:</strong> 1,8-2,0 Kg</p> -->

            <table>
                <tr>
                    <th style="text-align: center">No.</th>
                    <th>Nama Barang</th>
                    <th style="text-align: center">Jumlah(Ekor)</th>
                    <th style="text-align: center">Ukuran (Kg)</th>
                </tr>
                <tr>
                    <td style="text-align: center">1</td>
                    <td style="width: 55%">AYAM BROILER</td>
                    <td style="text-align: right"><?= $detail['ORDER']['QTY'] ?></td>
                    <td style="text-align: center"><?= $detail['ORDER']['NOTE'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right"><strong>Total</strong></td>
                    <td style="text-align: right"><?= $detail['ORDER']['QTY'] ?> </td>
                    <td style="text-align: center"></td>
                </tr>
            </table>
            <!-- <p style="text-align: right; margin-top: 5px; font-style: italic;"><strong>[Tiga Ratus Lima Puluh Ekor]</strong></p> -->

            <p><strong>Berlaku dari tgl</strong>: <?= date('d M Y', strtotime($detail['REQUEST_ORDER']['ORDER_DATE'])) ?> <strong>s/d</strong> <?= date('d M Y', strtotime($detail['REQUEST_ORDER']['ORDER_DATE'])) ?></p>
        </div>

        <div class="footer">
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%"></td>
                    <td style="width: 50%;text-align: center">Disetujui, <br>Div. Kemitraan</td>
                </tr>
                <tr>
                    <td style="height: 70px"></td>
                    <td style="height: 70px"></td>
                </tr>
                <tr>
                    <td style="text-align: center">(........................................)</td>
                    <td style="text-align: center">(........................................)</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center">Cat. D.O ini hanya berlaku untuk 1 kali pengambilan</td>
                </tr>
            </table>
            <!-- <p>Disetujui,</p>
            <p>Div. Kemitraan</p>
            <div class="signature">
                <p>(N/A)</p>
                <p>Cat. D.O ini hanya berlaku untuk 1 kali pengambilan</p>
                <p>(N/A)</p>
            </div> -->
        </div>
    </div>
</body>
</html>
