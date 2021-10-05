<?php
define("MAX", 5);
define("UPLOAD_FOLDER", "pictures/");

class UploadError extends Exception
{
}
class Upload
{
    private $_fileName = '';
    private $_filePath = '';

    function __construct($fileName)
    {
        $this->_fileName = $fileName;
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES[$this->_fileName])) {
            $this->upload();
        }
    }
    function upload()
    {
        try {
            // Check if file was uploaded without errors
            if ($_FILES[$this->_fileName]["error"] != 0)
                throw new UploadError("Error: " . $_FILES[$this->_fileName]["error"]);

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES[$this->_fileName]["name"];
            $filetype = $_FILES[$this->_fileName]["type"];
            $filesize = $_FILES[$this->_fileName]["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed))
                throw new UploadError("Error: Please select a valid file format.");

            // Verify file size - 5MB maximum
            $maxsize = MAX * 1024 * 1024;
            if ($filesize > $maxsize)
                throw new UploadError("Error: File size is larger than the allowed limit.");

            // Verify MYME type of the file
            if (!in_array($filetype, $allowed))
                throw new UploadError("Error: There was a problem uploading your file. Please try again.");

            // Check whether file exists before uploading it
            //if (file_exists(UPLOAD_FOLDER . $filename))
            //    throw new UploadError("Error: " . $filename . " is already exists.");

            // IF NO errors, then move the picture to Folder
            move_uploaded_file($_FILES[$this->_fileName]["tmp_name"], UPLOAD_FOLDER . $filename);
            $this->_filePath = UPLOAD_FOLDER . $filename;
            //echo "Your file was uploaded successfully.";

        } catch (UploadError $e) {
            echo $e->getMessage();
            die();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    public function getPath()
    {
        return $this->_filePath;
    }
}
