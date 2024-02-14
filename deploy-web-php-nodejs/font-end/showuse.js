function showuser(USERNAME) {
  fetch("http://10.1.1.155:3000/api/v1/user/get/" + USERNAME)
    .then((response) => response.json())
    .then((data) => {
      const showList = document.getElementById("showList");
      let html = "";

      const user = data.data;
      html += `
                    <input type="hidden" id="updateusername" name="updateusername" class="form-control"
                        value="${user.USERNAME}" placeholder="Username"><br>
                    <input type="text" id="updatefirstname" name="updatefirstname" class="form-control"
                        value="${user.FIRSTNAME}" placeholder="First Name"><br>
                    <input type="text" id="updatelastname" name="updatelastname" class="form-control"
                        value="${user.LASTNAME}" placeholder="Last Name"><br><br>
                `;

      showList.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function edituser() {
  var formData = {
    username: $("#updateusername").val(),
    firstname: $("#updatefirstname").val(),
    lastname: $("#updatelastname").val(),
  };
  $.ajax({
    type: "PATCH",
    url: "http://10.1.1.155:3000/api/v1/user/edit/" + formData.username,
    contentType: "application/json",
    data: JSON.stringify(formData),
    success: function (response) {
      console.log(response);
      alert("Data updated successfully");
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.error(error);
      alert("Error updating data");
    },
  });
}
function showservice(ON) {
  fetch("http://10.1.1.155:3000/api/v1/job-management/get/" + ON)
    .then((response) => response.json())
    .then((data) => {
      const showList = document.getElementById("showList");
      let html = "";

      const user = data.Data;
      html += `
                <input type="hidden" id="updateON" name="updatefirstname" class="form-control"
                    value="${user.ON}" placeholder="First Name"><br>
                <input type="text" id="updatename" name="updatename" class="form-control"
                    value="${user.NAME}" placeholder="Last Name"><br><br>
            `;

      showList.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function editnamesevice() {
  var formData = {
    no: $("#updateON").val(),
    name: $("#updatename").val(),
  };
  $.ajax({
    type: "POST",
    url:
      "http://10.1.1.155:3000/api/v1/job-management/update/name/" +
      formData.no +
      "?name=" +
      formData.name,
    contentType: "application/json",
    data: JSON.stringify(formData),
    success: function (response) {
      console.log(response);
      alert("Data updated successfully");
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.error(error);
      alert("Error updating data");
    },
  });
}
function showprocess(ON) {
  fetch(`http://10.1.1.155:3000/api/v1/timeline/get/${ON}`)
    .then((response) => response.json())
    .then((data) => {
      const showList = document.getElementById("showList");
      let html = "";
      const user = data.Data;
      html += `
      <input type="hidden" id="updateON" name="updateON" class="form-control" value="${user.ON}"><br>
      <input type="text" id="updatename" name="updatename" class="form-control" value="${user.NAME}" ><br><br>
      <input type="text" id="subname" name="subname" class="form-control" value="${user.SUB[0]["SUB_NAME_1"]}" ><br><br>
      <input type="text" id="subname2" name="subname2" class="form-control" value="${user.SUB[1]["SUB_NAME_2"]}" ><br><br>
      <input type="text" id="subname3" name="subname3" class="form-control" value="${user.SUB[2]["SUB_NAME_3"]}" ><br><br>
      <input type="text" id="time" name="time" class="form-control" value="${user.SUB[0]["SUB_TIME_1"]}" ><br><br>
      <input type="text" id="txttime2" name="txttime2" class="form-control" value="${user.SUB[1]["SUB_TIME_2"]}" ><br><br>  
      <input type="text" id="txttime3" name="txttime3" class="form-control" value="${user.SUB[2]["SUB_TIME_3"]}" ><br><br>   
            `;
      showList.innerHTML = html;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function editprocess() {
  var no = document.getElementById("updateON").value;
  var CP = document.getElementById("updatename").value;
  var name1 = document.getElementById("subname").value;
  var name2 = document.getElementById("subname2").value;
  var name3 = document.getElementById("subname3").value;
  var time1 = document.getElementById("time").value;
  var txttime2 = document.getElementById("txttime2").value;
  var txttime3 = document.getElementById("txttime3").value;
  var formData = {
    name: CP,
    sub: [
      { SUB_NAME_1: name1, SUB_TIME_1: time1 },
      { SUB_NAME_2: name2, SUB_TIME_2: txttime2 },
      { SUB_NAME_3: name3, SUB_TIME_3: txttime3 },
    ],
  };
  console.log(formData);
  console.log(time2);
  $.ajax({
    type: "PATCH",
    url: `http://10.1.1.155:3000/api/v1/timeline/update/all/${no}`,
    contentType: "application/json",
    data: JSON.stringify(formData),
    success: function (response) {
      console.log(response);
      alert("Data updated successfully");
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.error(error);
      alert("Error updating data");
    },
  });
}

function editlignk() {
  var formData = {
    no: $("#updateON").val(),
    name: $("#updatename").val(),
  };
  $.ajax({
    type: "POST",
    url:
      "http://10.1.1.155:3000/api/v1/link/update/" +
      formData.no +
      "?name=" +
      formData.name,
    contentType: "application/json",
    data: JSON.stringify(formData),
    success: function (response) {
      console.log(response);
      alert("Data updated successfully");
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.error(error);
      alert("Error updating data");
    },
  });
}
