function validateForm() {
    var name = document.forms["bookingForm"]["name"].value;
    var email = document.forms["bookingForm"]["email"].value;
    var phone = document.forms["bookingForm"]["phone"].value;
    var doctor = document.forms["bookingForm"]["doctor"].value;
    var date = document.forms["bookingForm"]["date"].value;
    var time = document.forms["bookingForm"]["time"].value;
  
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
  
    if (email == "") {
      alert("Email must be filled out");
      return false;
    }
  
    if (phone == "") {
      alert("Phone must be filled out");
      return false;
    }
  
    if (doctor == "") {
      alert("Please select a doctor");
      return false;
    }
  
    if (date == "") {
      alert("Date must be selected");
      return false;
    }
  
    if (time == "") {
      alert("Time must be selected");
      return false;
    }
  
    return true;
  }
  