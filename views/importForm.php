<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Google sheets api</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/sheetForm.css">
</head>

<body>
	<div class="topbar">
		<i class="bi bi-file-earmark-spreadsheet-fill"></i>
		<a href="./views/importForm.php">Import product</a>
		<a href="./index.php?act=listImport">Import sheet</a>
		<a href="./views/exportForm.php">Export product</a>
		<a href="./index.php?act=listExport">Export sheet</a>
	</div>


	<!-- <form action="../index.php?act=insertImport" method="post" class="text-center mt-5">
		<div class="form-group">
			<label for="">Enter product name</label>
			<input type="text" name="name" id="" />
		</div>
		<div class="form-group">
			<label for="">Enter product code</label>
			<input type="text" name="code" id="" />
		</div>
		<div class="form-group">
			<label for="">Enter unit</label>
			<input type="number" name="unit" id="" />
		</div>
		<div class="form-group">
			<label for="">Enter quantity</label>
			<input type="number" name="quantity" id="" />
		</div>
		<div class="form-group">
			<label for="">Enter unit price</label>
			<input type="number" name="price" id="" />
		</div>

		<input type="submit" name="addImport" class="btn btn-primary" value="Submit">
	</form> -->

	<form action="../index.php?act=insertImport" method="post" class="form">
		<div class="title">Import products</div>
		<div class="input-container ic1">
			<input id="name" class="input" name="name" type="text" placeholder=" " />
			<label for="name" class="placeholder">Product name</label>
		</div>
		<div class="input-container ic2">
			<input id="code" name="code" class="input" type="text" placeholder=" " />
			<label for="code" class="placeholder">Product code</label>
		</div>
		<div class="input-container ic2">
			<input id="unit" name="unit" class="input" type="number" placeholder=" " />
			<label for="unit" class="placeholder">Product unit</>
		</div>
		<div class="input-container ic2">
			<input id="quantity" name="quantity" class="input" type="number" placeholder=" " />
			<label for="quantity" class="placeholder">Product quantity</>
		</div>
		<div class="input-container ic2">
			<input id="price" name="price" class="input" type="number" placeholder=" " />
			<label for="price" class="placeholder">Product price</>
		</div>
		<input type="submit" name="addImport" class="submit" value="Submit">
	</form>


</body>

</html>