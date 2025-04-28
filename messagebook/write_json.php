<?php
// POST 데이터 확인
if(isset($_POST['writer']) && isset($_POST['message'])) {
    $writer = $_POST['writer'];
    $message = $_POST['message'];

    // 현재 날짜와 시간을 YYYY-MM-DD HH:MM:SS 형식으로 가져오기
    $date = date('Y-m-d H:i:s');

    // JSON 파일 경로
    $jsonFile = 'messagebook.json';

    // 기존 JSON 데이터 읽기
    if(file_exists($jsonFile)) {
        $jsonData = json_decode(file_get_contents($jsonFile), true);
    } else {
        $jsonData = [];
    }

    // 새 데이터 배열 생성
    $newData = array('writer' => $writer, 'message' => $message, 'date' => $date);

    // 새 데이터를 배열의 앞부분에 추가
    array_unshift($jsonData, $newData);

    // JSON 파일에 데이터 쓰기
    if(file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT))) {
        echo '데이터가 성공적으로 추가되었습니다.';
    } else {
        echo '데이터 추가에 실패했습니다.';
    }
} else {
    echo 'writer와 message를 POST 방식으로 전송해주세요.';
}
?>
