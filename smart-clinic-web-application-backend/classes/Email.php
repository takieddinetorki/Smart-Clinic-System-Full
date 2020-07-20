<?php
 class Email
 {
    private $mail;

    public function __construct()
    {
      $this->mail = new PHPMailer();
      //when we will use live server will not use isSMTP function any more
      $this->mail->isSMTP();
      //the host is set to gmail only for now we will have our own
      $this->mail->Host = 'smtp.gmail.com';
      $this->mail->Port = 587;
      $this->mail->SMTPAuth = true;
      $this->mail->SMTPSecure = 'tls';
      //username also for temporary I created a dummy one, we need to create our special one from cpanel 
      $this->mail->Username = 'smartclinic10001@gmail.com';
      $this->mail->Password = 'S1234@5678';
      $this->mail->isHTML(true);
    }

    public function passwordChangeRequest($sendTo)
    {
      $this->mail->sentFrom('smartclinic10001@gmail.com','Smart Clinic');
      $this->mail->addAddress($sendTo);
      $this->mail->addReplyTo('smartclinic10001@gmail.com');
      $this->mail->Subject = 'Pasword Change';
      $this->mail->Body = '<h1 align=center>Please tell ui/ux to create a good GUI for this.</h1>
      <a align=center href="www.google.com">Change Password</a>
      ';
      if($this->mail->send()) echo 'Message sent please check at'. Input::get('email');
      else echo 'Message not sent to'. Input::get('email');
    }
    public function level3LogWarning($admins) {
      $this->mail->sentFrom('smartclinic10001@gmail.com','Smart Clinic');
      $this->mail->addAddress($sendTo);
      $this->mail->addReplyTo('smartclinic10001@gmail.com');
      $this->mail->Subject = 'Dangerous Level 3 Activity';
      $this->mail->Body = 'Create the body later';
      if($this->mail->send()) echo 'Message sent please check at'. Input::get('email');
      else echo 'Message not sent to'. Input::get('email');
    }
 }

?>
