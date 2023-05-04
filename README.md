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

![Add Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction.png)

#### Name Suggestion
Displays a suggestions list of payee's names. Payee's with frequent transactions are suggested at top.

![Add Transaction Name Suggestion Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/3_add_transaction_name_suggest.png)

### Archived Transactions
Displays a list of archived transactions that are no longer relevant or useful.

![Archived Transactions Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/4_archived.png)

### Download Backup
Allows users to download a backup of their financial data, which they can save locally.

![Download Backup Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/5_download_backup.png)

### Download Backup Data
Displays a pop-up window that provides information about the downloaded backup file, such as the filename and file size.

![Download Backup Data Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/5_download_backup_data.png)

### Pending Transactions
Displays a list of pending transactions that have not been processed yet, allowing users to keep track of transactions that are waiting to be completed.

![Pending Transactions Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/6_show_pending.png)

### Transaction Types
Displays different types of transactions that a user can add to the finance system, each with its own set of categories and fields.

- Transaction Type 1: Income transaction
![Income Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_1.png)

- Transaction Type 2: Expense transaction
![Expense Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_2.png)

- Transaction Type 3: Transfer transaction
![Transfer Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_3.png)

- Transaction Type 4: Loan transaction
![Loan Transaction Screenshot](/FINANCE%20SYSTEM%20SCREENSHOTS/7_transaction_type_4.png)


