<?php

$errors = [];
if($_POST['name'] == '')
    $errors[] = 'Enter your name!';
elseif($_POST['password'] == '')
    $errors[] = 'Enter your password!';
elseif($_POST['email'] == '')
    $errors[] = 'Enter your Email!';
elseif($_POST['text'] == '')
    $errors[] = 'Enter text!';
elseif(empty($errors))
{
    //добавить комментарий
}else
{
    //вывести ошибку
    echo $errors[0];
}

if(isset($_POST['submit']) && empty($errors))
{
    echo 'Eeeeeeeeeeeeeeeeee!!!!!';
}




