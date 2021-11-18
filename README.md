<div id="top"></div>

<!-- PROJECT SHIELDS -->
[![GitHub forks](https://img.shields.io/github/forks/SallaApp/Laravel-Start-Kit?style=flat-square)](https://github.com/SallaApp/Laravel-Start-Kit/network)
[![GitHub stars](https://img.shields.io/github/stars/SallaApp/Laravel-Start-Kit?style=flat-square)](https://github.com/SallaApp/Laravel-Start-Kit/stargazers)
[![GitHub issues](https://img.shields.io/github/issues/SallaApp/Laravel-Start-Kit?style=flat-square)](https://github.com/SallaApp/Laravel-Start-Kit/issues)
[![GitHub license](https://img.shields.io/github/license/SallaApp/Laravel-Start-Kit?style=flat-square)](https://github.com/SallaApp/Laravel-Start-Kit)
[![Twitter](https://img.shields.io/twitter/url?style=social&url=https%3A%2F%2Ftwitter.com%2Fsallapartners)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FSallaApp%2FLaravel-Start-Kit)

<br />
<div align="center"> 
  <a href="https://salla.dev"> 
    <img src="https://salla.dev/wp-content/themes/salla-portal/dist/img/salla-logo.svg" alt="Logo" width="80" height="80"> 
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
        <li>
            <a href="#configure-authorization-modes-">Configure Authorization Modes</a>
            <ul>
                <li><a href="#easy-mode">Easy Mode</a></li>
                <li><a href="#custom-mode">Custom Mode</a></li>
            </ul>
        </li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li>
        <a href="#webhooks">Webhooks</a>
        <ul>
            <li><a href="#order-related-webhooksactions">Order Related Webhooks/Actions</a></li>
            <li><a href="##products-related-webhooksactions">Products Related Webhooks/Actions</a></li>
            <li><a href="#customer-related-webhooksactions">Customer Related Webhooks/Actions</a></li>
            <li><a href="#category-related-webhooksactions">Category Related Webhooks/Actions</a></li>
            <li><a href="#brand-related-webhooksactions">Brand Related Webhooks/Actions</a></li>
            <li><a href="#store-related-webhooksactions">Store Related Webhooks/Actions</a></li>
            <li><a href="#coupon-related-webhooksactions">Coupon Related Webhooks/Actions</a></li>
      </ul>
    </li>
    <li>
        <a href="#commands">Commands</a>
        <ul>
            <li><a href="#setup-command">Setup command</a></li>
            <li><a href="#create-new-webhookaction-command">Create new Webhook/Action command</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- Overview -->
## Overview
This is a starter App includes a Laravel application equipped with the required auth processes and webhooks/actions that help you to create your Salla App which works with the [Salla APIs](https://docs.salla.dev/). Your App later can be published to the [Salla App Store](https://apps.salla.sa/) and be available for installation to any of Salla [Merchants Stores](https://s.salla.sa/).

What can you use this starter App for?
* Create a Salla App from scratch, e.g. chatbot app or shipping service app or any amazing app from your idea.
* Modify/Customize any of your previous Apps in order to take the advantages given by this starter App.
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

The starter App comes with an easy _1-command step_ that does the complete setup for your starter App. To be ready, you will need some prerequisites which will be listed hereafter.

### Prerequisites
-   Create a Partner account at  [Salla Partner Portal](https://salla.partners/)
-   Create your App in [Salla Partner Portal](https://salla.dev/blog/create-your-first-app-on-salla-developer-portal/)

    > From your App dashbaord at [Salla Partner Portal](https://salla.partners/), you will be able to get your App's _Client ID, Client Secret Key and Webhook Secret Key_ which you will use later duraing the setup process.

-   For Laravel compatibility: `PHP >= 7.4, Composer package manager and MySql Database`
-   Install [ngrok](https://www.npmjs.com/package/ngrok): `npm install ngrok -g`
-   Other requirments: `Nodejs and npm`

That is all!

### Installation
The installation process is straightforward as you will see in the below steps.

1. In your MySql Database: **create a database** with any name for example  `laravel`.

2.  In your command line: **run** the following `create-project` composer command to create your Laravel starter App project.
```sh
composer create-project salla/laravel-start-kit {your-awesome-app}
```

The above `create-project` will take you through a step-by-step process in which you'll enter your App's _Client ID, Client Secret Key, and Webhook Secret Key_, which you can get from your App dashboard in the Partners Panel, as well as your database name, which is set to `laravel` by default.

> The step will ask you to select the authorization mode for your App, which can be [Easy or Custom mode.](#auth-modes)
> In case you selected the _Custom_ mode for your App authorization, you will need to the enter the **same callback Url you already entered in your App dashboard at the [Salla Partner Portal](https://salla.partners/)**


3. **Last step**: in your command line: **run** `php artisan serve.remote` command

![8HPj07id-2021-11-19 at 00 15 37](https://user-images.githubusercontent.com/10876587/142498178-73e13f33-8f2a-401c-b7b0-7278e282be57.gif)

Now you can open your broswer to view your App at `Remote App Url` in the output URLs.  🎉


| URL               | Description                                                                                                              |
|------------------|-----------------------------------------------------------------------------------------------------------------|
| Local App Url      | The local link for your App\.                                                                                     |
| Remote App Url     | The online link to your App\. It will be always synced with the local Url                                         |
| Webhook Url        | The Url link that connects your App with any action may happen at the Merchant store, e\.g\. create new product\. |
| OAuth Callback Url | The App entry page where the access token generated                                                               |


<p align="right">(<a href="#top">back to top</a>)</p>

### Configure Authorization Modes <span id='auth-modes'>

While creating your App in the [Salla Partners Portal](https://salla.partners/), you will see that Salla provids two methods for the OAuth protocol, which are the `Easy Mode` and the `Custom Mode`.
    
> During the setup process, the default _OAuth protocol_ will be set to the `Easy Mode`, which can be configured from the file [`.env`](.env).
> All of the setup's values/keys are stored in the `.env` file as we can see in the below image.

<p align="center"><img src="https://i.imgur.com/TvSCAWC.png" width="660" alt="Salla Laravel App folder structure"></p>

#### Easy Mode:
    
This mode is the default mode for the authorization, which means that the `access token` is generated automatically at Salla's side back to you.
You may refere to the class [`StoreAuthorize`](app/Actions/App/StoreAuthorize.php#L18) which is defined inside [`app\Actions\App\StoreAuthorize.php`](app/Actions/App/StoreAuthorize.php) to get more detailes on how to receive and manage the `access token`

    
#### Custom Mode:
    
A callback Url is the Url that is triggered when the App has been granted authorization. This should be a valid Url to which the merchant's browser is redirected. In this mode, you will need to set a custom callback url from the App dashboard at the [Salla Partner Portal](https://salla.partners/). This callback url will redirect the merchants who are interested in using your app into your App entry page where the access token generated.

You may refere to file [`app/Http/Controllers/OAuthController.php`](app/Http/Controllers/OAuthController.php) which contains the [`callback()`](app/Http/Controllers/OAuthController.php#L26) function. This function is responsiable for generating the `access token`

> The custom url will redirect the merchant to the [Store Dashboard](https://s.salla.sa/apps) in order to access the Store where he needs your App to be installed.

TODO
- Token refresh().

## Usage

- Upon installation, your Laravel App home page will be available at http://127.0.0.1:8000. You need to start with doing _Login_.
- Login to the Laravel App with the demo account:
  >  Email:  `awesome@salla.dev`
  >  Password:  `in ksa`
- Click the button to request the _Access Token_.
- The Laravel App will redirect you to Merchent Auth Page.
- Login using a Merchent Account.
- Give the access to your Demo App.
- The browser will redirect your again to Laravel App.
- Setup the callback url on Salla Partner Portal to http://127.0.0.1:8000/oauth/callback

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- Webhooks -->
## Webhooks
[Webhooks](https://docs.salla.dev/docs/merchant/ZG9jOjI0NTE3NDg1-webhook) simplify the communicate between your App and [Salla APIs](https://docs.salla.dev/). In this way, you will to be notified whenever your app receives payload/data from the Salla APIs. These webhooks are triggered along with many actions such us an order or product is created, a customer logs in, a coupon is applied, and much more.

Salla already defined a list of the webhooks/actions that are triggered automatically. The predefined webhooks/actions can be found in folder [`app/Actions`](https://github.com/SallaApp/Laravel-Start-Kit/tree/master/app/Actions).

### Order Related Webhooks/Actions

| ** Action Name **                                                                 | ** Description **                                                              |
|-----------------------------------------------------------------------------------|--------------------------------------------------------------------------------|
| [order.created](app/Actions/Order/Created.php)                                    | This indicates a singular order has been created                               |
| [order.updated](app/Actions/Order/Updated.php)                                    | Details, data and/or content of a specific order have been refreshed updated   |
| [order.status.updated](app/Actions/Order/StatusUpdated.php)                       | Whenever there is an order status update, this is triggered                    |
| [order.cancelled](app/Actions/Order/Cancelled.php)                                | This happens when an order is cancelled                                        |
| [order.refunded](app/Actions/Order/Refunded.php)                                  | The refund action to refund the whole order is triggered.                      |
| [order.deleted](app/Actions/Order/)                                               | This indicates an order has been deleted                                       |
| [order.products.updated](app/Actions/Order/ProductsUpdated.php)                   | Order products is updated                                                      |
| [order.payment.updated](app/Actions/Order/PaymentUpdated.php)                     | A payment method has been updated                                              |
| [order.coupon.updated](app/Actions/Order/CouponUpdated.php)                       | This is triggered whenever a Coupon is updated                                 |
| [order.total.price.updated](app/Actions/Order/TotalPriceUpdated.php)              | A total price of an order has been updated                                     |
| [order.shipment.creating](app/Actions/Order/ShipmentCreating.php)                 | This indicates a new shipment is being created                                 |
| [order.shipment.created](app/Actions/Order/ShipmentCreated.php)                   | This indicates a new shipment has been created                                 |
| [order.shipment.cancelled](app/Actions/Order/ShipmentCancelled.php)               | This indicates a an order shipment has been cancelled                          |
| [order.shipment.return.creating](app/Actions/Order/ShipmentReturnCreating.php)    | This is triggered when a returned order shipment is being created              |
| [order.shipment.return.created](app/Actions/Order/ShipmentReturnCreated.php)      | This is triggered when a returned order shipment has been created              |
| [order.shipment.return.cancelled](app/Actions/Order/ShipmentReturnCancelled.php)  | This is triggered when a returned order shipment has been cancelled            |
| [order.shipping.address.updated](app/Actions/Order/ShippingAddressUpdated.php)    | Occurs when an Order shipping address is updated                               |


<p align="right">(<a href="#top">back to top</a>)</p>

### Products Related Webhooks/Actions

| ** Action Name **                                            | ** Description **                                                                     |
|--------------------------------------------------------------|---------------------------------------------------------------------------------------|
| [product.created](app/Actions/Product/Created.php)           | A new product is created. Payload of the new product are to accompanying the product  |
| [product.updated](app/Actions/Product/Updated.php)           | Add/Modify details of a product                                                       |
| [product.deleted](app/Actions/Product/Deleted.php)           | Delete a product along with all its variants and images                               |
| [product.available](app/Actions/Product/Available.php)       | Flags a product as stock available                                                    |
| [product.quantity.low](app/Actions/Product/QuantityLow.php)  | Shows warnings whenever a stock is of low quantity                                    |

<p align="right">(<a href="#top">back to top</a>)</p>

### Customer Related Webhooks/Actions

| ** Action Name **                                            | ** Description **                         |
|--------------------------------------------------------------|-------------------------------------------|
| [customer.created](app/Actions/Customer/Created.php)         | Create a new customer record              |
| [customer.updated](app/Actions/Customer/Updated.php)         | Update details for a customer             |
| [customer.login](app/Actions/Customer/Login.php)             | Triggered whenever a customer log in      |
| [customer.otp.request](app/Actions/Customer/OtpRequest.php)  | One-Time Password request for a customer  |

<p align="right">(<a href="#top">back to top</a>)</p>

### Category Related Webhooks/Actions


| ** Action Name **                                     | ** Description **                                     |
|-------------------------------------------------------|-------------------------------------------------------|
| [category.created](app/Actions/Category/Created.php)  | Creates a new category for products to be put under   |
| [category.updated](app/Actions/Category/Updated.php)  | Add new or reform existing category details           |

<p align="right">(<a href="#top">back to top</a>)</p>

### Brand Related Webhooks/Actions

| ** Action Name **                               | ** Description **                                                                      |
|-------------------------------------------------|----------------------------------------------------------------------------------------|
| [brand.created](app/Actions/Brand/Created.php)  | Creates a new Brand.                                                                   |
| [brand.updated](app/Actions/Brand/Updated.php)  | Triggered when Information about a sepcific Brand is updated/refurbished/streamlined   |
| [brand.deleted](app/Actions/Brand/Deleted.php)  | An existing brand is then deleted and removed from a store                             |

<p align="right">(<a href="#top">back to top</a>)</p>

### Store Related Webhooks/Actions

| ** Action Name **                                                  | ** Description **                    |
|--------------------------------------------------------------------|--------------------------------------|
| [store.branch.created](app/Actions/Store/BranchCreated.php)        | Creates a new store.                 |
| [store.branch.updated](app/Actions/Store/BranchUpdated.php)        | Updates an existing branch           |
| [store.branch.setDefault](app/Actions/Store/BranchSetDefault.php)  | Sets for default a specific branch   |
| [store.branch.activated](app/Actions/Store/BranchActivated.php)    | Activates a disabled branch          |
| [store.branch.deleted](app/Actions/Store/BranchDeleted.php)        | Deletes a branch                     |
| [storetax.created](app/Actions/Store/TaxCreated.php)               | Creats a new Store Tax               |

<p align="right">(<a href="#top">back to top</a>)</p>

### Coupon Related Webhooks/Actions

| ** Action Name **                                                          | ** Description **                                 |
|----------------------------------------------------------------------------|---------------------------------------------------|
| [coupon.applied](app/Actions/Miscellaneous/CouponApplied.php)              | Creates a discount code in the form of a coupon   |
| [review.added](app/Actions/Miscellaneous/ReviewAdded.php)                  | A product review has been added                   |
| [abandoned.cart](app/Actions/Miscellaneous/AbandonedCart.php)              | Outputs a list of abandoned carts                 |
| [specialoffer.created](app/Actions/Miscellaneous/SpecialofferCreated.php)  | Creates a new special offer                       |
| [specialoffer.updated](app/Actions/Miscellaneous/SpecialofferUpdated.php)  | Updates a special offer                           |

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- COMMANDS -->
## Commands
### Setup command
The setup file can be found in [`app/Console/Commands/Setup.php`](https://github.com/SallaApp/Laravel-Start-Kit/blob/ffbed5807075e8da28dd445049ea3aaadf688c1a/app/Console/Commands/Setup.php).

```sh
php artisan setup
```

### Create new Webhook/Action command
The predefined [Webhooks](#webhooks), events/actions, can be found in folder [`app/Actions`](https://github.com/SallaApp/Laravel-Start-Kit/tree/master/app/Actions).
> You may define your own new webhook/action the way fits your App's requirments.
```sh
php artisan make:webhook.event {event-name}
```

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

