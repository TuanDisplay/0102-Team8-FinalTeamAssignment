<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/them.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        
        .icon {
            color: #000;
            font-size: 24px;
        }
        .form-group {
            font-weight: bold;
        }
        .control {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-left: 70px;
    }

    .radio-left {
        flex: 1;
    }
    .radio-right {
        flex: 1;
    }

    /* Thêm CSS để tạo định dạng và khoảng cách giữa các radio và nhãn */
    input[type="radio"] {
        margin-right: 5px;
    }
    </style>
    <title>Thêm hợp đồng</title>
</head>

<body>
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <img src="Logo.png" alt="logo" class="logo">
                </div>
                <div class="col-xl-6 text-right" style="line-height: 65.998px;">
                    <a href="#" style="color: #000;"><i class="icon ti-user"></i> User | Admin</a>
                </div>
            </div>
            <div class="row justify-content-around">
                <form action="" method="POST" class="col my-3">

                    <!-- Thêm link danh sách vào đây -->
                    <a href="vieww.php">
                        <i class="icon ti-arrow-left"></i>
                    </a>
                    <h1 class="text-center text-uppercase h3 py-3">Thêm hợp đồng</h1>

                    <?php
                    require_once 'ketnoi.php';

                    if(isset($_POST['btn-add'])){
                        $Customer_Name = $_POST['Customer_Name'];
                        $Year_Of_Birth = $_POST['Year_Of_Birth'];
                        $SSN = $_POST['SSN'];
                        $Customer_Address = $_POST['Customer_Address'];
                        $Mobile = $_POST['Mobile'];
                        $Property_ID = $_POST['Property_ID'];
                        $Date_Of_Contract = $_POST['Date_Of_Contract'];
                        $Price = $_POST['Price'];
                        $Deposit = $_POST['Deposit'];
                        $Remain = $_POST['Remain'];
                        $Status = $_POST['Status'];
                        if (isset($_POST['Status'])) {
                            $Status = $_POST['Status'];
                            // Tiếp tục xử lý
                        } else {
                            // Xử lý khi 'Status' không tồn tại
                        }

                        if(!empty($Customer_Name) && !empty($Year_Of_Birth) && !empty($SSN) && !empty($Customer_Address) && !empty($Mobile) 
                        && !empty($Property_ID) && !empty($Date_Of_Contract) && !empty($Price) && !empty($Deposit) && !empty($Remain) && !empty($Status)){
                            $sql = "INSERT INTO `dbo.Full_Contract` (Customer_Name, Year_Of_Birth, SSN, Customer_Address, Mobile, 
                            Property_ID, Date_Of_Contract, Price, Deposit, Remain, `Status`) VALUES ('$Customer_Name', '$Year_Of_Birth', '$SSN', '$Customer_Address', 
                            '$Mobile', '$Property_ID', '$Date_Of_Contract', '$Price', '$Deposit', '$Remain', '$Status')";
                            
                           if ($conn->query($sql) === TRUE) {
                               session_start();
                               $_SESSION['success_message'] = "Thêm hợp đồng thành công";
                               header("Location: vieww.php"); // Chuyển hướng đến trang chủ
                               exit(); // Đảm bảo dừng việc thực thi kịp thời
                           } else {
                               echo "<div class='alert alert-danger' role='alert'>Lỗi khi thêm hợp đồng: " . $conn->error . "</div>";
                           }
                        }else{
                            echo "<div class='alert alert-warning' role='alert'>Vui lòng nhập đầy đủ thông tin trước khi thêm hợp đồng</div>";
                        }
                    }
                    ?>

                <div class="form-group p-2">
                        <label for="Full_Contract_Code">Mã hợp đồng:</label>
                        <input type="" id="" class="form-control bg-light" name="" placeholder="Hệ thống tự cấp">
                    </div>
                    <div class="form-group p-2">
                        <label for="Customer_Name">Họ tên người mua:</label>
                        <input type="text" id="Customer_Name" class="form-control" name="Customer_Name" placeholder="VD: Nguyễn Văn A">
                    </div>

                    <div class="form-group p-2">
                        <label for="Year_Of_Birth">Sinh năm:</label>
                        <input type="number" id="Year_Of_Birth" class="form-control" name="Year_Of_Birth" placeholder="VD: 2003">
                    </div>

                    <div class="form-group p-2">
                        <label for="SSN">CMND:</label>
                        <input type="text" id="SSN" class="form-control" name="SSN" placeholder="VD: 301198908">
                    </div>

                    <div class="form-group p-2">
                        <label for="Customer_Address">Địa chỉ:</label>
                        <input type="text" id="Customer_Address" class="form-control" name="Customer_Address" placeholder="VD: 45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh">
                    </div>

                    <div class="form-group p-2">
                        <label for="Mobile">Số điện thoại:</label>
                        <input type="tel" id="Mobile" class="form-control" name="Mobile" placeholder="VD: 0901234567" pattern="[0-9]{10}">
                    </div>

                    <div class="form-group p-2">
                        <label for="Property_ID">Mã bất động sản:</label>
                        <input type="text" id="Property_ID" class="form-control bg-light" name="Property_ID">
                    </div>

                    <div class="form-group p-2">
                        <label for="Date_Of_Contract">Ngày lập hợp đồng:</label>
                        <input type="date" id="Date_Of_Contract" class="form-control" name="Date_Of_Contract">
                    </div>

                    <div class="form-group p-2">
                        <label for="Price">Giá trị hợp đồng:</label>
                        <input type="text" id="Price" class="form-control bg-light" name="Price">
                    </div>

                    <div class="form-group p-2">
                        <label for="Deposit">Số tiền đã cọc:</label>
                        <input type="text" id="Deposit" class="form-control bg-light" name="Deposit">
                    </div>

                    <div class="form-group p-2">
                        <label for="Remain">Số tiền còn lại:</label>
                        <input type="text" id="Remain" class="form-control bg-light" name="Remain">
                    </div>
                     <!-- Các trường thông tin khác... -->

                    <div class="p-2">
                        <label for="Status"><b>Trạng thái:</b></label>
                        <div class="control">
                            <div class="radio-left">
                                <input type="radio" name="Status" value="1">
                                <label for="1">Đang bán</label><br>
                                <input type="radio" name="Status" value="2">
                                <label for="2">Đã bán thanh toán một lần</label><br>
                                <input type="radio" name="Status" value="3">
                                <label for="3">Đã bán trả góp</label><br>
                                <input type="radio" name="Status" value="4">
                                <label for="4">Không hiển thị</label>
                            </div>
                            <div class="radio-right">
                                <input type="radio" name="Status" value="5">
                                <label for="5">Hết hạn để bán</label><br>
                                <input type="radio" name="Status" value="6">
                                <label for="6">Đang cọc đầy đủ</label><br>
                                <input type="radio" name="Status" value="7">
                                <label for="7">Đang cọc trả góp</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Thêm" class="btn-primary btn btn-block" name="btn-add">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
