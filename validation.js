let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let name = id("name"),
address = id("address"),
salary = id("salary"),
form = id("form"),

errorMsg = classes("error");

let engine = (id, serial, message) => {

    if (id.value.trim() === "") {
      errorMsg[serial].innerHTML = message;
      id.style.border = "2px solid red";
    } 
    
    else {
      errorMsg[serial].innerHTML = "";
      id.style.border = "2px solid green";
    }
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();
  
    engine(username, 0, "Employee Name cannot be blank");
    engine(email, 1, "Address cannot be blank");
    engine(password, 2, "Salary cannot be blank");
  });