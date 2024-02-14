<script>
  if (typeof (Storage) !== "undefined") {
    if (!sessionStorage.getItem("session_started")) {
      window.location.href = "index.php";
    } else {
    }
  } else {
    console.error("Browser does not support sessionStorage.");
  }

</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];
    $uploadPath = './img/' . $uploadedFile['name'];
    move_uploaded_file($uploadedFile['tmp_name'], $uploadPath);

    $responseData = array(
        'filename' => $uploadedFile['name'],
        'filepath' => $uploadPath
    );

    header('Content-Type: application/json');
    echo json_encode($responseData);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>REPORT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.semanticui.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>

</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        include 'navbar.php'
            ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <!-- Topbar Navbar -->
                <?php
                include 'topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="">เพิ่มรูปภาพ LOGO</h1>

                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        เพิ่ม LoGo
                    </button>

                    <div class="row text-center">

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> เพิ่มรูปภาพ LOGO</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body  ">
                                        <form id="fileUploadForm" enctype="multipart/form-data">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="ชื่อบริษัท">
                                            <br>
                                            <input type="file" name="file" id="fileInput" class="form-control">
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="uploadButton"
                                            onclick="upload()">Upload</button>
                                        </form>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>รูปภาพ</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="filelist">

                            </tbody>


                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>รูปภาพ</th>
                                    <th>ACTION</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="modal fade" id="edit_username" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="edit_form">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            onclick="return edit_user_form();">Save changes</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include 'footer.php'
                ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                    <img src="" alt="" srcset="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-danger" href="connect\logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // new DataTable('#example');

        // เรียกใช้งาน API และแสดงผลลัพธ์ใน HTML
        window.onload = function () {
            fetch('http://10.1.1.155:3000/api/v1/file-management/get/files')
                .then(response => response.json())
                .then(data => {
                    const userList = document.getElementById('filelist');
                    let html = '';
                    data.data.forEach((user, index) => {
                        html += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${user.name}</td>
                                <td> <img src="${user.path}" alt="" srcset="" width=100px></td>
                                <td>
                                <button class="btn btn-danger deleteUserButton">DELETE</button>
                                                       
                                </td>
                            </tr>
                        `;
                    });
                    userList.innerHTML = html;

                    const deleteButtons = document.querySelectorAll('.deleteUserButton');
                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            const username = this.parentNode.parentNode.children[1].textContent;

                            $.ajax({
                                url: 'http://10.1.1.155:3000/api/v1/file-management/remove?file_name=' + username,
                                type: 'DELETE',
                                data: { username: username },
                                success: function (response) {
                                    console.log(response);
                                    window.location.reload();
                                    alert('User deleted successfully');
                                },
                                error: function (xhr, status, error) {
                                    console.error(xhr.responseText);
                                    alert('Error deleting user');
                                }
                            });
                        });
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };
        function upload() {
            const file = fileInput.files[0];
            const companyName = document.getElementById('name').value;

            const formData = new FormData();
            formData.append('name', companyName);
            formData.append('file', file);

            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Response from server:', data);
                    window.location.reload();
                    alert('File uploaded successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error uploading file');
                });
        }
    </script>

</body>


</html>