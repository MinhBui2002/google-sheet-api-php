<?php

include "models/sheetAPI.php";
class SheetController
{

    public function __construct()
    {
        $this->model = new sheetAPi();
    }

    public function sheetHandler()
    {  //CRUD action on sheets      
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) {
            case 'insertImport':
                $this->insertRowImport();
                break;
            case 'insertExport':
                $this->insertRowExport();
                break;
            case 'listExport':
                $this->getAll('Sheet2');
                break;
            case 'listImport':
                $this->getAll('Sheet1');
                break;
            default:
                $this->getAll('Sheet1');
        }
    }

    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }

    public function getAll(string $range)
    {
        if ($range == 'Sheet1') {
            $result = $this->model->getAllRows($range); // render all rows from sheets to view
            require_once('views/importSheet.php');
        } elseif ($range == 'Sheet2') {
            $result = $this->model->getAllRows($range); // render all rows from sheets to view
            require_once('views/exportSheet.php');
        }
    }

    public function validateExport(array $exportLine)
    {
        $check = true;
        $flag = false;
        $importSheet = $this->model->getAllRows('Sheet1');
        $exportSheet = $this->model->getAllRows('Sheet2');
        if (count($importSheet) <= count($exportSheet)) {
            $check = false;
        } else {
            for ($i = 1; $i < count($importSheet); $i++) {
                for ($j = 1; $j <= 1; $j++) {
                    if ($exportLine[0][1] == $importSheet[$i][$j]) {

                        $flag = true;
                    }
                }
            }
            if ($flag == true) {
                $check = true;
            } else {
                $check = false;
            }
        }
        return $check;
    }

    public function insertRowImport()
    {
        try {
            if (isset($_POST['addImport'])) {
                $name = $_POST['name'];
                $codePro = $_POST['code'];
                $unit = $_POST['unit'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $totalPrice = $quantity * $price;
                $newLine =  [
                    [
                        $name,
                        $codePro,
                        $unit,
                        $quantity,
                        $price,
                        $totalPrice
                    ]
                ];
                if ($this->validateExport($newLine) == false) { ?>

                    <script type="text/javascript">
                        alert('Insert new row fail failed !');
                        window.location.href = '';
                    </script>
                <?php
                } else {
                    $this->model->InsertRow($newLine, 'Sheet1');
                }
            } else {
                $this->pageRedirect("views/importForm.php");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function insertRowExport()
    {
        try {
            if (isset($_POST['addExport'])) {
                $name = $_POST['name'];
                $codePro = $_POST['code'];
                $unit = $_POST['unit'];
                $newLine =  [
                    [
                        $name,
                        $codePro,
                        $unit,

                    ]
                ];
                if ($this->validateExport($newLine) == false) { ?>

                    <script type="text/javascript">
                        alert('Insert new row fail failed !');
                        window.location.href = '';
                    </script>
<?php
                } else {
                    $this->model->InsertRow($newLine, 'Sheet2');
                }
            } else {
                $this->pageRedirect("views/importForm.php");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
