<?php
class M_login extends CI_Model
{
    function masuk($user, $pass)
    {
        $a = array(
            ' ', '"', "'"
        );
        $b =  array('noinjectxxxxxx', 'noinjectxxxxxx', 'noinjectxxxxxx');


        // $u = str_replace($a, $b, $user);
        // $p = str_replace(" ", "noinjectxxxxxx", $pass);

        $query = "SELECT * FROM `t_admin` WHERE `username` = '" . addslashes($user) . "' AND `password` = '" . addslashes($pass) . "' ";
        $res = $this->db->query($query);

        $count = $res->num_rows();
        return $count;
    }

    function log($id, $logname, $username, $ip, $device, $time)
    {
        $this->db->query("INSERT INTO `t_log_history`(`id_log`, `log_name`, `username`, `ip`, `device`, `time`) VALUES ('$id','$logname','$username','$ip','$device','$time')");
    }
}