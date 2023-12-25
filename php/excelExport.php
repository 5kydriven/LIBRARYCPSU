<?php
    include 'db.php';

    require_once 'PhpXlsxGenerator.php';

    // Define column names 
    $booksData[] = array('Call Number', 'Title', 'Subtitle', 'Author', 'Publisher', 'Publisher Date', 'Section', 'Edition', 'Series', 'ISBN', 'Copyright', 'Copies', 'Book Dealer', 'Physical Description', 'Date Recieved', 'Notes', 'Source of Fund', 'Price', 'Account Number', 'Category'); 
    $logsData[] = array('ID Number', 'Name', 'Time-in', 'Time-out', 'Course', 'Type', 'Date');
    // Excel file name for download 
    $fileName = $_GET['dt'] . "-data_" . date('Y-m-d') . ".xlsx";    

    $xlsx;

    if($_GET['dt'] == 'books') {
        // Fetch records from database and store in an array 
        $sql = mysqli_query($conn, "SELECT * FROM books");
		while ($row = mysqli_fetch_array($sql)){               
            $lineData = array($row['callnum'], $row['title'], $row['subtitle'], $row['authors'], $row['publisher'], $row['publisherdate'], $row['section'], $row['edition'], $row['series'], $row['isbn'], $row['copyright'], $row['copies'], $row['bookdealer'], $row['physical'], $row['dateres'], $row['notes'], $row['srcfund'], $row['price'], $row['accnum'], $row['category']);  
            $booksData[] = $lineData; 
        } 
        $xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $booksData ); 

    }  else if ($_GET['dt'] == 'logs') {
        $sql = mysqli_query($conn, "SELECT * FROM log ORDER BY date ASC");
		while ($row = mysqli_fetch_array($sql)){               
            $lineData = array($row['idnumber'], $row['fullname'], $row['timein'], $row['timeout'], $row['course'], $row['type'], $row['date']);  
            $logsData[] = $lineData; 
        } 
        $xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $logsData ); 
    }
   
     // Export data to excel and download as xlsx file     
     $xlsx->downloadAs($fileName);

    exit(); 
?>