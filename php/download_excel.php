<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";
require '../PHPExcel-1.8/Classes/PHPExcel.php';

function filterData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

if (isset($_GET['log'])) {
    $filename = "user_log" . date('ymd') . ".xls";

    $fields = array('DATE', 'TIME IN', 'TIME OUT', 'NAME', 'COLLEGE/YEAR', 'TYPE');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    $sheet->fromArray([$fields], null, 'A1');

    $query = mysqli_query($conn, "SELECT * FROM `log` ORDER BY logid DESC") or die("query failed");

    if (mysqli_num_rows($query) > 0) {
        $row = 2;
        while ($data = mysqli_fetch_assoc($query)) {
            $row_data = array($data['date'], $data['timein'], $data['timeout'], $data['fullname'], $data['course'], $data['type']);
            array_walk($row_data, 'filterData');
            $sheet->fromArray([$row_data], null, 'A' . $row);
            $row++;
        }

        // Autofit columns
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Cache-Control: max-age=0");

        $objWriter->save('php://output');
        exit;
    } else {
        $excel_data = 'No records Found';
    }

} elseif (isset($_GET['books'])) {
    
    $filename = "Books" . ".xls";

    $fields = array('TITLE', 'SUBTITLE', 'AUTHORS', 'STATE 1', 'STATE 2', 'STATE 3', 'EDITION', 'PUBLICATION', 'PUBLISHER', 'PUBLISHER DATE', 'SERIES', 'SUB 1', 'SUB 2', 'SUB 3', 'ISBN', 'COPYRIGHT', 'COPIES', 'CATEGORY', 'SECTION', 'PHYSICAL', 'CALL NUMBER', 'BOOK DEALER', 'ACC NUMBER');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    $sheet->fromArray([$fields], null, 'A1');

    $query = mysqli_query($conn, "SELECT * FROM `BOOKS` ORDER BY bookid DESC") or die("query failed");

    if (mysqli_num_rows($query) > 0) {
        $row = 2;
        while ($data = mysqli_fetch_assoc($query)) {
            $row_data = array($data['title'], $data['subtitle'], $data['authors'], $data['state1'], $data['state2'], $data['state3'], $data['edition'], $data['publication'], $data['publisher'], $data['publisherdate'], $data['series'], $data['sub1'], $data['sub2'], $data['sub3'], $data['isbn'], $data['copyright'], $data['copies'], $data['category'], $data['section'], $data['physical'], $data['callnum'], $data['bookdealer'], $data['accnum'],);
            array_walk($row_data, 'filterData');
            $sheet->fromArray([$row_data], null, 'A' . $row);
            $row++;
        }

        // Autofit columns
        foreach (range('A', 'W') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Cache-Control: max-age=0");

        $objWriter->save('php://output');
        exit;
    } else {
        $excel_data = 'No records Found';
    }


} elseif (isset($_GET['borrow'])) {

} else {

}
