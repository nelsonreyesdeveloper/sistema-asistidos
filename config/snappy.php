<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This option contains settings for PDF generation.
    |
    | Enabled:
    |    
    |    Whether to load PDF / Image generation.
    |
    | Binary:
    |    
    |    The file path of the wkhtmltopdf / wkhtmltoimage executable.
    |
    | Timout:
    |    
    |    The amount of time to wait (in seconds) before PDF / Image generation is stopped.
    |    Setting this to false disables the timeout (unlimited processing time).
    |
    | Options:
    |
    |    The wkhtmltopdf command options. These are passed directly to wkhtmltopdf.
    |    See https://wkhtmltopdf.org/usage/wkhtmltopdf.txt for all options.
    |
    | Env:
    |
    |    The environment variables to set while runni'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"'ng the wkhtmltopdf process.
    |
    */

    'pdf' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"',
        'options' => [
            'no-images' => true,
            'disable-external-links' => false,
            'disable-internal-links' => false,
            'allow' => [public_path("/datatables/")], 
        ],
    ),
    'image' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"',
        'options' => array(),
    ),
    // 'pdf' => [
    //     'enabled' => true,
    //     'binary' => env('WKHTML_PDF_BINARY', '"C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf"'),
    //     'timeout' => false,
    //     'options' => [
    //         'no-images' => true,
    //         'disable-javascript' => true,
    //         'disable-local-file-access' => false, // Puede intentar establecer esto en true o false según sus necesidades.
    //     ],
    //     'env'     => [],
    // ],

    // 'image' => [
    //     'enabled' => true,
    //     'binary' => env('WKHTML_PDF_BINARY', '"C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltoimage"'),
    //     'timeout' => false,
    //     'options' => [],
    //     'env'     => [],
    // ],

];
