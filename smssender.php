<?php
    $notif = new Sms_notif;

    $notif->checkLate();

    class Sms_Notif{

        public function checkLate(){
            $attendance = Db::checkAttendance();
            foreach($attendance as $each){
                $time = date('H:i:s', strtotime($each['time']));
                $num = $each['g_number']; 
                if($each['attendance_date'] != ''){
                    if($num != ''){
                        if($time > '5:00:59'){
                            SMSSender_API::addSms('63'.$num, $each['s_name'].' is late for this day');
                        } else {
                            if( $num{0} == "0" ) {
                                $num = substr($num, 1);
                            }
                            if($each['meridiem'] == 'am'){
                                if($time > '08:15:59'){
                                    SMSSender_API::addSms('63'.$num, 'This is to inform you that your son/daughter '.$each['s_name'].' is late for today (morning).');
                                }
                            } else if ($each['meridiem'] == 'pm'){
                                if($time > '13:15:59'){
                                    SMSSender_API::addSms('63'.$num, 'This is to inform you that your son/daughter '.$each['s_name'].' is late for today (afternoon).');
                                }
                            }
                            
                        }
                    }
                } else {
                    SMSSender_API::addSms('63'.$num, 'This is to inform you that your son/daughter '.$each['s_name'].' is absent for today.');
                }
            }
        }
    }
    class Db{
        public static function conn(){
            $conn = new mysqli("localhost", "root", "", "db_spta");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn; 
        }
        public static function checkAttendance(){
            $conn = self::conn();
            $sql = "SELECT g.contact_number g_number, CONCAT(s.last_name,', ',s.first_name,' ',s.middle_name) s_name, attendance.*
                    FROM 
                        tbl_students s
                    INNER JOIN
                        tbl_student_guardian sg
                    ON sg.student_id = s.id
                    INNER JOIN
                        tbl_guardian g
                    ON g.id = sg.guardian_id
                    LEFT JOIN(
                        SELECT * 
                        FROM
                        tbl_attendance a
                        WHERE a.attendance_date = '".date('Y-m-d')."'
                    ) attendance
                    ON attendance.student_id = s.id";
            $result = $conn->query($sql) or die($conn->error);
            $arr = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arr[] = $row;
                }
            }
            return $arr;
            
        }

    }
    
    /**	SMSSender_API Class
     *		- Date Created: 2019-02-07 12:28 AM
    *		- Author: Jenelyn C. Contillo
    */


    class SMSSender_API {

        protected $url_link = "https://sendersmsserver.000webhostapp.com/api/add_sms";
        protected $site_key = "072f15a896c80fea00c43649098d55ac";
        static function addSms($recipient,$message){
            
            $curl_connection = curl_init("https://sendersmsserver.000webhostapp.com/api/add_sms");
            curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

            $post_data = array();

            //recipient format = 639xxxxxxxxx
            $post_data['recipient'] = $recipient;
            $post_data['message'] = $message;
            $post_data['system_code'] = "072f15a896c80fea00c43649098d55ac";

            $post_items = array();
            foreach ( $post_data as $key => $value)
            {
                $post_items[] = $key . '=' . $value;
            }
            $post_string = implode ('&', $post_items);
            
            curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
            $result = curl_exec($curl_connection);
            
            curl_close($curl_connection);
            
            print_r($result);

            if($result != "")
                return json_decode($result);

            return false;

            exit;
            
        }
        

    }
?>