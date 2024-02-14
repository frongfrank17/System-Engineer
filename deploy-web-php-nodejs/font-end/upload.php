<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];
    $uploadPath = './img/' . $uploadedFile['name'];
    $name = $_POST['name'];
    move_uploaded_file($uploadedFile['tmp_name'], $uploadPath);

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://10.1.1.155:3000/api/v1/file-management/upload',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "filename" : "' . $name . '" ,
        "filepath":  "' . $uploadPath . '"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
} else {
    http_response_code(400);
    echo json_encode(array('Error' => 'Invalid request'));
}
?>
