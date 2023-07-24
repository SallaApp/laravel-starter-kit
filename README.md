<div id="top"></div>

<br />
<div align="center"> 
  <a href="https://salla.dev"> 
    <img src="https://salla.dev/wp-content/uploads/2023/03/1-Light.png" alt="Logo"> 
  </a>
  <h1 align="center">Salla Apps Starter Kit</h1>
  <p align="center">
    An awesome starter template to create your Salla Apps today!
    <br />
    <a href="https://salla.dev/"><strong>Explore our blogs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/SallaApp/Laravel-Start-Kit/issues/new">Report Bug</a> · 
    <a href="https://github.com/SallaApp/Laravel-Start-Kit/discussions/new">Request Feature</a> . <a href="https://t.me/salladev">&lt;/Salla Developers&gt;</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details open>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li>
        <a href="#configure-authorization-modes-">Configure Authorization Modes</a>
        <ul>
            <li><a href="#easy-mode-">Easy Mode</a></li>
            <li><a href="#custom-mode-">Custom Mode</a></li>
        </ul>
    </li>
    <li>
        <a href="#authorization-service">Authorization Service</a>
        <ul>
            <li><a href="#refreshing-a-token">Refreshing a Token</a></li>
        </ul>
    </li>
    <li>
        <a href="#webhooks">Webhooks</a>
        <ul>
        <li><a href="#order-related-webhooksactions">Order Related Webhooks/Actions</a></li>
            <li><a href="#product-related-webhooksactions">Product Related Webhooks/Actions</a></li>
            <li><a href="#shipping-companies-related-webhooksactions">Shipping Companies Related Webhooks/Actions</a></li>
            <li><a href="#customer-related-webhooksactions">Customer Related Webhooks/Actions</a></li>
            <li><a href="#category-related-webhooksactions">Category Related Webhooks/Actions</a></li>
            <li><a href="#brand-related-webhooksactions">Brand Related Webhooks/Actions</a></li>
            <li><a href="#store-related-webhooksactions">Store Related Webhooks/Actions</a></li>
            <li><a href="#cart-related-webhooksactions">Cart Related Webhooks/Actions</a></li>
            <li><a href="#special-offer-webhooksactions">Special Offer Related Webhooks/Actions</a></li>
            <li><a href="#miscellaneous-related-webhooksactions">Miscellaneous Related Webhooks/Actions</a></li>
      </ul>
    </li>
    <li><a href="#support">Support</a></li>  
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

<!-- Overview -->
## Overview
This is a starter App includes a Laravel application equipped with the required auth processes and webhooks/actions that help you to create your Salla App which works with the [Salla APIs](https://docs.salla.dev/). Your App later can be published to the [Salla App Store](https://apps.salla.sa/) and be available for installation to any of Salla [Merchants Stores](https://s.salla.sa/).

What can you use this starter App for?
* Create a Salla App from scratch, e.g. chatbot app or shipping service app, or any amazing app from your idea.
* Modify/Customize any of your previous Apps in order to take the advantages given by this starter App.
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

The starter App comes with an easy installation steps that do the complete setup for your starter App. To be ready, you will need some prerequisites which will be listed hereafter.

### Prerequisites

Before proceeding with the installation, make sure you have the following prerequisites installed on your system:
- For Laravel compatibility: PHP >= 8.1, composer package manager, and MySql database.

- Dependency Managers: [Node.js](https://nodejs.org/en) and [Composer](https://getcomposer.org/)
- Web Server, PHP (>= 8.1), and MySQL

- Create a Partner account at  [Salla Partner Portal](https://salla.partners/). 
- Create a Salla App in your Partner account at  [Salla Partner Portal](https://salla.partners/). This is to get the `client-id` and `client-secret`. 
  

That is all!

### Installation
The installation process is straightforward as you will see in the below steps.

1. Clone this [Repo](https://github.com/SallaApp/laravel-starter-kit) to your own localhost.
2. Install Dependencies: `npm install` and `composer install`
3. Generate an Application Key: `php artisan key:generate`
4. In your MySql Database: **create a database** with any name for example `laravel`.
5. Update the [`.env`](https://github.com/SallaApp/laravel-starter-kit/blob/master/.env) file.


<!-- 3. [Salla CLI](https://github.com/SallaApp/Salla-CLI): to run the `salla` binary commands such as `salla app create` and `salla app create-webhook <event.name>` -->

<!-- > The step will ask you to select the authorization mode for your App, which can be [Easy or Custom mode.](#auth-modes)
> In case you selected the _Custom_ mode for your App authorization, you will need to enter the **same callback Url you already entered in your App dashboard at the [Salla Partner Portal](https://salla.partners/)** -->

<p align="right">(<a href="#top">back to top</a>)</p>

## Usage

First you need to create your App in [Salla Partner Portal](https://salla.partners/). This is to get the `client-id` and `client-secret`. For thatm you may use the [Salla CLI](https://github.com/SallaApp/Salla-CLI). 

**Run** the following command to create your App and follow on-screen instructions.: 

```salla app create``` 

![Salla App Create Command](https://i.ibb.co/92tKgZz/Clean-Shot-2021-12-27-at-21-31-15.gif)


<p align="right">(<a href="#top">back to top</a>)</p>

__Important Note:__
> If you are using [Easy mode.](#auth-modes.easy) the access token will push to the action ([`app.store.authorize`](app\template\Actions\app\store.authorize.js)) via webhook


#### Output URLs <span id='output-urls'>

| URL                | Description                                                                                                              |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| Local App Url      | The local link for your App\.                                                                                            |
| Remote App Url     | The online link to your App\. It will be always synced with the local Url                                                |
| Webhook Url        | The Url link that connects your App with any action that may happen at the Merchant store, e\.g\. \ncreate new product\. |
| OAuth Callback Url | The App entry page where the access token is generated; Note that this Url is available only for the `Custom` mode auth. |

<p align="right">(<a href="#top">back to top</a>)</p>



## Configure Authorization Modes <span id='auth-modes'>

While creating your App in the [Salla Partners Portal](https://salla.partners/), you will see that Salla provids two methods for the OAuth protocol, which are the `Easy Mode` and the `Custom Mode`.
    
> During the setup process, the default _OAuth protocol_ will be set to the `Easy Mode`, which can be configured from the file [`.env`](.env).
> All of the setup's values/keys are stored in the `.env` file as we can see in the below image.

<p align="center"><img src="https://i.imgur.com/TvSCAWC.png" width="660" alt="Salla Laravel App folder structure"></p>

#### Easy Mode <span id='auth-modes.easy'>
    
This mode is the default mode for the authorization, which means that the `access token` is generated automatically at Salla's side back to you.
You may refer to the class [`StoreAuthorize`](app/Actions/App/StoreAuthorize.php#L18) which is defined inside [`app\Actions\App\StoreAuthorize.php`](app/Actions/App/StoreAuthorize.php) to get more details on how to receive and manage the `access token`


    
#### Custom Mode <span id='auth-modes.custom'>
    
A callback Url is the Url that is triggered when the App has been granted authorization. This should be a valid Url to which the merchant's browser is redirected. In this mode, you will need to set a custom callback url from the App dashboard at the [Salla Partner Portal](https://salla.partners/). This callback url will redirect the merchants who are interested in using your app into your App entry page where the access token is generated. Moreover, using the Salla CLI command `salla app serve`, your callback url will be automatically updated. 

You may refere to file [`app/Http/Controllers/OAuthController.php`](app/Http/Controllers/OAuthController.php) which contains the [`callback()`](app/Http/Controllers/OAuthController.php#L26) function. This function is responsible for generating the `access token`

> The custom url will redirect the merchant to the [Store Dashboard](https://s.salla.sa/apps) in order to access the Store where he needs your App to be installed.

<p align="right">(<a href="#top">back to top</a>)</p>

## Authorization Service
    
This project comes with a simple singleton authorization service to help you with managing the access and refresh tokens
    
```php
// set the current user or any user you want to use his access tokens
app('salla.auth')->forUser(auth()->user());

// Get the get the store details
/** Salla\OAuth2\Client\Provider\SallaUser::class **/
app('salla.auth')->getResourceOwner();

// Made an API request using the current access token of the user
app('salla.auth')->request('GET', 'https://api.salla.dev/admin/v2/products')['data'];
    
// Request a new access token
app('salla.auth')->getNewAccessToken();

// Save the access token
auth()->user()->token()->create([
    'merchant'      => 'id',
    'access_token'  => 'access token',
    'expires_in'    => 'expires in sec',
    'refresh_token' => 'refresh token'
]);
```

### Refreshing a Token

Access tokens expire after two weeks. Once expired, you will have to refresh a user’s access token. you can easily request a new access token via the current refresh token for any user like this

```php
try {
    // set the current user
    // or any user you want to refresh his access token
    app('salla.auth')
        ->forUser(auth()->user())
        ->getNewAccessToken();
    
    // by default the function `getNewAccessToken` will get a new access token 
    // and save the new access token to the same user you are set it in the `forUser` function
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $exception) {
    // in case the token access token & refresh token is expired
    // you should redirect the user again to Salla authorization service to get a new token
    // return redirect()->route('oauth.redirect');
}
```
<br />

<!-- ## Examples

TBD -->
    
<!-- Webhooks -->

<p align="right">(<a href="#top">back to top</a>)</p>

## Webhooks
[Webhooks](https://docs.salla.dev/docs/merchant/ZG9jOjI0NTE3NDg1-webhook) simplify the communication between your App and [Salla APIs](https://docs.salla.dev/). In this way, you will be notified whenever your app receives payload/data from the Salla APIs. These webhooks are triggered along with many actions such as an order or product being created, a customer logs in, a coupon is applied, and much more.

### Create new Webhook/Action command
Salla already defined a list of the webhooks/actions that are triggered automatically. The predefined webhooks/actions can be found in the folder [`app/Actions`](https://github.com/SallaApp/Laravel-Start-Kit/tree/master/app/Actions).

Run the following command to create your webhook event:

```bash
salla app create-webhook <event.name>
```

![Salla App Create-Webhook Command](https://i.ibb.co/yBstbgx/Clean-Shot-2021-12-27-at-16-16-47.gif)

<hr>

You may find the supported [Webhook events](https://docs.salla.dev/docs/merchant/ZG9jOjI0NTE3NDg1-webhook#list-of-events) as follows:

#### Order Related Webhooks/Actions

| ** Action Name **                                                               | ** Description **                                                            |
| ------------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| [order.created](app/Actions/Order/Created.php)                                   | This indicates a singular order has been created                             |
| [order.updated](app/Actions/Order/Updated.php)                                   | Details, data and/or content of a specific order have been refreshed updated |
| [order.status.updated](app/Actions/Order/StatusUpdated.php)                      | Whenever there is an order status update, this is triggered                  |
| [order.cancelled](app/Actions/Order/Cancelled.php)                               | This happens when an order is cancelled                                      |
| [order.refunded](app/Actions/Order/Refunded.php)                                 | The refund action to refund the whole order is triggered.                    |
| [order.deleted](app/Actions/Order/Deleted.php)                                   | This indicates an order has been deleted                                     |
| [order.products.updated](app/Actions/Order/ProductsUpdated.php)                  | Order products is updated                                                    |
| [order.payment.updated](app/Actions/Order/PaymentUpdated.php)                    | A payment method has been updated                                            |
| [order.coupon.updated](app/Actions/Order/CouponUpdated.php)                      | This is triggered whenever a Coupon is updated                               |
| [order.total.price.updated](app/Actions/Order/TotalPriceUpdated.php)             | A total price of an order has been updated                                   |
| [order.shipment.creating](app/Actions/Order/ShipmentCreating.php)                | This indicates a new shipment is being created                               |
| [order.shipment.created](app/Actions/Order/ShipmentCreated.php)                  | This indicates a new shipment has been created                               |
| [order.shipment.cancelled](app/Actions/Order/ShipmentCancelled.php)              | This indicates a an order shipment has been cancelled                        |
| [order.shipment.return.creating](app/Actions/Order/ShipmentReturnCreating.php)   | This is triggered when a returned order shipment is being created            |
| [order.shipment.return.created](app/Actions/Order/ShipmentReturnCreated.php)     | This is triggered when a returned order shipment has been created            |
| [order.shipment.return.cancelled](app/Actions/Order/ShipmentReturnCancelled.php) | This is triggered when a returned order shipment has been cancelled          |
| [order.shipping.address.updated](app/Actions/Order/ShippingAddressUpdated.php)   | Occurs when an Order shipping address is updated                             |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Product Related Webhooks/Actions

| ** Action Name **                                          | ** Description **                                                                    |
| ---------------------------------------------------------- | ------------------------------------------------------------------------------------ |
| [product.created](app/Actions/Product/Created.php)          | A new product is created. Payload of the new product are to accompanying the product |
| [product.updated](app/Actions/Product/Updated.php)          | Add/Modify details of a product                                                      |
| [product.deleted](app/Actions/Product/Deleted.php)          | Delete a product along with all its variants and images                              |
| [product.available](app/Actions/Product/Available.php)      | Flags a product as stock available                                                   |
| [product.quantity.low](app/Actions/Product/QuantityLow.php) | Shows warnings whenever a stock is of low quantity                                   |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Shipping Companies Related Webhooks/Actions

| ** Action Name **        | ** Description **                                                                     |
| ------------------------ | ------------------------------------------------------------------------------------- |
| [shipping.zone.created](app/Actions/Shipping/ZoneCreated.php)    | This is triggered when a shipping zone has been created for a custom shipping company |
| [shipping.zone.updated](app/Actions/Shipping/ZoneUpdated.php)    | This is triggered when a shipping zone has been updated for a custom shipping company |
| [shipping.company.created](app/Actions/Shipping/CompanyCreated.php) | This is triggered when a custom shipping company has been created                  |
| [shipping.company.updated](app/Actions/Shipping/CompanyUpdated.php) | This is triggered when a custom shipping company has been updated                  |
| [shipping.company.deleted](app/Actions/Shipping/CompanyDeleted.php) | This is triggered when a custom shipping company has been deleted                  |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Customer Related Webhooks/Actions

| ** Action Name **                                          | ** Description **                        |
| ---------------------------------------------------------- | ---------------------------------------- |
| [customer.created](app/Actions/Customer/Created.php)        | Create a new customer record             |
| [customer.updated](app/Actions/Customer/Updated.php)        | Update details for a customer            |
| [customer.login](app/Actions/Customer/Login.php)            | Triggered whenever a customer log in     |
| [customer.otp.request](app/Actions/Customer/OtpRequest.php) | One-Time Password request for a customer |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Category Related Webhooks/Actions

| ** Action Name **                                   | ** Description **                                   |
| --------------------------------------------------- | --------------------------------------------------- |
| [category.created](app/Actions/Category/Created.php) | Creates a new category for products to be put under |
| [category.updated](app/Actions/Category/Updated.php) | Add new or reform existing category details         |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Brand Related Webhooks/Actions

| ** Action Name **                             | ** Description **                                                                    |
| --------------------------------------------- | ------------------------------------------------------------------------------------ |
| [brand.created](app/Actions/Brand/Created.php) | Creates a new Brand.                                                                 |
| [brand.updated](app/Actions/Brand/Updated.php) | Triggered when Information about a sepcific Brand is updated/refurbished/streamlined |
| [brand.deleted](app/Actions/Brand/Deleted.php) | An existing brand is then deleted and removed from a store                           |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Store Related Webhooks/Actions

| ** Action Name **                                                | ** Description **                  |
| ---------------------------------------------------------------- | ---------------------------------- |
| [store.branch.created](app/Actions/Store/BranchCreated.php)       | Creates a new store.               |
| [store.branch.updated](app/Actions/Store/BranchUpdated.php)       | Updates an existing branch         |
| [store.branch.setDefault](app/Actions/Store/BranchSetDefault.php) | Sets for default a specific branch |
| [store.branch.activated](app/Actions/Store/BranchActivated.php)   | Activates a disabled branch        |
| [store.branch.deleted](app/Actions/Store/BranchDeleted.php)       | Deletes a branch                   |
| [storetax.created](app/Actions/Store/TaxCreated.php)              | Creats a new Store Tax             |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Cart Related Webhooks/Actions

| ** Action Name **                                            | ** Description **                               |
| ------------------------------------------------------------ | ----------------------------------------------- |
| [abandoned.cart](app/Actions/Miscellaneous/AbandonedCart.php) | Outputs a list of abandoned carts               |
| [coupon.applied](app/Actions/Miscellaneous/CouponApplied.php) | Creates a discount code in the form of a coupon |
| [abandoned.cart](app/Actions/Cart/AbandonedCart.php) | Outputs a list of abandoned carts                       |
| [coupon.applied](app/Actions/Cart/CouponApplied.php) | Creates a discount code in the form of a coupon         |

<p align="right">(<a href="#top">back to top</a>)</p>

#### Special Offer Related Webhooks/Actions

| ** Action Name **                                                        | ** Description **           |
| ------------------------------------------------------------------------ | --------------------------- |
| [specialoffer.created](app/Actions/Miscellaneous/SpecialofferCreated.php) | Creates a new special offer |
| [specialoffer.updated](app/Actions/Miscellaneous/SpecialofferUpdated.php) | Updates a special offer     |
| [specialoffer.created](app/Actions/Specialoffer/SpecialofferCreated.php) | Creates a new special offer |
| [specialoffer.updated](app/Actions/Specialoffer/SpecialofferUpdated.php) | Updates a special offer     |


<p align="right">(<a href="#top">back to top</a>)</p>

#### Miscellaneous Related Webhooks/Actions

| ** Action Name **                                        | ** Description **               |
| -------------------------------------------------------- | ------------------------------- |
| [review.added](app/Actions/Miscellaneous/ReviewAdded.php) | A product review has been added |

<p align="right">(<a href="#top">back to top</a>)</p>

## Support

The team is always here to help you. Happen to face an issue? Want to report a bug? You can submit one here on Github using the [Issue Tracker](https://github.com/SallaApp/Salla-CLI/issues/new). If you still have any questions, please contact us via the [Telegram Bot](https://t.me/SallaSupportBot) or join in the Global Developer Community on [Telegram](https://t.me/salladev).
    
<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create.
Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request.
You can also simply open an issue with the tag "enhancement". Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>

## Security

If you discover any security-related issues, please email security@salla.sa instead of using the issue tracker.

## Credits

- [Salla](https://github.com/sallaApp)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

<p align="right">(<a href="#top">back to top</a>)</p>

