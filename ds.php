
<?php
include("inc/connect.inc");

// Nhận tên lớp từ danhsach.php
$lop = $_GET['lop'] ?? '';

// Truy vấn sinh viên theo lớp
$sql = "SELECT * FROM sinhvien WHERE lop = '$lop'";
$rs = mysqli_query($con, $sql);

// Tạo chuỗi HTML
$str = "<table border='1' cellpadding='5' cellspacing='0'>";

$str .= "
    <tr>
        <th>TT</th>
        <th>Mã số</th>
        <th>Họ tên</th>
        <th>Địa chỉ</th>
    </tr>
";

$tt = 1;

while ($row = mysqli_fetch_array($rs)) {
    $str .= "
        <tr>
            <td>$tt</td>
            <td>{$row['masv']}</td>
            <td>{$row['hoten']}</td>
            <td>{$row['diachi']}</td>
        </tr>
    ";

    $tt++;
}

$str .= "</table>";

// Trả kết quả về cho Ajax
echo $str;
?>
