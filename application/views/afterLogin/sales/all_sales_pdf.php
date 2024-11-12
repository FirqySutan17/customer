<?php     // fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");
     
    // membuat nama file ekspor "export-to-excel.xls"
    header("Content-Disposition: attachment; filename=export-to-excel.xls"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SALES</title>
</head>
<body>
	<!-- <table width="100%">
		<tr>
			<td width="30%" style="vertical-align: top; font-size: 24px;">
				<img src="<?= base_url() ?>assets/img/cj-logo.png" width="50" height="50">
				<br><br>
				<strong style="font-size: 16px;">PT. SUPER UNGGAS JAYA</strong>
				<br>
				Head Office :
				<br>
				Menara Jamsostek Lt. 15
				<br>
				Jl. Jend Gatot Subroto Kav 38
				<br>
				Jakarta 12710 - Indonesia
				<br>
				Tel. 62-21 5299 5106
				<br>
				Fax. 62-21 5299 5168
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 62-21 5299 5199
			</td>
		</tr>
	</table>
	<div style="height: 50px"></div> -->
	<table width="100%" style="border-collapse:collapse;">
		<thead>
			<tr>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">NO</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">INVOICE NO</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">INVOICE DATE</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">ORDER NO</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">KODE BARANG</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 24px" align="center">NAMA BARANG</td>
				<td colspan="2" style="border: 1px solid black; font-size: 24px" align="center">JUMLAH</td>
				<td colspan="2" style="border: 1px solid black; font-size: 24px" align="center">HARGA</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 2px; font-size: 24px" align="center">QTY</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 24px" align="center">WEIGHT</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 24px" align="center">PER UNIT</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 24px" align="center">TOTAL</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sales as $key => $vl): ?>
				<tr>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px" width="5%" align="center"><?= $key+1 ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px"><?= $vl->INVOICE_NO ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px"><?= date("Y-m-d", strtotime($vl->INVOICE_DATE)) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px"><?= $vl->ORDER_NO ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px"><?= $vl->ITEM ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px"><?= $vl->SHORT_NAME ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px" width="7%" align="right"><?= number_format($vl->QTY) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px" width="8%" align="right"><?= number_format($vl->BW, 2) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px" width="5%" align="right"><?= number_format($vl->UP) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 24px" width="10%" align="right"><?= number_format($vl->AMOUNT) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>