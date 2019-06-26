# Project Introduction

We are building an record keeping system for variable inventories. An inventory is an item kept in storage for future/current use. Everyone keeps record of inventory - its just different approaches. Lets give an approach to how we keep our records.

We want to build a record keeping system that can add different set of fields for different items. For example, I want to keep record of two separate categories of items, say, Cans of Juice for different flavors and Laptop Computers of various brands. These two items can have few common fields while many different fields like brand, quantity, name, sku, color as same fields while RAM, Processor, Battery Life, Flavour, Volume, Expiry Date, etc are different fields. 

But I do not want to be restricted to few field names only. I want to add my own field name and store the value for it if an item requires it. Example, I want to add a Model Number field for the item that belongs to Computers category. Similarly, I may want to add Juice Supplier field for the Juice category. Let's summarize this in a few acceptance criteria as below:

# Project Objectives
-  One can see an **Add Item** button that takes me to a form where I can add various required fields.
-  One can choose a category to separate my item from one another while adding the item
-  One can add/remove an entirely new field name and its value for my item.
-  One can save my item after passing validations
-  One can view my list of items by category
-  One can view a single item separately
-  One can update any item at my will and the updated data is rendered in the list
-  One can remove an item from my list and the total count of the item is updated accordingly
-  One can view/add/remove categories.
-  One can see the number of items stored in each category in the category list page.


# @copy All rights reserved.
         Any redistribution or reproduction of part or all of the contents in any form is 
         prohibited other than the following:
    -you may download to a local hard disk extracts for your personal and 
    non-commercial use only.

# Installation Details
- composer install
- npm install
- configure your .env file
- php artisan key:generate

# seed database
- php artisan migrate:fresh --seed
-> This will create 10 fake category and 20 fake items.
and a user with email id : bkhawas42@gmail.com  and password : password

## Finally run php artisan serve and you are good to go.. Enjoy.


