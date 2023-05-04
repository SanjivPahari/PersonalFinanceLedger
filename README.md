# PersonalFinanceLedger

A simple tool made in PHP and Bootstrap with data stored in a JSON file. It allows users to track incoming and outgoing transactions.

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
Displays a suggestions list of payee's names, remarks. Payee's, remarks with frequent transactions are suggested at top.

![Add Transaction Name Suggestion Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction_name_suggest.png)

![Add Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction.png)

##### Two Way Done
When a user selects the "Two Way Done" option, it means that a transaction has been completed between two parties. This feature is typically used for spontaneous transactions, where both parties are present and the transaction are settled immediately.

In your example, if you owe Rs. 30 for food and you give the payee Rs. 30, and select the  "Two Way Done" option, it means that the transaction has been settled and recorded in the system. The system will then create two transactions, one showing that you have to pay Rs. 30 to the payee, and the other showing that the payee has received Rs. 30 from you.

##### All Clear
All clear means that all settlements are done, i.e. Net Amount = 0. User can opt to select this option to put the transaction under 'All Clear', so that they can easily distingush points where settlements were made. The transactions where 'All Clear' were made will be displayed in blue row.

### Transaction Types
Displays different types of transactions that a user can add to the finance system.

!  Pending transactions are displayed by yellow highlight.
+ Transactions to recieve are shown in green.
- Transactions to give are shown in red.

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




