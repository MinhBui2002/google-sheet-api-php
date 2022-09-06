<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Google sheets api</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/sheetTable.css" type="text/css" />
	<style>
		/* Add a black background color to the top navigation */
		body {
			align-items: center;
			background-color: #000;
			display: flex;
			justify-content: center;
			height: 100vh;
		}

		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			font-family: sans-serif;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
		
		.styled-table tbody tr {
			background-color: #15172b;
			border: 1px solid white;
			color: white;
		}

		
		.topbar {
			background-color: #15172b;
			overflow: hidden;
			width: 100%;
			top: 0;
			font-family: sans-serif;
			position: fixed;
		}

		/* Style the links inside the navigation bar */
		.topbar a,
		i {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		/* Change the color of links on hover */
		.topbar a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Add a color to the active/current link */
		.topbar a.active {
			background-color: #04AA6D;
			color: white;
		}
	</style>
</head>

<body>
	<div class="topbar">
		<i class="bi bi-file-earmark-spreadsheet-fill"></i>
		<a href="./views/importForm.php">Import product</a>
		<a href="./index.php?act=listImport">Import sheet</a>
		<a href="./views/exportForm.php">Export product</a>
		<a href="./index.php?act=listExport">Export sheet</a>
	</div>

	<table class="styled-table">
		<tbody>
			<?php
			foreach ($result as $row) { ?>
				<tr>
					<td><?= $row[0] ?></td>
					<td><?= $row[1] ?></td>
					<td><?= $row[2] ?></td>
					<td><?= $row[3] ?></td>
					<td><?= $row[4] ?></td>
					<td><?= $row[5] ?></td>
					<td><?= $row[6] ?></td>

				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>

</html>