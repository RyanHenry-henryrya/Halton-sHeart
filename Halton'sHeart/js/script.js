function validate(){
  if (document.forms[1]["username"].value.trim().length < 5){
    alert("Username too short.");
  } else if (document.forms[1]["password"].value.trim().length < 8){
    alert("Password too short.");
  } else {
    document.forms[1].submit();
  }
}