# Database System Principle project about transaction introduce by E-commerce website



## Abstract

E-commerce has been around the globe since mid 90s. However, only in the last couple of years, E-commerce is getting more and more attention from both entrepreneurs and customers. 

We are going to build an online shopping system that permits a customer to submit online orders for items from an online store. The system will accept the customer's submission of a purchase order for the item in response to both quantity and time of submission and perform a real time decrease in item quantity in the database. If the customer doesn’t confirm his order payment before time out, the item will be released from customer’s shopping cart and added again to the database. We will provide a virtual shopping cart for holding items selected for purchase, where the selected items are in it and decreased from the database until a customer either completes his/her shopping or time-out event occurs. Virtual shopping carts may be examined at any time within purchasing period, and their contents can be edited or deleted at the option of the customer. Once the customer decides to submit a purchase order then pay, an associated email containing a receipt of the purchased items will be sent to the customer.

In our work, our database management system will guarantee that all the transactions within orders are real-time reflected to the database. This leads to reducing orders errors such as order duplication, insufficient items in database and customers holding the same item at the same time.

**Related paper :** [SAGAS Hector Garcia-Molina & Kenneth Salem]
