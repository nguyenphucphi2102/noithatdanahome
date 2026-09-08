<?php
$counter_file = "counter.txt";

/* Tạo file nếu chưa tồn tại */
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, 0);
}

/* Tăng tổng lượt truy cập */
$total = (int)file_get_contents($counter_file);
$total++;
file_put_contents($counter_file, $total);

/* Đếm online */
/* ========================= */


session_start();

$timeout = 300; //  5phút
$online_file = "online.txt";

if (!file_exists($online_file)) {
    file_put_contents($online_file, "");
}

$online_users = [];
$lines = file($online_file, FILE_IGNORE_NEW_LINES);
$current_time = time();
$current_session = session_id();

/*
File sẽ lưu dạng:
session_id|timestamp
*/

foreach ($lines as $line) {
    list($session, $timestamp) = explode("|", $line);

    // Giữ lại những session còn hoạt động
    if (($current_time - $timestamp) < $timeout) {
        $online_users[$session] = $timestamp;
    }
}

/* Cập nhật session hiện tại */
$online_users[$current_session] = $current_time;

/* Ghi lại file */
$data = "";
foreach ($online_users as $session => $timestamp) {
    $data .= $session . "|" . $timestamp . "\n";
}

file_put_contents($online_file, $data);

/* Đếm số session */
$online = count($online_users);
?>