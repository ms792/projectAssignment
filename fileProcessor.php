<html>
<head>
</head>
<style>
    body
    {
        background-color: aquamarine;
    }
</style>
<body>


<form action="" method="post" enctype="multipart/form-data">

    <h1>Select a File and Upload to the AFS Server</h1>

    Select file to upload:

    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">


</form>


<?php
//display errors in php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
/*
 * Class Name:                      FileProcessor
 *
 * Description:                     This class allows the user to get the base filename from the FILE client object and copy it to the server at give server directory.
 *                                  move_uploaded_file copies the file from client source to server destination.
 *
 * Class Fields:
 *          targetDir               - sets the file in the server from the client object
 *          targetFileName          - gets the base filename from the client object and copies it to the server at given server directory
 *          targetImageFileType     - sets the file type to .csv
 *
 *
 * Class Functions:
 *
 *      Function Name: getTargetFileName
 *      Description: get the base filename from the client object and stores it in the server directory
 *      Parameter: given files to upload
 *      Return Value: name of the file being stored in uploads directory
 *
 *
 *
 *
 *
 */
class FileProcessor {
    public $targetDir = 'uploads/';
    public $targetFileName = '';
    public $targetImageFileType = '';
    function getTargetFileName() {
        if(isset($_FILES["fileToUpload"]) )
            return $this->targetDir . basename($_FILES["fileToUpload"]["name"]);
        else
            false;
    }
    function getImageFileType() {
        return pathinfo($this->targetFileName, PATHINFO_EXTENSION);;
    }
    function copyDestinationFile() {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->targetFileName );
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    }
    function setupTableView() {
        $page = '<h1>Table View</h1>';
        //set the location of the second page
        header("Location:index.php?pageId=2&pageName=$page&fileName=" . $this->targetFileName);
    }
    function process ()
    {
        $this->targetFileName = $this->getTargetFileName();
        if(isset($this->targetFileName))
            $this->targetImageFileType = $this->getImageFileType();
        else
            echo 'Please select CSV file to upload' . "\n";
        //check whether the file is posted as html table in next page
        if (isset($_POST['submit'])) {
            //set the file type to comma separated values
            if ($this->targetImageFileType == 'csv') {
                $this->copyDestinationFile();
                $this::setupTableView();
            } else {
                echo 'You can only upload a CSV file' . "\n";
            }
        }
    }
}
/*
 * instantiates classes, methods and objects
 */
$processor = new FileProcessor;
$processor->process();
?>

</body>
</html>