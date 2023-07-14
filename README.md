
# Nemosa API

Website design for a cabinetmaker. This is my final project for my Web Development ASC (Attestation of College Studies).

It's a showcase and transactional website. It features an online store. Payments are made via Stripe.

This is the PHP server side of the website. The React client side of the website can be found in this repository : [@marielGtGg/nemosa](https://github.com/marielGtGg/nemosa). 

All products are managed on Stripe plateform. Products are retreived through Stripe API to be displayed in the store ("Boutique").

Last creations section's content ("Dernières réalisations") is feeded through Instagram Basic Display API. It shows the 10 last posts made by the cabinetmaker on Instagram. 


## Tech Stack

**Client:** React (JSX), CSS

**Server:** PHP, SQL


## Environment Variables

To run this project, you will need to add a folder named 'config' at the root of the project containing a file named 'config.php' with the following code :

```php
<?php

return [
    'stripe_test_key' => 'your_stripe_test_key',
];
```


## Authors

- [@marielGtGg](https://github.com/marielGtGg)


## Feedback

If you have any feedback, please reach out to us at mariel.gauthier.gregoire@gmail.com

