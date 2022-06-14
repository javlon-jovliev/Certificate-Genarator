<?php
    
    use Endroid\QrCode\Builder\Builder;
    use Endroid\QrCode\Encoding\Encoding;
    use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
    use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
    use Endroid\QrCode\Label\Font\NotoSans;
    use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
    use Endroid\QrCode\Writer\PngWriter;

    require_once('vendor/autoload.php');

    $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data('https://cert.owa.uz/check/4187a736-1454-49a7-bf0a-79f828b0d664')
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(5)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        // ->logoPath(__DIR__.'/assets/symfony.png')
        // ->labelText('This is the label')
        // ->labelFont(new NotoSans(20))
        // ->labelAlignment(new LabelAlignmentCenter())
        ->build();
    
    // Directly output the QR code
    // header('Content-Type: '.$result->getMimeType());
    // echo $result->getString();

    // Save it to a file
    // $result->saveToFile(__DIR__.'/qrcode.png');

    // Generate a data URI to include image data inline (i.e. inside an <img> tag)
    // $dataUri = $result->getDataUri();
?>