<?php


	function activeClass($cond){
		echo $cond ? 'class="active"' : '';
	}

	function error($text){
        echo '<script>M.toast({html: "'.$text.'"})</script>';
    }
    function success($text){
        echo '<script>M.toast({html: "'.$text.'"})</script>';
    }

    function getUsers(){
        global $db;
        return $db->select('accounts', '', '*');
    }

    function getCustomers(){
        global $db;
        return $db->select('customers', 'shared LIKE "%'.$_SESSION['user']['username'].'%"', '*');
    }

    function getUser($userId){
        global $db;
        return $db->select('accounts', 'id="'.$userId.'"', '*')[0];
    }

    function getCustomer($customer){
        global $db;
        return $db->select('customers', 'id="'.$customer.'"', '*')[0];
    }

    function redirect($location){
        echo '<script>window.location = "'.$location.'"</script>';
    }

    function replaceVariables($input, $array){
        $output = $input;

        if(@$array){
            foreach ($array as $key => $value) {
                $output = str_replace('{{'.$key.'}}', $value, $output);
            }
        }

        return $output;
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'seconds',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'a while ago';
    }

    function sendEmail($to, $title, $body){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = 'UTF-8';
        $mail->IsHTML(true);
        $mail->Username = "support@imagets.com";
        $mail->Password = "1c2c3c4c";
        $mail->SetFrom('support@imagets.com', 'Tribal Banner Animation');
        $mail->Subject = $title;
        $mail->Body    = $body;
        $mail->AddAddress($to);
        $mail->Send();
    }
    function create_zip($files = array(),$destination = '') {
        //create the archive
        $zip = new ZipArchive();
        if($zip->open($destination, ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        //add the files
        foreach($files as $name => $file) {
            $zip->addFromString($name, $file);
        }
        //debug
        //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
        
        //close the zip -- done!
        $zip->close();
        
        //check to make sure the file exists
        return true;
    }