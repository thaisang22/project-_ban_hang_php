<?php

class user
{
    function insertUser($userName, $email, $password,$fullname,$diachi,$sodienthoai)
    {
        $db = new connect();
        $query = "INSERT INTO `tbl_user`(`username`, `pass`, `fullname`,`email_user`,`diachi`,`sodienthoai`) 
        VALUES ('$userName','$password','$fullname','$email','$diachi','$sodienthoai')";

        $result = $db->exec($query);
        return $result;
    }

    function checkUser($userName, $email)
    {
        $db = new connect();
        $select = "SELECT `id_user`, `username`, `pass`, `email_user` 
                FROM `tbl_user` 
                WHERE username = '$userName' OR email_user = '$email';
                ";
        $result = $db->getInstance($select);
        return $result;
    }

    function checkLoginUser($userName, $pass){
        $db = new connect();
        // Use prepared statements to prevent SQL injection
        $select = "SELECT * FROM `tbl_user` WHERE username = '$userName' AND pass = '$pass';";
        $result = $db->getInstance($select);
        return $result;
    }

    

    function checkEmail($email) {

        $db= new connect(); 
        $select ="SELECT * FROM `tbl_user` WHERE email_user = '$email'";
        $rs = $db->getList($select);
        return $rs;
    }

    function resetPassword($email, $password) {
        $db = new connect();
        $query = "UPDATE tbl_user SET pass = '$password' WHERE email_user ='$email' ";
        $rs = $db->getInstance($query);
        return $rs;
    }
    
    

}
?>