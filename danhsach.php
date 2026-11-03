
<?php
include("inc/connect.inc");

// Hàm tạo danh sách lớp trong select box
function initClass($con) {
    $sql = "SELECT DISTINCT lop FROM sinhvien";
    $rs = mysqli_query($con, $sql);

    $str = "";

    while ($row = mysqli_fetch_array($rs)) {
        $lop = htmlspecialchars($row['lop']);
        $str .= "<option value='$lop'>$lop</option>";
    }

    echo $str;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên theo lớp</title>

    <script>
        // Hàm gửi yêu cầu Ajax
        function sendajax() {
            var lop = document.getElementById("lop").value;

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("ds").innerHTML = xhr.responseText;
                }
            };

            xhr.open("GET", "ds.php?lop=" + encodeURIComponent(lop), true);
            xhr.send();
        }
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h2 {
            color: #0874c9;
        }

        select {
            padding: 5px;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            min-width: 450px;
        }

        th {
            background-color: #0874c9;
            color: white;
        }

        th, td {
            border: 1px solid #888;
            padding: 7px;
            text-align: left;
        }
    </style>
</head>

<body onload="sendajax()">

    <h2>In danh sách sinh viên theo từng lớp</h2>

    <label for="lop">Chọn lớp:</label>

    <select name="lop" id="lop" onchange="sendajax()">
        <?php
            initClass($con);
        ?>
    </select>

    <h3>Danh sách sinh viên</h3>

    <div id="ds">
        Đang tải danh sách...
    </div>

</body>
</html>
