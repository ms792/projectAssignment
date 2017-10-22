<!DOCTYPE html>
<html>
<head>
    <style>
        body
        {
            background-color: aquamarine;
        }
    </style>
    <meta charset="UTF-8">
    <title>PHP Project</title>
</head>

<body>
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

/*
 * Class Name:                      FileView
 *
 * Description:                     This class allows the user to get the filename from the server directory and copy the data into a table.
 *                                  fgetcsv get the contents being stored in the csv files and displays in table format
 *
 * Class Fields:
 *          page       - sets the page name equal to a text object
 *          fileName   - gets the base filename from the client object and copies it to the server at given server directory
 *          handle     - converts the data in the file to csvContents and stores them in the html table
 *
 *
 * Class Functions:
 *
 *      Function Name: printHeader
 *      Description: request the page name and displays csv contents in table format
 *      Parameter: given files to upload
 *      Return Value: data being received from the csv file in uploads directory
 *
 *
 *
 *
 *
 */

class FileView
{
    public $fileName = '';
    public $page ='';
    public $handleX ='';

    function printPageHeader () {
        $this->page = $_REQUEST["pageName"];
        echo $this->page;
    }

    function printOpenFile(){
        $this->fileName = $_REQUEST['fileName'];
        //handles data submitted to the form
        $this->handleX = fopen($this->fileName, "r");
    }

    function printStartTable(){
        echo '<table border="1">';
    }

    function printHeader(){
        //displays csvContents in table format
        $csvContents = fgetcsv($this->handleX);
        echo '<tr>';
        foreach ($csvContents as $headerColumn) {
            echo "<th>$headerColumn</th>";
        }
        echo '</tr>';
    }

    function printBody(){
        while ($csvContents = fgetcsv($this->handleX)) {
            echo '<tr>';
            foreach ($csvContents as $column) {
                echo "<td>$column</td>";
            }
            echo '</tr>';
        }
    }

    function printEndTable(){
        echo '</table>';
    }

    function printCloseFile(){
        fclose($this->handleX);
    }
}

$fileViewObject = new FileView;
$fileViewObject->printPageHeader();
$fileViewObject->printOpenFile();
$fileViewObject->printStartTable();
$fileViewObject->printHeader();
$fileViewObject->printBody();
$fileViewObject->printEndTable();
$fileViewObject->printCloseFile();

?>


</body>
</html>

