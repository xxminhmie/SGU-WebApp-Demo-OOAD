<?php
function loadImageProcess(){
    //Thư mục bạn sẽ lưu file upload
    $target_dir    = "../image/product/";
    //Vị trí file lưu tạm trong server
    $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
    $allowUpload   = true;
    //Lấy phần mở rộng của file
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $maxfilesize   = 800000; //(bytes)
    ////Những loại file được phép upload
    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


    if(isset($_POST["submit"])) {
        //Kiểm tra xem có phải là ảnh
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if($check !== false) {
            // echo '<script type="text/javascript">alert("Đây là file ảnh - " . $check["mime"] . ".");</script>';
            $allowUpload = true;
        } else {
            echo '<script type="text/javascript">alert("Không phải file ảnh.");</script>';
            $allowUpload = false;
        }
    }

    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    if (file_exists($target_file)) {
        echo '<script type="text/javascript">alert("File đã tồn tại.");</script>';
        $allowUpload = false;
    }

    // Kiểm tra kiểu file
    if (!in_array($imageFileType,$allowtypes )){
        echo '<script type="text/javascript">alert("Chỉ được upload các định dạng JPG, PNG, JPEG, GIF");</script>';
        $allowUpload = false;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)){
          //   echo '
          // <script type="text/javascript">
          //   alert("File "'. basename( $_FILES["fileupload"]["name"]).'" Đã upload thành công");
          // </script>
          // ';
          //   echo '
          // <script type="text/javascript">
          //   window.location.replace("../index.php?action=product");
          // </script>
          // ';
            // echo "File ". basename( $_FILES["fileupload"]["name"])." Đã upload thành công";
        }else{
            // echo '<script type="text/javascript">alert("Có lỗi xảy ra khi upload file.");</script>';
            echo '
          <script type="text/javascript">
            history.back();
          </script>
          ';
        }
    }else{
        //echo "Không upload được file!";
        echo '
          <script type="text/javascript">
            history.back();
          </script>
          ';

    }
}
?>
