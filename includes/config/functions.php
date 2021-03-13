<?php

function base_url()
{
    return "http://unitedhealthagency.com/adminiar/";
}

function getClientIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
        return $_SERVER["REMOTE_ADDR"];
    }
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
    return getenv('REMOTE_ADDR');
}

function is_ajax_request(){
    return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

function show_404(){
    http_response_code(404);
    include('../includes/my_404.php'); // provide your own HTML for the error page
    die();
}

function sanitize_input($str)
{
    $str = trim($str);   
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    return $str;

}

function __exit_json($status='error',$msg='Invalid request!', $data = array())
{
    if (is_array($status)){
        exit(json_encode($status));
    } else if (is_string($status)){
        exit(json_encode(array('status'=>$status,'msg'=>$msg, 'data' => $data)));
    } else {
        exit(json_encode(array('status'=>'error','msg'=>'Invalid request!')));
    }
}

function valid_url($url)
{
    if(preg_match("/^http(|s):\/{2}(.*)\.([a-z]){2,}(|\/)(.*)$/i", $url)) {
        if(filter_var($url, FILTER_VALIDATE_URL)) return TRUE;
    }
    return FALSE;
}

function checkEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {      
        return TRUE;
    }
    return FALSE;
}

function checkInput($str)
{
    if(preg_match("/^[a-zA-Z ]*$/",$str))
    {
      return TRUE;
    }
    return FALSE;
}

function check_image($image)
{
    if($image!='')
    {
        // get the image extension
        $extension = substr($image,strlen($image)-4,strlen($image));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(in_array($extension,$allowed_extensions))
        {            
            return TRUE;
        }
    }
    return FALSE;
}

function check_file($image)
{
    if($image!='')
    {
        // get the image extension
        $extension = substr($image,strlen($image)-4,strlen($image));
        // allowed extensions
        $allowed_extensions = array(".pdf",".docx",".doc",".TXT");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(in_array($extension,$allowed_extensions))
        {            
            return TRUE;
        }
    }
    return FALSE;
}

function rename_image($image)
{
    if($image!='')
    {
        // get the image extension
        $extension = substr($image,strlen($image)-4,strlen($image));
        // allowed extensions
        $imgnewfile=md5($image).$extension;
        return $imgnewfile;
    }
}
?>