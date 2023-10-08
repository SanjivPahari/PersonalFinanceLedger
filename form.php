<!DOCTYPE html>



<html>
<head>
	<title>Transaction Form</title>
	
	<?php
require_once('functions.php');

require_once('style.php');
?>

</head>
<body>
	<div class="container">
	
	
			<?PHP require('header.php'); ?>


	<div class="container mt-5">
  <div class="card bg-light">
    <div class="card-header">
      <h3 class="card-title text-center">Add New Transaction</h3>
    </div>
    <div class="card-body">
		
	
		
		<form action="process.php" method="post">
  <div class="form-group row">
    <div class="col-sm-4">
     
	 
	             <?php generateDatalist((array_column($transactions, 'amount')), 'amount', 'Select Amount', isset($_POST['amount']) ? $_POST['amount'] : '','money-bill'); ?>


    </div>


<div class="col-sm-4">
    <label>Direction:</label>
    <h3>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="direction" id="receive" value="receive" <?php echo (isset($_POST['direction']) && $_POST['direction'] === 'receive') ? 'checked' : ''; ?> required>
            <label class="form-check-label" for="receive">
                Receive
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="direction" id="give" value="give" <?php echo (isset($_POST['direction']) && $_POST['direction'] === 'give') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="give">
                Give
            </label>
        </div>
    </h3>
</div>



    <div class="col-sm-4">
      <label>Type:</label>
	  
	  
	  <h3>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="pending" value="pending" <?php echo (isset($_POST['type']) && $_POST['type'] === 'pending') ? 'checked' : ''; ?> required>
        <label class="form-check-label" for="pending">
          Pending
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="completed" value="completed" <?php echo (isset($_POST['type']) && $_POST['type'] === 'completed') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="completed">
          Completed
        </label>
      </div>
    </div>
	</h3>
	
	
  </div>
  <div class="form-group row">
    <div class="col-sm-6">
	
	
 <?php generateDatalist((array_column($transactions, 'name')), 'name', 'Select Name', isset($_POST['name']) ? $_POST['name'] : '','user'); ?>
 
	
	  
    </div>
    <div class="col-sm-6">
     

     <?php generateDatalist((array_column($transactions, 'remark')), 'remark', 'Select Remark', isset($_POST['remark']) ? $_POST['remark'] : '','sticky-note'); ?>



    </div>
  </div>
  
  

  
  
  <div class="form-group row">
  


<div class="col-sm-8">
  <label for="payment-method">Payment Method:</label>
  <div class="pagination">
    <?php
      $paymentMethods = array("cash", "esewa", "khalti", "imepay", "card", "connectips", "other");
      foreach ($paymentMethods as $method) {
        $isActive = ($method == 'cash') ? 'active' : '';
    ?>
      <a href="#" class="page-link <?php echo $isActive; ?>" data-name="<?php echo ucfirst($method); ?>">
        <img src="icons/<?php echo $method; ?>-icon.png" alt="<?php echo ucfirst($method); ?> Icon" width="40" height="40" class="mr-2">
        <?php echo ucfirst($method); ?>
      </a>
    <?php
      }
    ?>
  </div>
  <div class="form-group mt-3" id="other-payment">
    <label for="other-account-number" id="account-number-label">Details:</label>
  
	
	 <?php generateDatalist_acc_num((array_column($transactions, 'acc_num')), 'other-account-number', 'Select Acc Number' ); ?>
	 
	 
    <input type="hidden" id="payment_mode" name="payment_mode" value="">
  </div>
</div>

<script>
  // Handle payment method click event
  function handlePaymentMethodClick(event) {
    event.preventDefault();
  
    // Remove active class from all links
    const paginationLinks = document.querySelectorAll('.pagination .page-link');
    paginationLinks.forEach(link => {
      link.classList.remove('active');
    });

    // Add active class to clicked link
    const clickedLink = event.target.closest('.page-link');
    clickedLink.classList.add('active');

    // Set the selected payment mode in the hidden input field
    const paymentModeInput = document.getElementById('payment_mode');
    const selectedPaymentMode = clickedLink.getAttribute('data-name');
    paymentModeInput.value = selectedPaymentMode;

    const transactionDetailsMode = document.getElementById('transaction-details-mode');
    const capitalizedPaymentMode = selectedPaymentMode.charAt(0).toUpperCase() + selectedPaymentMode.slice(1);
    transactionDetailsMode.innerHTML = `Payment Mode: ${capitalizedPaymentMode}`;
  }

  // Add click event listener to each link
  const paginationLinks = document.querySelectorAll('.pagination .page-link');
  paginationLinks.forEach(link => {
    link.addEventListener('click', handlePaymentMethodClick);
  });
</script>


 



   
	
	
	
   
    <div class="col-sm-4">
	  
	  
	  <h3>
	  
	   <div class="form-check">
        <input class="form-check-input" type="checkbox" name="two_way" id="two_way" value="yes" >
        <label class="form-check-label" for="two_way">
         Two Way Done
        </label>
      </div>
	  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="clear_check" id="clear_check" value="yes" >
        <label class="form-check-label" for="clear_check">
         All Clear
        </label>
      </div>
  
	</h3>
	
	
	
	 	<br><br>
    <button type="submit" class="btn btn-primary btn-lg btn-block">
            Submit <i class="fa fa-paper-plane"></i>
          </button>
		
		  
	
	</div>
  </div>
  
  


  
  

		  
</form>

		</div></div></div>
		

<h3>
<div id="transaction-details">

</div>

<div id="transaction-details-mode">

</div>

</h3>


<script>
//form validation





</script>

<script>


 

$(document).ready(function() {
  $('#other-payment').hide();
  $('.page-link').click(function() {
    var paymentMethod = $(this).data('name');
    $('.page-item').removeClass('active');
    $(this).parent().addClass('active');
    
	if (paymentMethod === 'Cash') {
      $('#other-payment').hide();
    } else {
      $('#other-payment').show();
      if (paymentMethod === 'Other' || paymentMethod === 'Connectips') {
        $('#account-number-label').html('Details: ');
      } else {
        $('#account-number-label').html('Account Number: ');
      }
    }
    $('#payment_mode').val(paymentMethod.toLowerCase());
  });
});


  
// update details

const form = document.querySelector('form');
const transactionDetails = document.querySelector('#transaction-details');

// Add event listeners to each input field
const amountInput = document.querySelector('#amount');
amountInput.addEventListener('input', updateTransactionDetails);

const directionInputs = document.querySelectorAll('input[name="direction"]');
for (const directionInput of directionInputs) {
  directionInput.addEventListener('change', updateTransactionDetails);
}

const typeInputs = document.querySelectorAll('input[name="type"]');
for (const typeInput of typeInputs) {
  typeInput.addEventListener('change', updateTransactionDetails);
}

const nameInput = document.querySelector('#name');
nameInput.addEventListener('change', updateTransactionDetails);




const remarkInput = document.querySelector('#remark');
remarkInput.addEventListener('change', updateTransactionDetails);





const submitBtn = document.querySelector('button[type="submit"]');

submitBtn.addEventListener('click', function(event) {
  if (nameInput.value === '') {
    event.preventDefault();
    const errorEl = document.querySelector('#name-error');
    if (errorEl) {
      errorEl.textContent = 'Please provide a name.';
    } else {
      const divEl = document.createElement('div');
      divEl.setAttribute('id', 'name-error');
      divEl.textContent = 'Please provide a name.';
      nameInput.parentNode.insertBefore(divEl, nameInput.nextSibling);
    }
  }
});




function updateTransactionDetails() {
  // Get the values of the input fields
  const amount = document.querySelector('#amount').value;
  
  const directionInputs = document.querySelectorAll('input[name="direction"]');
  let direction;
  for (const directionInput of directionInputs) {
    if (directionInput.checked) {
      direction = directionInput.value;
      break;
    }
  }
  
  const typeInputs = document.querySelectorAll('input[name="type"]');
  let type;
  for (const typeInput of typeInputs) {
    if (typeInput.checked) {
      type = typeInput.value;
      break;
    }
  }
 
   const name = document.querySelector('#name').value;
 
  const recipientName = name;
  
 const remark = document.querySelector('#remark').value;

const transactionRemark = remark;



 if (type === 'completed') {
    if (direction === 'give') {
      transactionDetails.innerHTML = '<span class="give ' + (remark === 'all clear' ? 'clear' : '') + '">' + `I have given Rs. ${amount} to ${recipientName} for : ${transactionRemark}` + '</span> ';
    } else if (direction === 'receive') {
      transactionDetails.innerHTML = '<span class="receive ' + (remark === 'all clear' ? 'clear' : '') + '">' + `I have received Rs. ${amount} from ${recipientName} for : ${transactionRemark}` + '</span>';
    }
  } else if (type === 'pending') {
    if (direction === 'give') {
      transactionDetails.innerHTML = '<span class="give pending ' + (remark === 'all clear' ? 'clear' : '') + '">' + `I have to give Rs. ${amount} to ${recipientName} for : ${transactionRemark}` + '</span>';
    } else if (direction === 'receive') {
      transactionDetails.innerHTML = '<span class="receive pending ' + (remark === 'all clear' ? 'clear' : '') + '">' + `I have to receive Rs. ${amount} from ${recipientName} for : ${transactionRemark}` + '</span>';
    }
  }
  
 }

</script>



	<script src="script.js"></script>
	
	</div>
	
	
	
</body>
</html>
