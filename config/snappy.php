<?php

return array(


    'pdf' => array(
        'enabled' => true,
        // 'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'), // para linux, se requieren paquetes h4cc/wkhtmltopdf-amd64 (x64) o h4cc/wkhtmltopdf-i386 (x86)
        'binary'  => base_path('storage\binaries\wkhtmltopdf\bin\wkhtmltopdf.exe'), //para windows, basado en instalador wkhtmltox-0.12.5-1.msvc2015-win64.exe
        'timeout' => false,
        'options' => array(
            'footer-right'                 => utf8_decode('Página [page] de [toPage]'),
            'footer-font-size'             => 7,
            'footer-font-name'             => 'Arial',
            'encoding'                     => 'UTF-8',
            'margin-bottom'                => 8,
            'margin-left'                  => 6,
            'margin-right'                 => 6,
            //'margin-top'                   => 6,
        ),
        'env'     => array(),
    ), // se elimino el ejecutable de imagenes, para liberar el peso del sistema (-30mb) y por no utilizarse
    // 'image' => array(
    //     'enabled' => true,
    //     'binary'  => '/usr/local/bin/wkhtmltoimage',
    //     'timeout' => false,
    //     'options' => array(),
    //     'env'     => array(),
    // ),


);
