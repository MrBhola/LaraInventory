# sample-inventory

We are building an record keeping system for variable inventories. An inventory is an item kept in storage for future/current use. Everyone keeps record of inventory - its just different approaches. Lets give an approach to how we keep our records.

We want to build a record keeping system that can add different set of fields for different items. For example, I want to keep record of two separate categories of items, say, Cans of Juice for different flavors and Laptop Computers of various brands. These two items can have few common fields while many different fields like brand, quantity, name, sku, color as same fields while RAM, Processor, Battery Life, Flavour, Volume, Expiry Date, etc are different fields. 

But I do not want to be restricted to few field names only. I want to add my own field name and store the value for it if an item requires it. Example, I want to add a Model Number field for the item that belongs to Computers category. Similarly, I may want to add Juice Supplier field for the Juice category. Let's summarize this in a few acceptance criteria as below:

## Acceptance Criteria
- [] I can see an **Add Item** button that takes me to a form where I can add various required fields.
- [] I can choose a category to separate my item from one another while adding the item
- [] I can add/remove an entirely new field name and its value for my item.
- [] I can save my item after passing validations
- [] I can view my list of items by category
- [] I can view a single item separately
- [] I can update any item at my will and the updated data is rendered in the list
- [] I can remove an item from my list and the total count of the item is updated accordingly
- [] I can view/add/remove categories.
- [] I can see the number of items stored in each category in the category list page.

## Directions for coding
- Use Laravel 5.6+
- Try to make use of Interfaces/abstract classes while building this app
- Write migrations for whatever tables/data you need it to make up and running
- Follow PSR-2 coding conventions
- Write doc comments for the code you write
- Demonstrate your skill in **git** by making more than just a few commits
