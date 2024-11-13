
    <?php

    function removeLastTwoDigits(int $number): int
    {
        $numberString = (string) $number;
        if (strlen($numberString) >= 2) {
            $newNumberString = substr($numberString, 0, -2);
            $newNumber = (int) $newNumberString;
            return $newNumber;
        } else {
            return $number;
        }
    }

    function fetchPaymentData()
    {
        include("../connection.php");




        $login = 'rzp_test_6K9SmN3WG0vH86';
        $password = 'agQT4HhD1KhZ9p8oy2ETPTr1';
        $url = 'https://api.razorpay.com/v1/payments/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result);
        // echo ($result);

        $sql = "SELECT payment_id FROM payment";
        $isExist = mysqli_query($con, $sql);

        if ($isExist->num_rows > 0) {
            $newquery = "DELETE FROM payment";
            mysqli_query($con, $newquery);
        }





        if ($result && $data) {
            for ($x = 0; $x < count($data->{'items'}); $x++) {

                $id = $data->{'items'}[$x]->{'id'};
                $status = $data->{'items'}[$x]->{'status'};
                $tid = $data->{'items'}[$x]->{'order_id'};
                $name = '';

                if ($data->{'items'}[$x]->{'notes'} && isset($data->{'items'}[$x]->{'notes'}->{'name'})) {
                    $name = $data->{'items'}[$x]->{'notes'}->{'name'};
                } else {
                    $name = 'No Name';
                }

                $email = $data->{'items'}[$x]->{'notes'}->{'email'};
                $amount = $data->{'items'}[$x]->{'amount'};
                $newNumber = removeLastTwoDigits($amount);


                $sql = "INSERT INTO payment(payment_id,transaction_id, name, email, payment,status) VALUES ('$id','$tid','$name','$email','$newNumber','$status')";
                mysqli_query($con, $sql);
            }
        }
    }
    ?>


 