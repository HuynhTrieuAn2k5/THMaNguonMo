<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>TH1</title>
    <style>
    div.tablecontainer {
    overflow-x: auto;
}

    table {
    border-collapse: collapse;
    width: 100%;
}

    table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
</style>
</head>
<body>
    <h1> Bài 1 </h1>
    Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N
    có giá trị từ 1 → 100. Hãy xuất ra trình duyệt những số chẵn
    nằm trong khoảng 1 → N đó.<br>
<?php
    $n = rand(1, 100) ;
    echo "Những số chẵn nằm trong khoảng 1 -> n <br> " ;
    for ($i = 1; $i <= $n; $i++) {
            if ($i % 2 == 0) {
                echo "$i ";
            }
    }
?>
    <h1> Bài 2 </h1>
    Xây dựng 1 trang web thỏa yêu cầu xuất ra bảng cửu chương từ 1 →10.
<?php
    echo "<table border='1' align='center'>" ;
    echo "<tr>" ;
    for ($i = 1; $i <= 10; $i++){
        echo "<td><b> Chương ". $i . "</b></td>" ;
    }
    echo "</tr>" ;
    for ($i = 1; $i <= 10; $i++){
        echo "<tr>" ;
        for ($j = 1; $j <= 10; $j++){
            echo "<td>" . $i . " x " . $j . "=" . $i*$j . "</td>" ;
        }
        echo "</tr>" ;
    }
    echo "</table>" ;
?>

    <h1> Bài 3 </h1>
    Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N
    có giá trị trong [−100;100]. Sau đó kiểm tra N có là số dương
    không? Nếu thỏa thì:
    In ra các ước số của N.
    Viết hàm kiểm tra xem N có phải là số nguyên tố không?
    Tính tổng các số nguyên tố < N.
    Kiểm tra N có là số chính phương?<br>
<?php
    // 1. Hàm kiểm tra số nguyên tố
        function kiemTraSoNguyenTo($num) {
            if ($num < 2) return false;
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) return false;
            }
            return true;
        }

        // 2. Hàm kiểm tra số chính phương
        function kiemTraSoChinhPhuong($num) {
            if ($num < 0) return false;
            $sq = sqrt($num);
            return ($sq == floor($sq));
        }

        // 3. Khởi tạo giá trị N ngẫu nhiên trong khoảng [-100, 100]
        $N = rand(-100, 100);

        echo "<p>Giá trị ngẫu nhiên nhận được: <strong>N = $N</strong></p>";

        // 4. Kiểm tra N có phải số dương (> 0) hay không
        if ($N > 0) {
            echo "<div class='box-success'>";
            echo "<p><strong>➜ N = $N là số dương. Kết quả tính toán:</strong></p>";
            echo "<ul>";

            // a. In ra các ước số của N
            $uocSo = array();
            for ($i = 1; $i <= $N; $i++) {
                if ($N % $i == 0) {
                    $uocSo[] = $i;
                }
            }
            echo "<li><strong>Các ước số của $N:</strong> " . implode(", ", $uocSo) . "</li>";

            // b. Kiểm tra N có phải số nguyên tố không
            if (kiemTraSoNguyenTo($N)) {
                echo "<li><strong>Kiểm tra số nguyên tố:</strong> $N <span style='color:green;'>là</span> số nguyên tố.</li>";
            } else {
                echo "<li><strong>Kiểm tra số nguyên tố:</strong> $N <span style='color:red;'>không phải</span> là số nguyên tố.</li>";
            }

            // c. Tính tổng các số nguyên tố < N
            $tongSoNguyenTo = 0;
            $danhSachSoNguyenTo = array();
            for ($i = 2; $i < $N; $i++) {
                if (kiemTraSoNguyenTo($i)) {
                    $tongSoNguyenTo += $i;
                    $danhSachSoNguyenTo[] = $i;
                }
            }
            
            if (count($danhSachSoNguyenTo) > 0) {
                echo "<li><strong>Tổng các số nguyên tố < $N:</strong> " . implode(" + ", $danhSachSoNguyenTo) . " = <strong>$tongSoNguyenTo</strong></li>";
            } else {
                echo "<li><strong>Tổng các số nguyên tố < $N:</strong> Không có số nguyên tố nào nhỏ hơn $N (Tổng = 0).</li>";
            }

            // d. Kiểm tra N có là số chính phương không
            if (kiemTraSoChinhPhuong($N)) {
                echo "<li><strong>Kiểm tra số chính phương:</strong> $N <span style='color:green;'>là</span> số chính phương.</li>";
            } else {
                echo "<li><strong>Kiểm tra số chính phương:</strong> $N <span style='color:red;'>không phải</span> là số chính phương.</li>";
            }

            echo "</ul>";
            echo "</div>";
        } else {
            // Trường hợp N <= 0 (Số âm hoặc số 0)
            echo "<div class='box-error'>";
            echo "➜ N = $N không phải là số dương. Bỏ qua các phép tính!";
            echo "</div>";
        }
?>

</body>
</html>