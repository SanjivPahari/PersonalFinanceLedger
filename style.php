

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
	
	
<style>


.pagination .active {
  background-color: #F9E79F;
  color: black;
}


		.completed {
			//font-weight: bold;
		}
		.give {
			color: red;
		}
		.receive {
			color: green;
		}
		
 .pending {
  background-color: #F9E79F;
}

 .clear {
  background-color: #CEECF3;
}


	</style>
	
	
	<style>
  /* Add a pointer cursor when hovering over rows with the 'name_in_table' class */
 .table tr:hover {
    cursor: pointer;
	 background-color: #E8F8F5;
  }
</style>

 <style>
    .extra {
      max-width: 80%; /* Increase the max-width property to increase the container size */
    }
	 .extra2 {
      max-width: 60%; /* Increase the max-width property to increase the container size */
    }
  </style>


<Script>





 function Archive(date) {
	 

  // ask for confirmation before proceeding
  const confirmArchive = confirm("Are you sure you want to archive/unarchive this item?");

  // if user clicks "OK"
  if (confirmArchive) {
	  
	  

	

    // make an AJAX request to archive.php with the date value
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "archive.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // if the AJAX request is successful, remove the <td> element that contained the button
          window.location.reload();
      }
    };
    xhr.send("date=" + encodeURIComponent(date));
  }
}

function RepeatPayment(date) {
  // Make an AJAX request to data.php
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "data_extract.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Extract the returned data from the response
      var responseObj = JSON.parse(xhr.responseText);

     var data = responseObj[0];
var form = document.createElement("form");
form.method = "POST";
form.action = "form.php";

// Create hidden input fields to carry the extracted data
for (var key in data) {
  var input = document.createElement("input");
  input.type = "hidden";
  input.name = key;
  input.value = data[key];
  form.appendChild(input);
}



      // Append the form to the current page and submit it
      document.body.appendChild(form);
      form.submit();
    }
  };
  // Send the date as a POST parameter to data.php
  xhr.send("date=" + encodeURIComponent(date));
}


</script>

