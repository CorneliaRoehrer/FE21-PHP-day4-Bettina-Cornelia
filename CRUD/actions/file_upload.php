<?php

function file_upload($picture) {
    // this object will carry the status from the file upload
    $result = new stdClass(); 
    $result->fileName = 'product.png';
    // it could also be a boolean true/false:
    $result->error = 1;
    // collect data from object $picture:
    $fileName = $picture["name"];
    $fileType = $picture["type"];
    $fileTmpName = $picture["tmp_name"];
    $fileError = $picture["size"];
    $fileSize = $picture["size"];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $filesAllowed = ["png", "jpg", "jpeg"];

    if($fileError==4){
        $result->ErrorMessage="No picture was chosen. It can always be updated later.";
        return $result;
    } else {
        if(in_array($fileExtension, $filesAllowed)){
            // execute next condition
            if($fileError===0){
                // execute next condition
                if($fileSize<500000){ //500Kb this number is in bytes
                    // it gives a file name based microseconds
                    $fileNewName = uniqid('').''.''.$fileExtension;
                    $destination = "../pictures/$fileNewName";
                    if(move_uploaded_file($fileTempName, $destination)){
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                    }else{
                        $result->ErrorMessage = "There was an error uploading this file.";
                        return $result;
                    }
                }else{
                    $result->ErrorMessage = "This picture is bigger than the allowed 500Kb.<br>Please choose a smaller one and update the product.";
                    return $result;
                }
            }else{
                $result->ErrorMessage="There was an error uploading - $fileError code.Check the PHP documentation.";
                return $result;
            }
        }else{
                $result->ErrorMessage="This file type can't be uploaded.";
                return $result;
            }
        }
    }