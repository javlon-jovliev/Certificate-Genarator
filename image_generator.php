<?php
    require_once('qr_code.php');

    $certificate = imagecreatefrompng('src/certificate.png');

    $fontThin = 'src/TT_Firs_Neue/TTFirsNeue-Thin.otf';
    $fontMedium = 'src/TT_Firs_Neue/TTFirsNeue-Medium.otf';
    $fontRegular = 'src/TT_Firs_Neue/TTFirsNeue-Regular.otf';
    $fontDemiBold = 'src/TT_Firs_Neue/TTFirsNeue-DemiBold.otf';
    
    /*Colors */
    $color_black = imagecolorallocate($certificate, 19, 20, 22);
    $color_white = imagecolorallocate($certificate, 255, 255, 255);
    $color_text = imagecolorallocate($certificate, 232, 71, 45);


    /*Print QR Code */
    $qr_code = imagecreatefromstring($result->getString());
    imagecopymerge($certificate, $qr_code, 2800+95, 155, 0, 0, 310, 310, 100);


    /*Print Student's Name */
    $name = strtoupper("Gulnoza");
    imagettftext($certificate, 100, 0, 170, 866+70, $color_black, $fontThin, $name);


    /*Print Student's Surname */
    $surname = strtoupper("Usmonova");
    imagettftext($certificate, 100, 0, 170, 1011+70, $color_black, $fontDemiBold, $surname);


    /*Print Course's Text */
    $text1 = 'IT Kids kursini tamomlab, Code.org, Scratch, Code Combat';
    imagettftext($certificate, 40, 0, 170, 1217, $color_black, $fontRegular, $text1);

    $text2 = "bo'yicha ko'nikmalarga ega bo'ldi va imtihondan muvaffaqiyatli o'tdi";
    imagettftext($certificate, 40, 0, 170, 1288, $color_black, $fontRegular, $text2);


    /*Print Director's Name */
    $director = "Ruslan Rustamov";
    imagettftext($certificate, 40, 0, 340, 1560, $color_white, $fontRegular, $director);


    /*Print Date */
    $date = "11.06.2022";
    imagettftext($certificate, 40, 0, 1555, 1560, $color_white, $fontRegular, $date);


    /*Print Signature */
    $sign = imagecreatefrompng('src/sign_white.png');
    imagecopyresampled($certificate, $sign, 440, 1702, 0, 0, 310, 180, 265, 135);
    imagealphablending($certificate, true);
    

    /*Create Final Image */
    header("Content-type: image/png");
    imagepng($certificate);
    imagedestroy($certificate);
?>