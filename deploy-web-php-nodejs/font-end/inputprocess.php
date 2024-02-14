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
                        <h1 class="">เพิ่มกระบวนการทำงาน</h1>

                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        เพิ่มข้อมูลการดำเนินงาน
                    </button>
                    <div class="row text-center">
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> เพิ่มข้อมูลการดำเนินงาน</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body ">
                                        <form id="myForm" method="POST" class="validated" enctype="multipart/form-data">
                                            <input type="text" id="CP" name="CP" class="form-control"
                                                placeholder="CP"><br>
                                            <input type="text" id="name1" name="name1" class="form-control"
                                                placeholder="รายละเอียดงาน"><br>
                                            <input type="text" id="name2" name="name2" class="form-control"
                                                placeholder="รายละเอียดงาน"><br>
                                            <input type="text" id="name3" name="name2" class="form-control"
                                                placeholder="รายละเอียดงาน"><br>
                                            <input type="text" id="time1" name="time1" class="form-control"
                                                placeholder="เวลาทำงาน1"><br>
                                            <input type="text" id="time2" name="time2" class="form-control"
                                                placeholder="เวลาทำงาน2"><br>
                                            <input type="text" id="time3" name="time3" class="form-control"
                                                placeholder="เวลาทำงาน3"><br>


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" id="submitBtn" class="btn btn-primary">Save
                                            changes</button>
                                        </form>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div id="timelineContainer"></div> -->
                        <table id="example" class="ui celled table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>CP</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>เวลาทำงาน</th>
                                    <th>เวลาทำงาน</th>
                                    <th>เวลาทำงาน</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="timelineContainer">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>CP</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>รายละเอียดงาน</th>
                                    <th>เวลาทำงาน</th>
                                    <th>เวลาทำงาน</th>
                                    <th>เวลาทำงาน</th>
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
                                        <div id="showList">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="editprocess()" class="btn btn-primary">Save
                                            changes</button>
                                        </form>
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
        document.getElementById('submitBtn').addEventListener('click', function () {
            // รับค่าจากฟอร์ม
            var CP = document.getElementById('CP').value;
            var name1 = document.getElementById('name1').value;
            var name2 = document.getElementById('name2').value;
            var name3 = document.getElementById('name3').value;
            var time1 = document.getElementById('time1').value;
            var time2 = document.getElementById('time2').value;
            var time3 = document.getElementById('time3').value;
            // สร้าง JSON object เพื่อส่งไปยังเซิร์ฟเวอร์
            var formData = {
                "name": CP,
                "sub": [
                    {
                        "name": name1, "time": time1
                    },
                    {
                        "name": name2, "time": time2
                    },
                    {
                        "name": name3, "time": time3
                    }
                ]
            };
            fetch('http://10.1.1.155:3000/api/v1/timeline/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.reload();
                    alert('Data sent successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error sending data');
                });
        });
        window.onload = function () {
            const timelineContainer = document.getElementById('timelineContainer');
            fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    data.Data.forEach((item, index) => {
                        html += `<tr>
                        <td hidden>${item.ON}</td>
                        <td>${index + 1}</td>
                        <td>${item.NAME}</td>
                        <td>${item.SUB_NAME_1}</td>
                        <td>${item.SUB_NAME_2}</td>
                        <td>${item.SUB_NAME_3}</td>
                        <td>${item.SUB_TIME_1}</td>
                        <td>${item.SUB_TIME_2}</td>
                        <td>${item.SUB_TIME_3}</td>
                        `;
                        html += `<td>
                                <button onclick="showprocess('${item.ON}')" class="btn btn-warning" data-toggle="modal" data-target="#edit_username">EDIT</button>
                                <button class="btn btn-danger deleteUserButton">DELETE</button>
                                         
                                </td>`;

                        html += '</tr>';
                    });

                    timelineContainer.innerHTML = html;
                    // <button class="btn btn-danger deleteUserButton">DELETE</button>
                    const deleteButtons = document.querySelectorAll('.deleteUserButton');
                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            const on = this.parentNode.parentNode.children[0].textContent;

                            $.ajax({
                                url: 'http://10.1.1.155:3000/api/v1/timeline/remove/' + on,
                                type: 'DELETE',
                                data: { on: on },
                                success: function (response) {
                                    console.log(response);
                                    window.location.reload();
                                    alert('Job deleted successfully');
                                },
                                error: function (xhr, status, error) {
                                    console.url(xhr.responseText);
                                    alert('Error deleting job');
                                }
                            });
                        });
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    timelineContainer.innerHTML = '<p>Error fetching timeline data</p>';
                });
        }
    </script>
    <script src="showuse.js"></script>
    </script>
</body>

</html>