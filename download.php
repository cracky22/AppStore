<?php
$files = array(
    'e7d5e3de-44f4-11ef-b64a-0b627cc83e34' => 'msg-encrypt_stable.zip',
    'e8682032-44f4-11ef-b221-93373ac0bd56' => 'slidethings.zip',
    'e92941fe-44f4-11ef-9246-539e0da4eaa0' => 'notes.apk',
    'e977132a-44f4-11ef-9165-7f217aade36d' => 'pwgen.apk'
);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (array_key_exists($id, $files)) {
        $file = $files[$id];
        
        $filePath = '/services/store/' . $file;
        
        if (file_exists($filePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath);
            exit;
        } else {
            http_response_code(404);
            echo 'Datei nicht gefunden!';
        }
    } else {
        http_response_code(400);
        echo 'Ungültige ID!';
    }
} else {
    http_response_code(400);
    echo 'Keine ID übergeben!';
}
?>