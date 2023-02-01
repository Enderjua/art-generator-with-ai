<?php
    // IP adresini al
    $user_ip = $_SERVER['REMOTE_ADDR'];
    // IP adresini şifrele
    $user = hash('sha256', $user_ip);
    // Whitelist IP adresleri
    $whitelist = array('12ca17b49af2289436f303e0166030a21e525d266e209267433801a8fd4071a0', 'a57d2256b1335800cea68b9952f10c13799f727411894ca46ca2ee97de4594b9', 'eff8e7ca506627fe15dda5e0e512fcaad70b6d520f37cc76597fdb4f2d83a1a3');
    // Kullanıcının IP adresini kontrol et
    if (!in_array($user, $whitelist)) {
        // Erişim engellendi
        die('kvalitetna odjeća i trgovine');
    } else {
       
    }
?>
