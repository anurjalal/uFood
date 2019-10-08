<?php
if (password_verify('admin', '21232f297a57a5a743894a0e4a801fc3')) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>