<?php
//邮箱格式判断
function is_email($email)
{
    $pattern = "/\w+@(\w|\d)+\.\w{2,3}/i";
    $matches = array();
    if (preg_match($pattern, $email, $matches) && isset($matches[1])) {
        return true;
    }
    return false;
}
?>