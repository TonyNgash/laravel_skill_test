## Laravel Follow Up Skills Test

Simple Laravel project with a home page displaying a form. The form has three input fields to collect the following information

    - Product Name
    - Quantity in stock
    - Price per item

The submitted data from the form is then saved into a json file named products.json in the /storage/app/public folder.

Below the form is a table that lists every product as a row and is ordered with the recently added products as first. 

The row has three extra columns namely:

    - Date submitted: timestamp when added
    - Total value: Quantity * Price
    - Action: for editing a specific record
