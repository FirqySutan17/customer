<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INVOICE</title>
</head>
<body>
	<table width="100%">
		<tr>
			<td width="30%" style="vertical-align: top; font-size: 12px;">
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
			<td width="30%" align="center">
				<span style="font-size: 18px;"><strong>INVOICE</strong></span>
				<div style="border-top: 5px black solid; height: 1px; margin-left: 15px; margin-right: 15px; margin-top: 25px;"></div>
				<span>No. <?= $invoice_data[0]->INVOICE_NO ?></span>
			</td>
			<td width="40%" style="vertical-align: bottom;">
				<table width="100%" style="border-collapse: collapse;">
					<tr>
						<td style="border: 1px black solid" colspan="2">
							<p style="padding-left: 5px; font-size: 12px;">
								Kepada Yth :
								<br>
								TRIJAYA INTAN PURNAMA, CV
								<br><br>
								JL. DEWI SARTIKA NO. 312 RT 9 RW 4, CAWANG,
								KRAMAT JATIJAKATRA TIMUR
							</p>
						</td>
					</tr>
					<tr>
						<td style="border: 1px black solid; font-size: 12px;">Tanggal</td>
						<td style="border: 1px black solid; font-size: 12px;">&nbsp;&nbsp;<?= $invoice_data[0]->INVOICE_DATE ?></td>
					</tr>
					<tr>
						<td style="border: 1px black solid; font-size: 12px;">No. D.O.</td>
						<td style="border: 1px black solid; font-size: 12px;">&nbsp;&nbsp;<?= !empty($invoice_data[0]->DELIVERY_NO) ? $invoice_data[0]->DELIVERY_NO : '' ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="height: 50px"></div>
	<table width="100%" style="border-collapse:collapse;">
		<thead>
			<tr>
				<td rowspan="2" style="border: 1px solid black; font-size: 12px" align="center">NO</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 12px" align="center">KODE BARANG</td>
				<td rowspan="2" style="border: 1px solid black; font-size: 12px" align="center">NAMA BARANG</td>
				<td colspan="2" style="border: 1px solid black; font-size: 12px" align="center">JUMLAH</td>
				<td colspan="2" style="border: 1px solid black; font-size: 12px" align="center">HARGA</td>
			</tr>
			<tr>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="center">QTY</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="center">WEIGHT</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="center">PER UNIT</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="center">TOTAL</td>
			</tr>
		</thead>
		<tbody>
			<?php $total_qty = 0; $total_bw = 0; $total = 0; ?>
			<?php foreach ($invoice_data as $key => $vl): ?>
				<tr>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px" width="5%" align="center"><?= $key+1 ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px"><?= $vl->ITEM ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px"><?= $vl->SHORT_NAME ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px" width="7%" align="right"><?= number_format($vl->QTY) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px" width="8%" align="right"><?= number_format($vl->BW, 2) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px" width="10%" align="right"><?= number_format($vl->UP) ?></td>
					<td style="border: 1px solid black; padding: 2px; font-size: 12px" width="15%" align="right"><?= number_format($vl->AMOUNT) ?></td>
				</tr>
				<?php $total_qty += $vl->QTY; $total_bw += $vl->BW; $total += $vl->AMOUNT; ?>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" colspan="3" align="right">TOTAL</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($total_qty) ?></td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($total_bw, 2) ?></td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"></td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($total) ?></td>
			</tr>
			<tr>
				<td style="font-size: 12px">Lembar</td>
				<td colspan="2" style="font-size: 12px">1. Putih : Asli</td>
				<td colspan="3" style="border: 1px solid black; padding: 2px; font-size: 12px">Potongan</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2" style="font-size: 12px">2. Kuning : Accounting</td>
				<td colspan="3" style="border: 1px solid black; padding: 2px; font-size: 12px">Harga Sebelum PPN</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($total) ?></td>
			</tr>
			<?php $ppn = 0; ?>
			<tr>
				<td></td>
				<td colspan="2" style="font-size: 12px">3. Biru : Marketing</td>
				<td colspan="3" style="border: 1px solid black; padding: 2px; font-size: 12px">PPN 10%</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($ppn, 2) ?></td>
			</tr>
			<tr>
				<td colspan="3" style="font-size: 12px"></td>
				<td colspan="3" style="border: 1px solid black; padding: 2px; font-size: 12px">Jumlah Yang Harus Dibayar</td>
				<td style="border: 1px solid black; padding: 2px; font-size: 12px" align="right"><?= number_format($total + $ppn, 2) ?></td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td colspan="4" style="font-size: 12px">Terbilang : Empat belas Juta Tujuh Ratus Empat Puluh Tiga Ribu Tujuh Ratus Rupiah</td>
			</tr>
			<tr>
				<td colspan="7" height="150"></td>
			</tr>
			<tr>
				<td colspan="5" style="font-size: 12px">
					Jatuh Tempo : <?= date('Y.m.d', strtotime($invoice_data[0]->INVOICE_DATE.' +1 month')) ?>
					<br>
					Pembayaran dapat dilakukan melalui : BCA Cabang SCBD Jakarta 006.309.5114
				</td>
				<td colspan="2" style="font-size: 12px" align="center">
					DIAH
					<div style="border-top: 1px solid black"></div>
					ACCT & FIN
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>