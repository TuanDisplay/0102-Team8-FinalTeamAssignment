<?php
                 session_start();

                 // Kiểm tra xem có thông báo thành công không
                 if (isset($_SESSION['success_message'])) {
                     echo "<div class='alert alert-success' role='alert'>{$_SESSION['success_message']}</div>";
                     unset($_SESSION['success_message']); // Xóa thông báo sau khi đã hiển thị
                 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Real Estate Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    
    <!-- Add your CSS styles or link to external stylesheets here -->
</head>

<body>
<div class="nen-menu">
    <header>
    <div class="col-xl-1">
        <img src="Logo.png" alt="logo" class="logo">
    </div>
    <div class="header-menu">   
        <nav>    
                <ul class="nav bold" style="padding: 10px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nhà bán đất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nhà đất cho thuê</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hợp đồng</a>
                    </li>
                </ul>
        </nav>
</div>
<!-- Phần User và Login ở góc trên bên phải -->
<div class="user-login-section">
    <span class="mr-2">User |&nbsp;</span> 
    <a href="#">Login</a>
</div>

    </header>
    <div class="flex">
        <div class="A1">
            <div class="input-group mb-2 text-center" style="width: 300px; margin-right: 100px;">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </div>
        </div>
        <div class="mg30">
            <span>Loại</span>
            <select class="form-select form-select-sm" aria-label="Small select example">
                <option selected>Tất Cả</option>
            </select>
        </div>
        <div class="mg30">
            <span>Khu vực</span>
            <select class="form-select form-select-sm" aria-label="Small select example">
                <option selected>Toàn quốc</option>
            </select>
        </div>
        <div class="mg30">
            <span>Mức giá</span>
            <select class="form-select form-select-sm" aria-label="Small select example">
                <option selected>Tất Cả</option>
            </select>
        </div>
        <div class="mg30">
            <span>Diện tích</span>
            <select class="form-select form-select-sm" aria-label="Small select example">
                <option selected>10 mét</option>
            </select>
        </div>
        <div class="input-group-append">
            <button class="loc" type="submit" style="margin-left: 50px; padding: 8px;width: 50px;">Lọc</button>
        </div>
    </div>
</div>
    <div class="bt-top10">      
            <span style="font-size:25px" class="bold">Danh sách hợp đồng</span>
        </div>
    </div>
    <div class="col-xl-2">
    <button type="button" class="btn btn-success hello bold" style="width: 180px;"><a href="them.php">Tạo hợp đồng mới</a></button>
    </div>
</div>
    <!-- Add your content here -->
    <table>
            <tr>
                <th>STT</th>
                <th>Mã hợp đồng</th>
                <th>Ngày lập hợp đồng</th>
                <th>Họ tên người mua</th>
                <th>CMND</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "quanlybds_team_8");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "";
            $sql = "SELECT ID, Full_Contract_Code, Date_Of_Contract, Customer_Name, Customer_Address, Mobile, Status
                    FROM `dbo.full_contract`";
                    
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo
                "<tr>
                    <td>".$row['ID']."</td>
                    <td>".$row['Full_Contract_Code']."</td>
                    <td>".$row['Date_Of_Contract']."</td>
                    <td>".$row['Customer_Name']."</td>
                    <td>".$row['Customer_Address']."</td>
                    <td>".$row['Mobile']."</td>
                    <td>".$row['Status']."</td>
                    <td>
                        <a href='#'><img src='pen.png'></a>
                        <a href='#'><img src='delete.png'></a>
                        <a href='#'><img src='printer.png'></a>
                    </td>
                </tr>";
            }
        ?>            
    </table>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</body>
<!-- Phần Footer -->
<footer class="footer">
    <div class="text-center">
        <p class="mb-0"><i>@Copyright by Nấm Năng Nổ</i></p>
    </div>
</footer>
</html>