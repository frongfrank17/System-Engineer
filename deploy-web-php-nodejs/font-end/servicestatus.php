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
                        <h1 class="">รายละเอียดสถานะการทำงาน</h1>

                    </div>

                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        เพิ่มข้อมูลเครื่อง
                    </button> -->

                    <div class="row text-center">

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"> เพิ่มข้อมูลพนักงาน</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body  ">
                                        <form id="myForm" method="POST" class="validated" enctype="multipart/form-data">
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="ชื่ออุปกรณ์"><br>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" id="submitBtn" class="btn btn-primary ">Save
                                            changes</button>
                                        </form>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <table id="example" class="ui celled table text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width:10%">NO.</th>
                                    <th style="width:20%">NAME</th>
                                    <th>STATUS</th>
                                    <th style="width:0%"></th>
                                </tr>

                            </thead>
                            <tbody id="serviceList">

                            </tbody>
                            <tfoot>
                                <th style="width:10%">NO.</th>
                                <th style="width:20%">NAME</th>
                                <th>STATUS</th>
                                <th style="width:0%"></th>
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
                                        <form id="myForm" method="POST" class="validated" enctype="multipart/form-data">
                                            <div id="showList">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="editnamesevice()" class="btn btn-primary">Save
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
        $(document).ready(function () {
            $('#submitBtn').click(function () {
                var formData = {
                    name: $('#name').val(),
                };

                $.ajax({
                    type: 'POST',
                    url: 'http://10.1.1.155:3000/api/v1/job-management/add',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function (response) {
                        console.log(response);
                        alert('ส่งข้อมูลสำเร็จ');
                        window.location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        alert('เกิดข้อผิดพลาดในการส่งข้อมูล');
                    }
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            var Role = sessionStorage.getItem("Role");
            console.log(Role);
            new DataTable('#example', {
                ajax: {
                    url: 'http://10.1.1.155:3000/api/v1/job-management/getCal',
                    dataSrc: 'data'
                },

                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            // หากประเภทข้อมูลเป็นการแสดงผล (display type) ให้คืนเลขลำดับของแถวในตาราง + 1
                            if (type === 'display') {
                                return `<td>${meta.row + 1}</td>`;
                            }
                            // หากไม่ใช่ประเภทการแสดงผล ให้คืนค่าเดิม
                            return data;
                        }
                    },
                    {
                        data: 'NAME',
                        render: function (data, type, row) {
                            return `<td>${data}</td>`;
                        }
                    },
                    {
                        data: 'STATUS',
                        render: function (data, type, row) {
                            return `<td colspan="10">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuenow="${row.STATUS.toFixed(2)}" aria-valuemin="0" style="width: ${row.STATUS.toFixed(2)}%;"
                                        aria-valuemax="100">${row.STATUS.toFixed(2)}%</div>
                                </div>
                            </td>`;
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            var html = '';
                            if (Role === 'ADMIN') {
                                html += '<td><button onclick="rollbackprocess(\'' + row.ON + '\')" class="btn btn-warning">Rollback</button></td>';
                            }
                            return html;
                        }
                        // <button onclick="updateprocess('${row.ON}')" class="btn btn-success">Update Status</button> 
                    }
                ]
            });
        });


        function updateprocess(ON) {
            const data = { ON: ON };
            $.ajax({
                type: 'POST',
                url: 'http://10.1.1.155:3000/api/v1/job-management/update/progress/' + ON,
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (response) {
                    console.log(response);
                    alert('Data updated successfully');
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    alert('Error updating data');
                }
            });
        }
        function rollbackprocess(ON) {
            const data = { ON: ON };
            $.ajax({
                type: 'POST',
                url: 'http://10.1.1.155:3000/api/v1/job-management/update/rollback/' + ON,
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (response) {
                    console.log(response);
                    alert('Rollback updated successfully');
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    alert('Error updating data');
                }
            });
        }

    </script>

    <script src="showuse.js"></script>

    <script>
        window.onload = function () {
            displayNames();
            displayfootNames();
            displaysubname();

        };

        function displayNames() {
            fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    const names = data.Data.map(item => item.NAME);

                    // แสดงผลชื่อแรกใน element ที่มี id เป็น 'nameData'
                    const nameData = document.getElementById('nameData');
                    html += `${names[0]}`;
                    nameData.innerHTML = html;

                    // แสดงผลชื่อที่สองใน element ที่มี id เป็น 'nameData2'
                    const nameData2 = document.getElementById('nameData2');
                    html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
                    html += `${names[1]}`;
                    nameData2.innerHTML = html;

                    const nameData3 = document.getElementById('nameData3');
                    html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
                    html += `${names[2]}`;
                    nameData3.innerHTML = html;

                    const nameData4 = document.getElementById('nameData4');
                    html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
                    html += `${names[3]}`;
                    nameData4.innerHTML = html;

                    const nameData5 = document.getElementById('nameData5');
                    html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
                    html += `${names[4]}`;
                    nameData5.innerHTML = html;

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
        function displaysubname() {
            fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    const names = data.Data.map(item => item.SUB_NAME_1);

                    // console.log(names);
                    const subname = document.getElementById('subname');
                    html = '';
                    html += `${names[0]}`;
                    subname.innerHTML = html;
                    const subname2 = document.getElementById('subname2');
                    html = '';
                    html += `${names[1]}`;
                    subname2.innerHTML = html;
                    const subname4 = document.getElementById('subname4');
                    html = '';
                    html += `${names[2]}`;
                    subname4.innerHTML = html;
                    const subname6 = document.getElementById('subname6');
                    html = '';
                    html += `${names[3]}`;
                    subname6.innerHTML = html;
                    const subname9 = document.getElementById('subname9');
                    html = '';
                    html += `${names[4]}`;
                    subname9.innerHTML = html;


                    const names2 = data.Data.map(item => item.SUB_NAME_2);
                    const subname3 = document.getElementById('subname3');
                    html = '';
                    html += `${names2[1]}`;
                    subname3.innerHTML = html;
                    const subname5 = document.getElementById('subname5');
                    html = '';
                    html += `${names2[2]}`;
                    subname5.innerHTML = html;
                    const subname7 = document.getElementById('subname7');
                    html = '';
                    html += `${names2[3]}`;
                    subname7.innerHTML = html;
                    const subname10 = document.getElementById('subname10');
                    html = '';
                    html += `${names[4]}`;
                    subname10.innerHTML = html;


                    const names3 = data.Data.map(item => item.SUB_NAME_3);
                    const subname8 = document.getElementById('subname8');
                    html = '';
                    html += `${names3[3]}`;
                    subname8.innerHTML = html;



                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
        function displaytime() {
            fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    const showtime = data.Data.map(item => item.SUB_TIME_1);

                    // console.log(showtime);
                    const time = document.getElementById('time');
                    html = '';
                    html += `${showtime[0]}`;
                    time.innerHTML = html;
                    const time2 = document.getElementById('time2');
                    html = '';
                    html += `${showtime[1]}`;
                    time2.innerHTML = html;
                    const time4 = document.getElementById('time4');
                    html = '';
                    html += `${showtime[2]}`;
                    time4.innerHTML = html;
                    const time6 = document.getElementById('time6');
                    html = '';
                    html += `${showtime[3]}`;
                    time6.innerHTML = html;
                    const time9 = document.getElementById('time9');
                    html = '';
                    html += `${showtime[4]}`;
                    time9.innerHTML = html;

                    const showtime2 = data.Data.map(item => item.SUB_TIME_2);
                    console.log(showtime2);
                    const time3 = document.getElementById('time3');
                    html = '';
                    html += `${showtime2[1]}`;
                    time3.innerHTML = html;
                    const time5 = document.getElementById('time5');
                    html = '';
                    html += `${showtime2[2]}`;
                    time5.innerHTML = html;
                    const time7 = document.getElementById('time7');
                    html = '';
                    html += `${showtime2[3]}`;
                    time7.innerHTML = html;
                    const time10 = document.getElementById('time10');
                    html = '';
                    html += `${showtime2[4]}`;
                    time10.innerHTML = html;

                    const showtime3 = data.Data.map(item => item.SUB_TIME_3);
                    const time8 = document.getElementById('time8');
                    html = '';
                    html += `${showtime3[3]}`;
                    time8.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
        function displayfootNames() {
            fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    const names = data.Data.map(item => item.NAME);
                    const nameData = document.getElementById('footnameData');
                    html += `${names[0]}`;
                    footnameData.innerHTML = html;
                    const nameData2 = document.getElementById('footnameData2');
                    html = '';
                    html += `${names[1]}`;
                    footnameData2.innerHTML = html;
                    const nameData3 = document.getElementById('footnameData3');
                    html = '';
                    html += `${names[2]}`;
                    footnameData3.innerHTML = html;
                    const nameData4 = document.getElementById('footnameData4');
                    html = '';
                    html += `${names[3]}`;
                    footnameData4.innerHTML = html;
                    const nameData5 = document.getElementById('footnameData5');
                    html = '';
                    html += `${names[4]}`;
                    footnameData5.innerHTML = html;

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

    </script>

</body>

</html>