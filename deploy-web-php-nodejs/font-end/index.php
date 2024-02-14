<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">
  <title>Index</title>
</head>

<body>
  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container">

        <div class="row align-items-center justify-content-center">

          <div class="col-md-12 text-center">
            <p>
            <div id="logo">
              
            </div>
            </p>
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3><strong>ยินดีต้อนรับ</strong></h3>
                <p class="mb-4">โปรดเข้าสู่ระบบเพื่อดูข้อมูล</p>
              </div>
              <form name="form1" method="post" onsubmit="login(); return false;">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username"
                    name="username" Required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name="password"
                    Required>
                </div>
                <button type="submit" class="btn btn-block btn-primary" onclick="login()">Login</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    window.onload = function () {
      Showpic()
    };
    function login() {
      var formData = {
        username: $('#username').val(),
        password: $('#password').val(),
      };

      $.ajax({
        type: 'POST',
        url: 'http://10.1.1.155:3000/api/v1/user/login',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function (response) {
          console.log(response);
          if (response.data) {
            var session = response.data;
            localStorage.setItem('session', JSON.stringify(session));
            console.log('Session:', session);
            saveSession(formData.username);
            sessionStorage.setItem("Role", session.ROLE);
            sessionStorage.setItem("session_started", "true");
            window.location.href = 'dashboard.php';
          } else {
            console.log(response);
            alert('ไม่สามารถเข้าสู่ระบบได้ กรุณาลองอีกครั้ง');
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
          alert('เกิดข้อผิดพลาดในการเชื่อมต่อกับเซิร์ฟเวอร์');
        }
      });
    }

    // Save user information to sessionStorage after successful login
    function saveSession(username) {
      sessionStorage.setItem('username', username);
    }

    function getSession() {
      return sessionStorage.getItem('username');
    }
    // Clear user information from sessionStorage on logout
    function clearSession() {
      sessionStorage.removeItem('username');
    }
    function saveSessionrole(role) {
      sessionStorage.setItem('role', role);
    }

    function getSessionrole() {
      return sessionStorage.getItem('role');
    }
    // Clear user information from sessionStorage on logout
    function clearSessionrole() {
      sessionStorage.removeItem('role');
    }
    

    function Showpic() {
      fetch('http://10.1.1.155:3000/api/v1/file-management/get/files')
        .then(response => response.json())
        .then(data => {
          const logo = document.getElementById('logo');
          let html = '';
          data.data.forEach((user, index) => {
            console.log(user);
            html += `
            <img src="${user.path}" alt="" width="200px">
                  `;
          });
          logo.innerHTML = html;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  </script>

</body>

</html>