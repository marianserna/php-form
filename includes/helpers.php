<?php
function debug_post() {
  echo '<pre><code>';
  print_r($_POST);
  echo '</code></pre>';
}

function value($key) {
  if (isset($_POST[$key])) {
    return $_POST[$key];
  } else {
    return null;
  }
}

function checked($field, $value) {
  if (isset($_POST[$field]) && in_array($value, $_POST[$field])) {
    return 'checked';
  } else {
    return '';
  }
}

function radio_checked($field, $value) {
  if (isset($_POST[$field]) && $_POST[$field] == $value) {
    return 'checked';
  } else {
    return '';
  }
}

function selected($field, $value) {
  if (isset($_POST[$field]) && $_POST[$field] == $value) {
    return 'selected';
  } else {
    return '';
  }
}

function is_post() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function add_error_class($check) {
  if (is_post() && !$check) {
    return 'invalid';
  } else {
    return '';
  }
}

function add_error_msg($check, $msg) {
  if (is_post() && !$check) {
    return '<div class="error">' . $msg . '</div>';
  } else {
    return '';
  }
}

function is_valid_name() {
  $name = value('name');
  if (!$name) {
    return false;
  }
  if (preg_match("/[0-9]/", $name)) {
    return false;
  }
  return true;
}

function is_valid_email() {
  return filter_var(value('email'), FILTER_VALIDATE_EMAIL);
}

function is_valid_phone() {
  $phone = value('phone');
  if (!$phone) {
    return true;
  }
  if (preg_match("/[a-zA-Z]/", $phone)) {
    return false;
  }
  return (bool)$phone;
}

function is_valid_project() {
  return (bool)value('project');
}

function is_valid() {
  return is_valid_name() &&
    is_valid_email() &&
    is_valid_phone() &&
    is_valid_project();
}

function clear_invalid() {
  if (!is_valid_name()) {
    $_POST['name'] = '';
  }
  if (!is_valid_phone()) {
    $_POST['phone'] = '';
  }
  if (!is_valid_email()) {
    $_POST['email'] = '';
  }
}

function send_email() {
  $mail = new PHPMailer;
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'in-v3.mailjet.com';                    // Specify main SMTP server
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = getenv('SMTP_USER');                // SMTP username
  $mail->Password = getenv('SMTP_PASSWORD');            // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;

  $mail->setFrom('marianhalliday@gmail.com', 'Marian Serna');
  $mail->addAddress('marianhalliday@gmail.com', 'Marian Serna');
  $mail->addReplyTo(value('email'), value('name'));
  if (value('receive_copy') == 'Yes') {
    $mail->addCC(value('email'), value('name'));
  }

  $mail->isHTML(true);

  $mail->Subject = 'Thanks for contacting STORM!';
  ob_start();
  include('email_template.php');
  $returned = ob_get_contents();
  ob_end_clean();
  $mail->Body    = $returned;

  if ($mail->send()) {
    return true;
  } else {
    return false;
  }
}
?>
