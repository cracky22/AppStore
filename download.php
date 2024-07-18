<?php
$files = array(
    'e92941fe-44f4-11ef-9246-539e0da4eaa0' => 'msg.zip',
    'e977132a-44f4-11ef-9165-7f217aade36d' => 'slidethings.zip',
    'e9bbb19c-44f4-11ef-96fe-0322058f6a03' => 'file.zip',
    'e9fcf94a-44f4-11ef-8cf3-0335f52097ea' => 'file.zip',
    'ea401676-44f4-11ef-a3aa-8f831f49c5e2' => 'file.zip',
    'ea830d00-44f4-11ef-877c-233198e4a1a1' => 'file.zip',
    'eac3bcf6-44f4-11ef-831a-4bd02fc6152e' => 'file.zip',
    'eb021d5c-44f4-11ef-af53-07ff0804ebb1' => 'file.zip',
    'eb421ede-44f4-11ef-a8cf-bf63a44f4c69' => 'file.zip'
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