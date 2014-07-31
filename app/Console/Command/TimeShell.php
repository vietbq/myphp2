<?php

class Timeshell extends AppShell {
   
    public function main() {
        
	$conn=mysql_connect("localhost", "myphp", "12345678") or die("can't connect database");
        mysql_select_db("myphp",$conn);
      

        $link = "http://tuyennq.codelovers.vn:8080/time.php";
        $html = file_get_contents($link);
        $this->out($html);
        $time = date("YmdHis", (int) $html);
       // $time = gmdate((int) $html);
        $this->out($time);
       
        $sql = "INSERT INTO  cake_time (time) VALUES ($time)";
         mysql_query($sql);

    } 
    
}
?>