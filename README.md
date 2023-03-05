## Cat-Store

- Can adopt / purchase cats from the web and I guess they'll be delivered to you.

## Software Architecture

- Made with Laravel (MVC).
- Uses MySQL database (migrations and seeders are included).
- Frontend uses tailwind (for css classes), blade from Laravel and finally vite as a bundler.
- Frontend of the app is responsive for mobile devices.
- You can search through all cats and filter your results.

## App Flow

- Landing Page:
    - Contains multiple sections to display images and info.
    
- Shipping Page:
    - After choosing a cat to adopt you are redirected to the shipping page,
    here you can put in your shipping information, which will be stored in a session.
    - It has client side AND server side validation for the form data, on error it displays
    alert to let the user know.

- Checkout Page:
    - Similar to shipping page has form which is validated both on client AND server side and shows alert on error.
    - Also displays product info (info of cat you are adopting) and shipping info which
    you can choose to edit and get back to shipping page.
    - On Form submit we make a request using javascript's fetch api (i didn't think using a whole library
    like ajax just for one request was needed), the request is made to a route which calls a controller function
    which then handles all the database stuff.
    
- Thank You Page:
    - After payment is validated the user is redirected here to show their purchase was made.
