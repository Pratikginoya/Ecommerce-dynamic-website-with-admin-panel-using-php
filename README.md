# Ecommerce-dynamic-website-with-admin-panel-using-php

After learning PHP, Ajax, MySQL, etc.., I have made this project of Dynamic Ecommerce website with Admin panel

## Admin (Back-end) Panel:-
After admin login, user can access Front-end of the website 
(Please refer blow screen-shot of main dashboard..)
![Main Dashboard of Admin panel](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/7e01709a-aca4-4d2e-80ae-6a8dd7a34fcf)


-> In slider, user can Add, Delete, Edit, View the all pages of slider
-> In Product, 
  user can Add, Delete, View the products
  user can edit the details of products like change the status of Stock (In-stock or Out-of-stock), Change product size and color, change the product price, etc...
  (Please refer below screen-shot for All products view, Product Detailed View, Product Details Change...)
![All products view](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/9f9c758c-6387-4a4d-a855-83562e0abe94)
![Product Detailed View](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/4cd1eda7-4ace-4fa8-a526-4a052a710290)
![Product Details Change](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/0c4d21e2-2a10-4e86-858c-a6614db411da)

-> In blog, user can Add, Delete, Edit and View the all blogs
-> In About, user can change his Story, mission and slogan of his business
(Please refer below screen-shot for Editable page of About us..)
![About us editable page](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/7fdae1de-158c-4774-8d2a-369e8aa0a9d1)

-> In Contacted-us, user can check the data of contacted-us peoples (Data is collected from Contact-us tab of the website)
-> In Order, user can manage his orders or change the status of Orders
 (Please refer below screen-shot for All Pending Orders list, Change the status of Order, All past Orders list...)
 ![All Pending Orders list](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/6cbd2239-3ede-418c-9766-4f9e272b647a)
 ![Change the status of Order](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/98657ffe-8dcb-4e27-9085-bae7e82256f8)
![All past Orders list](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/fbe7e221-7d76-447d-81f2-1367b9c5a5d1)

## Front-end of Website :-
Get all the data from database (which is updated by the admin using above admin panel) and Apply on front-end using CRUD operations of PHP

### On forn-end...

User can view all products and other details of website without Login (User Login is required during Manage Shopping cart, Buy the products, Manage his/her data)
Major functions...
-> Created user Login and Registration so that user can access his data (like past order history, current orders, etc) through his Login credential..
-> Add forgot password option so that user can recover his account through password change (used SMTP mail function to send that OPT on user email)
-> User can manage his own profile like, Change name, email (add OTP verification in email change), mobile, etc through his/her current password
(Please refer below screen-shot of Manage profile page...)
![Manage Profile](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/e40e2ec4-011f-4e8a-9b50-05f1264bbd76)

-> User can easily add the products on his Shopping-cart so that it will helpful to shop more products..
(Please refer below screen-shots of Shopping cart...)
![Shopping Cart](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/8b8cece9-16b7-4a3b-828e-ea8ba61736cb)
![Shopping Cart - 2](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/047f0522-4cf3-40f3-80c9-f50577b7b0c6)

-> User can manage his Orders like view past orders, current order status, pending orders, etc...
-> User can easily cancel his order using Order-list..
(Please refer below screen-shot of Order-list..)
![Order list](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/79db5d93-6d40-443c-9b10-7c09b5d30c46)


Other usefull functions...
-> Also separated the mans, women, accessories products throught product categor so that user can easily find the products
-> Added pagination using AJAX in products list
(Please refer below screen-shot of Product list and Paginatino..)
![List of Product with Pagination](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/b8b98730-2ff4-4816-b206-cd10dc829857)

-> Added search-product feature using AJAX in in products list
-> Added filter option using AJAX in products list
(Please refer below screen-shot of list of products with Low-High Price Filter...)
![Filter Low - High](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/15b44aa9-adf1-4235-ada8-959754b07f24)

-> Added products review/comment function using AJAX in end of the product-detail

Please refer below screen-shot of Website home...
![Website home](https://github.com/Pratikginoya/Ecommerce-dynamic-website-with-admin-panel-using-php/assets/143998558/97255dad-7c1d-4207-8915-6219479abf43)

