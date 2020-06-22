<?php
echo 'ok';
unset($_COOKIE['auth']);
SetCookie("auth", "", time()-3600); 
unset($_COOKIE['username']);
SetCookie("username", "", time()-3600); 
unset($_COOKIE['useremail']);
SetCookie("useremail", "", time()-3600); 
unset($_COOKIE['userid']);
SetCookie("userid", "", time()-3600); 