<?php session_start();
if (!isset($_SESSION['capcode']) && empty($_SESSION['capcode'])) {
    echo '<div align="center"><h3>Sending Email Failed!</h3></div>';exit;
} elseif (!empty($_SESSION['capcode']) && $_SESSION['capcode'] == $_POST['capcode']) {

  $_SESSION['capcode'] = "";

    $pathdir = $_SERVER['DOCUMENT_ROOT']; //'/home/admin/domains/intervision.in/public_html/demo';
    include_once $pathdir . '/assets/mail/class.phpmailer.php';
/*Setup mailer*/
    $mailer = new PHPMailer(true);
    try {

        //$mailer->IsSMTP(); // ปิด IsSMTP คือไม่ส่ง email ด้วย SMTP ครับผม
        $mailer->SMTPDebug = 1;
        // 1 = errors and messages
        // 2 = Full Error messages
        $mailer->SMTPAuth = true;
        //$mailer->SMTPSecure = "tls"; //
        $mailer->Host = "mail.posvision.co"; //smtp.gmail.com
        $mailer->Port = "25"; //465
        $mailer->Username = "noreply@posvision.co";
        $mailer->Password = "AOwDfk~Hokbb";
        $mailer->CharSet = "UTF-8";

        $html = 'คุณ ' . $_POST['name'] . '<br>e-mail: ' . $_POST['email'] . '<br>เบอร์ติดต่อ: ' . $_POST['phone'] . '<br>ข้อความ: ' . $_POST['messages'];

        $result = "";
        $mailer->SetFrom("noreply@intervision.in", "Intervision");
        $mailer->AddReplyTo("noreply@intervision.in", "Intervision");
        $mailer->Subject = 'Get in Touch with Our Team';
        $mailer->MsgHTML($html);
        $mailer->AddAddress("admin@intervision.co", "Administrator");
        // $mailer->AddAddress("gggia36@gmail.com", "Administrator");
        //$mailer->AddBCC("gggia36@gmail.com", "Contact admin");
        $result = $mailer->Send();

        $res = array();

        $res['status'] = "N";

        if ($result) {
          $res['status'] = "Y";
            echo json_encode($res);
        } else {
            echo '<div align="center"><h3>Sending Email Failed!</h3></div>';
        }

    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }

} else {
    echo '<div align="center"><h3>Sending Email Failed!</h3></div>';exit;
}
