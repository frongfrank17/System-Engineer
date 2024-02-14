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

  <style>
    .clock {
      color: #000000;
      font-size: 50px;
      font-family: Orbitron;
      letter-spacing: 7px;
    }

    .table table,
    .table th,
    .table td {
      border: 1px solid black !important;
    }

    .hide {
      display: none;
    }
  </style>
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
            <h1 class="">รายงานผลการดำเนินงาน ระยะ 1 </h1>
          </div>
          <h1 class="text-right">
            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
          </h1>
          <table id="example" class="ui celled table text-center" style="width:100%">
            <thead>
              <tr style="font-size: 16px;">
                <th rowspan="3" style="width:15% white-space: nowrap; word-break: break-all;" >
                  <h2><b>CP ที่กำลังเดินงาน<b></h2>
                </th>
                <th id="nameData"></th>
                <th colspan="2" id="nameData2"></th>
                <th colspan="2" id="nameData3" style="width:15%"></th>
                <th colspan="3" id="nameData4" style="width:20%"></th>
                <th colspan="2" id="nameData5" style="width:10%"></th>
                <script>
                var Role = sessionStorage.getItem("Role");
                if (Role === 'ADMIN') {
                  document.write(' <th rowspan="3"><h2><b>Action<b></h2></th>');
                }
              </script>
              </tr>
              <tr style="font-size: 14px;">
                <th id="subname"></th>
                <th id="subname2"></th>
                <th id="subname3"></th>
                <th id="subname4"></th>
                <th id="subname5"></th>
                <th id="subname6"></th>
                <th id="subname7"></th>
                <th id="subname8"></th>
                <th id="subname9"></th>
                <th id="subname10"></th>
              </tr>
              <tr style="font-size: 12px;">
                <th id="time"></th>
                <th id="time2"></th>
                <th id="time3"></th>
                <th id="time4"></th>
                <th id="time5"></th>
                <th id="time6"></th>
                <th id="time7"></th>
                <th id="time8"></th>
                <th id="time9"></th>
                <th id="time10"></th>
              </tr>
            </thead>
            <tbody id="serviceList">
            </tbody>
            <tfoot>
              <th rowspan="3" style="width:15% white-space: nowrap; word-break: break-all;">
                <h2><b>CP ที่กำลังเดินงาน<b></h2>
              </th>
              <th id="footnameData"></th>
              <th colspan="2" id="footnameData2"></th>
              <th colspan="2" id="footnameData3"></th>
              <th colspan="3" id="footnameData4"></th>
              <th colspan="2" id="footnameData5"></th>
              <script>
                var Role = sessionStorage.getItem("Role");
                if (Role === 'ADMIN') {
                  document.write(' <th rowspan="3"><h2><b>Action<b></h2></th>');
                }
              </script>

            </tfoot>
          </table>
          <div id="pagination"></div>


          <div class="modal fade" id="edit_username" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                      aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">จัดการกระบวนการทำงาน</h4>
                </div>
                <div class="modal-body">
                  <div id="edit_form">
                    <h1>จัดการกระบวนการทำงาน</h1>
                    <button type="button" class="btn btn-primary" onclick="updateprocess('${user.USERNAME}')">
                      UpdateStatus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Roll Back</button>
                  </div>
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

    window.onload = function () {
      loadJobData();
      displayNames();
      displayfootNames();
      displaysubname();
      displaytime();
      // displayCurrentTime();
      // setInterval(displayCurrentTime, 1000);
    };



    function loadJobData() {
      fetch('http://10.1.1.155:3000/api/v1/job-management/getCal')
        .then(response => response.json())
        .then(data => {
          const userList = document.getElementById('serviceList');
          let html = '';
          data.data.forEach((user, index) => {
            console.log(user);

            // ตรวจสอบว่าค่าสถานะเท่ากับ 100% หรือไม่
            const hideStatus = user.STATUS === 100 ? 'hidden' : '';

            html += `
                    <tr  ${hideStatus}>
                        <td style="width:15% white-space: nowrap; word-break: break-all;"><h4 >${user.NAME}</h4></td>
                        <td colspan="10">
                            <div class="progress" >
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="${user.STATUS.toFixed(2)}" aria-valuemin="0" style="width: ${user.STATUS.toFixed(2)}%;"
                                    aria-valuemax="100">
                                    ${user.STATUS.toFixed(2)}%
                                </div>
                            </div>
                        </td>`;
            var Role = sessionStorage.getItem("Role");
            if (Role === 'ADMIN') {
              html += `
                            <td>
                            <button onclick="updateprocess('${user.ON}')" class="btn btn-success">UpdataStatus</button> 
                            <button type="button" class="btn btn-warning" onclick="rollbackprocess('${user.ON}')">Roll Back</button>
                        </td> `;
            }

            html += `
                            </tr >`;

          });

          userList.innerHTML = html;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }



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

    function displayNames() {
      fetch('http://10.1.1.155:3000/api/v1/timeline/get/')
        .then(response => response.json())
        .then(data => {
          let html = '';
          const names = data.Data.map(item => item.NAME);

          // แสดงผลชื่อแรกใน element ที่มี id เป็น 'nameData'
          const nameData = document.getElementById('nameData');
          html += `${names[0]} `;
          nameData.innerHTML = html;

          // แสดงผลชื่อที่สองใน element ที่มี id เป็น 'nameData2'
          const nameData2 = document.getElementById('nameData2');
          html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
          html += `${names[1]} `;
          nameData2.innerHTML = html;

          const nameData3 = document.getElementById('nameData3');
          html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
          html += `${names[2]} `;
          nameData3.innerHTML = html;

          const nameData4 = document.getElementById('nameData4');
          html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
          html += `${names[3]} `;
          nameData4.innerHTML = html;

          const nameData5 = document.getElementById('nameData5');
          html = ''; // เคลียร์ค่า html เพื่อนำมาใช้ใหม่
          html += `${names[4]} `;
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
          html += `${names[0]} `;
          subname.innerHTML = html;
          const subname2 = document.getElementById('subname2');
          html = '';
          html += `${names[1]} `;
          subname2.innerHTML = html;
          const subname4 = document.getElementById('subname4');
          html = '';
          html += `${names[2]} `;
          subname4.innerHTML = html;
          const subname6 = document.getElementById('subname6');
          html = '';
          html += `${names[3]} `;
          subname6.innerHTML = html;
          const subname9 = document.getElementById('subname9');
          html = '';
          html += `${names[4]} `;
          subname9.innerHTML = html;


          const names2 = data.Data.map(item => item.SUB_NAME_2);
          const subname3 = document.getElementById('subname3');
          html = '';
          html += `${names2[1]} `;
          subname3.innerHTML = html;
          const subname5 = document.getElementById('subname5');
          html = '';
          html += `${names2[2]} `;
          subname5.innerHTML = html;
          const subname7 = document.getElementById('subname7');
          html = '';
          html += `${names2[3]} `;
          subname7.innerHTML = html;
          const subname10 = document.getElementById('subname10');
          html = '';
          html += `${names[4]} `;
          subname10.innerHTML = html;


          const names3 = data.Data.map(item => item.SUB_NAME_3);
          const subname8 = document.getElementById('subname8');
          html = '';
          html += `${names3[3]} `;
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

          console.log(showtime);
          const time = document.getElementById('time');
          html = '';
          html += `${showtime[0]} `;
          time.innerHTML = html;
          const time2 = document.getElementById('time2');
          html = '';
          html += `${showtime[1]} `;
          time2.innerHTML = html;
          const time4 = document.getElementById('time4');
          html = '';
          html += `${showtime[2]} `;
          time4.innerHTML = html;
          const time6 = document.getElementById('time6');
          html = '';
          html += `${showtime[3]} `;
          time6.innerHTML = html;
          const time9 = document.getElementById('time9');
          html = '';
          html += `${showtime[4]} `;
          time9.innerHTML = html;

          const showtime2 = data.Data.map(item => item.SUB_TIME_2);
          console.log(showtime2);
          const time3 = document.getElementById('time3');
          html = '';
          html += `${showtime2[1]} `;
          time3.innerHTML = html;
          const time5 = document.getElementById('time5');
          html = '';
          html += `${showtime2[2]} `;
          time5.innerHTML = html;
          const time7 = document.getElementById('time7');
          html = '';
          html += `${showtime2[3]} `;
          time7.innerHTML = html;
          const time10 = document.getElementById('time10');
          html = '';
          html += `${showtime2[4]} `;
          time10.innerHTML = html;

          const showtime3 = data.Data.map(item => item.SUB_TIME_3);
          const time8 = document.getElementById('time8');
          html = '';
          html += `${showtime3[3]} `;
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
          html += `${names[0]} `;
          footnameData.innerHTML = html;
          const nameData2 = document.getElementById('footnameData2');
          html = '';
          html += `${names[1]} `;
          footnameData2.innerHTML = html;
          const nameData3 = document.getElementById('footnameData3');
          html = '';
          html += `${names[2]} `;
          footnameData3.innerHTML = html;
          const nameData4 = document.getElementById('footnameData4');
          html = '';
          html += `${names[3]} `;
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



    function showTime() {
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";

      if (h == 0) {
        h = 12;
      }

      if (h > 12) {
        h = h - 12;
        session = "PM";
      }

      h = (h < 10) ? "0" + h : h;
      m = (m < 10) ? "0" + m : m;
      s = (s < 10) ? "0" + s : s;

      var time = h + ":" + m + ":" + s + " " + session;
      document.getElementById("MyClockDisplay").innerText = time;
      document.getElementById("MyClockDisplay").textContent = time;

      setTimeout(showTime, 1000);

    }

    showTime();
  </script>

</body>

</html>