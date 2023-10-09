# PersonalFinanceLedger

A simple tool made in PHP and Bootstrap with data stored in a JSON file. It allows users to track incoming and outgoing transactions.
<hr>

#### Developed: April 2023

### Developer:

- Sanjiv Pahari
<hr>

## V2 Changes (October 2023):
- Added Nepali Date
- Added Print
- Added Option to Repeat Transactions
- Few Minor Changes
- Code is cleaner

![V2Screenshot](/v2%20changes/1.png)
<hr>

![V2Screenshot](/v2%20changes/2.png)
<hr>

![V2Screenshot](/v2%20changes/4.png)
<hr>

![V2Screenshot](/v2%20changes/5.png)
<hr>

![V2Screenshot](/v2%20changes/6.png)
<hr>

![V2Screenshot](/v2%20changes/7.png)
<hr>

# Background

Oh boy, do I have a story to tell you!<br>
You know that feeling when you need something so badly that it's like your life depends on it? Well, that's exactly what happened to me. I was in desperate need of a tool that could help me manage my transactions, and I just couldn't find anything that fit the bill.<br>
But then, I stumbled upon ChatGPT and its amazing ability to write code. I was so curious that I just had to give it a try. And boy, was I blown away by its capabilities! I knew right then and there that I had to create a tool that would help me manage my transactions easily and efficiently.<br>
So, I set out on a journey to develop this simple yet powerful tool. It took a lot of hard work and dedication, but it was all worth it. This tool has saved me countless hours of frustration and made my life so much easier.<br>
Gone are the days of juggling my transactions between Messenger, Notepad, and other apps. With this tool, I can easily manage all my transactions in one place. And let me tell you, keeping up with transactions was a nightmare before.<br>
I'd say ChatGPT contributed about 50% to the development of this tool, but the other 50% was all me. I have also added payment modes like eSewa and Connectips that are tailored to my needs.<br>
In conclusion, if you're ever in a situation where you need a tool so badly that you can't live without it, just go ahead and create it! Who knows, it might just change your life. And hey, don't forget to thank ChatGPT for helping me polish this description too!


<hr>

## Features

### Homepage
Displays a list of all the user's financial transactions, including completed and pending transactions. Clicking on a specific transaction opens up that specific payee's transactions.

![Homepage Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/1_homepage.png)

#### Transaction Search
Allows users to search for transactions by directly entering any details associated with the transaction.

![Transaction Search Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/8_transaction_search.png)


### User Transactions
Shows a list of transactions made for a specific payee, including the date, remark, type, payment method, and amount of each transaction. Also displays the cumulative amount up to the specific point.
Transactions can be searched by entering payee's name, remark.

![User Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/2_user_transaction.png)

![User Transaction Details Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/2_user_transaction_2.png)

### Add Transaction
Allows users to add a new transaction by selecting the transaction amount, type, remark, and payment method. User can also upto to provide further details on payment method like payment account number or other details.

#### Name & Remark Suggestion
Displays a suggestions list of payee's names, remarks. Payees, remarks with frequent transactions are suggested at top.

![Add Transaction Name Suggestion Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction_name_suggest.png)

![Add Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction.png)

##### Two Way Done
When a user selects the "Two Way Done" option, it means that a transaction has been completed between two parties. This feature is typically used for spontaneous transactions, where both parties are present and the transaction are settled immediately.

In your example, if you owe Rs. 30 for food and you give the payee Rs. 30, and select the  "Two Way Done" option, it means that the transaction has been settled and recorded in the system. The system will then create two transactions, one showing that you have to pay Rs. 30 to the payee, and the other showing that the payee has received Rs. 30 from you.

##### All Clear
All clear means that all settlements are done, i.e. Net Amount = 0. User can opt to select this option to put the transaction under 'All Clear', so that they can easily distingush points where settlements were made. The transactions where 'All Clear' were made will be displayed in blue row.

### Transaction Types
Displays different types of transactions that a user can add to the finance system.
<br> Pending transactions are displayed by yellow highlight.
<br> Transactions to recieve are shown in green.
<br> Transactions to give are shown in red.

- Transaction Type 1: Receive Pending
![Income Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_1.png)

- Transaction Type 2: Receive Complete
![Expense Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_2.png)

- Transaction Type 3: Give Pending
![Transfer Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_3.png)

- Transaction Type 4: Give Complete
![Loan Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_4.png)


### Pending Settelments
Displays a list of payees with whom settlements that have not been made yet, allowing users to keep track of settlements that are waiting to be completed.

![Pending Transactions Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/6_show_pending.png)


### Archived Transactions

Displays a list of archived transactions that are no longer relevant or useful. <br> 
User can click on archive button to send the transaction to archive. This removes the transaction from system if there are some errors while entering the transaction. <br>
If user reclicks the archive button, from the archived section, it will unarchive the transaction.

![Archived Transactions Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/4_archived.png)


### Download Backup
Allows users to download a backup of their financial data, which they can save locally. The data is stored in .json file.

![Download Backup Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/5_download_backup.png)

![Download Backup Data Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/5_download_backup_data.png)

<hr>

## Files

* `icons/` - Directory containing icons for the finance system.
* `README.md` - This file provides information about the repository.
* `archive.php` - A PHP file for archiving transactions in the finance system.
* `archived_transactions.php` - A PHP file for displaying archived transactions in the finance system.
* `archives.json` - A JSON file containing data on archived transactions in the finance system.
* `data.json` - A JSON file containing data on transactions in the finance system.
* `download_backup.php` - A PHP file for downloading a backup of the finance system data.
* `form.php` - A PHP file for displaying a form to input transactions into the finance system.
* `functions.php` - A PHP file containing functions used throughout the finance system.
* `header.php` - A PHP file containing the header for the finance system.
* `index.php` - The main PHP file for displaying the finance system.
* `process.php` - A PHP file for processing input from the form in `form.php`.
* `script.js` - A JavaScript file containing functions used throughout the finance system.
* `show_by_user.php` - A PHP file for displaying transactions by user in the finance system.
* `show_pending.php` - A PHP file for displaying pending transactions in the finance system.
* `style.php` - A PHP file containing the styling for the finance system.

