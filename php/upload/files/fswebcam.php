<?php
$my_time = time();
shell_exec('sudo fswebcam -r 1920x1080 -S 20 /var/www/html/skyia/jpg/upload/files/' . $my_time . '_MonitorCam.jpg');