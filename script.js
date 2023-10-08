
	


	

  // Get all tables with class 'table' and loop through them
  const tables = document.querySelectorAll('.table');
  tables.forEach(table => {
    // Add a click event listener to each table
    table.addEventListener('click', function(event) {
      // Check if the clicked element is a <td> inside a <tr>
      if (event.target.nodeName === 'TD' && event.target.parentNode.nodeName === 'TR') {
        // Find the <td> element with the 'name_in_table' class inside the clicked <tr>
        const nameTd = event.target.parentNode.querySelector('.name_in_table');

        // Check if the 'name_in_table' class exists in the clicked <tr>
        if (nameTd !== null) {
          // Get the text content of the <td> with the 'name_in_table' class (which is the name)
          const name = nameTd.textContent;

          // Create a form to submit the data
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = 'show_by_user.php';
          form.target = ''; // Open the posted page in a new tab or window

          // Add hidden input fields with the name2, remark, and remark2 values
          const inputName2 = document.createElement('input');
          inputName2.type = 'hidden';
          inputName2.name = 'name2';
          inputName2.value = '';
          form.appendChild(inputName2);

          const inputRemark = document.createElement('input');
          inputRemark.type = 'hidden';
          inputRemark.name = 'remark';
          inputRemark.value = '';
          form.appendChild(inputRemark);

          const inputRemark2 = document.createElement('input');
          inputRemark2.type = 'hidden';
          inputRemark2.name = 'remark2';
          inputRemark2.value = '';
          form.appendChild(inputRemark2);

          // Add a hidden input field with the name value
          const inputName = document.createElement('input');
          inputName.type = 'hidden';
          inputName.name = 'name';
          inputName.value = name;
          form.appendChild(inputName);

          // Submit the form
          document.body.appendChild(form);
          form.submit();
          document.body.removeChild(form);
        }
      }
    });
  });
  


// Get all tbody elements on the page
const tbodies = document.getElementsByTagName('tbody');

// Loop through each tbody
for (let i = 0; i < tbodies.length; i++) {
  // Get all rows in the tbody
  const rows = Array.from(tbodies[i].querySelectorAll('tr'));

  // Remove the rows from the tbody
  rows.forEach(row => row.remove());

  // Reverse the order of the rows
  const reversedRows = rows.reverse();

  // Add the rows back to the tbody in the reversed order
  reversedRows.forEach(row => tbodies[i].appendChild(row));
}



// Get the input field


 $(document).ready(function(){
    // Add an event listener to the search input
    $('#search-box').keyup(function(){
      var searchText = $(this).val().toLowerCase();
      // Loop through each row of the table
      $('tr.trans_data').each(function(){
        if($(this).text().toLowerCase().indexOf(searchText) === -1)
          $(this).hide();
        else
          $(this).show();
      });
    });
  });
  
 
 

  function printDiv() {
  var printContents = document.getElementById('print-content').innerHTML;
  var originalTitle = document.title; // Store the original page title
  
  // Generate the updated page title with date and time
  var currentDate = new Date();
  var formattedDate = currentDate.toLocaleDateString();
  var formattedTime = currentDate.toLocaleTimeString();
  var updatedTitle = document.title + ' - ' + formattedDate + ' ' + formattedTime;
  
  document.title = updatedTitle; // Update the page title
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
  document.title = originalTitle; // Restore the original page title
}
 