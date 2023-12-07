<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="https://i.imgur.com/6wj0hh6.jpg" alt="Project logo"></a>
</p>

<h3 align="center">E-Commerce App</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)]
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> Simple ecommerce application which allows you to create products, user roles and permissions defines, add to cart and finlly place an order.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Feature](#featue)
- [Getting Started](#getting_started)
- [Prerequisites](#prerequisites)
- [Installing](#installing)
- [Usage](#usage)
- [Deployment](#deployment)
- [Acknowledgments](#acknowledgments)
- [Authors](#authors)
- [License](#license)

## 🧐 About <a name = "about"></a>

This is a Laravel-based eCommerce application with features such as product listing, shopping cart functionality, and order processing. The application uses Redis for efficient and fast cart management and PostgreSQL as the database for storing product and order information.

## Feature <a name = "feature"></a>

1. User authentication and authorization
2. Product listing and details
3. Shopping cart with Redis for quick and scalable cart management
4. Order processing and history
5. PostgreSQL database for data storage

## 🏁 Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.

### Prerequisites <a name = "prerequisites"></a>

Make sure you have the following installed on your system:

  - Git is installed.
  - Docker is installed and running
  - Docker compose (Ubuntu) or Desktop Docker (Windows) is installed


### Installing <a name = "installing"></a>

A step by step series of examples that tell you how to get a development env running.

Clone the repository
```
   git clone git@github.com:icelimon/laravel-ecommerce.git
```

Change directory
```
   cd laravel-ecommerce
```

Copy environment
```
   cp .env.example .env
```

Generate key
```
  ./vendor/bin/sail artisan key:generate
```

Run database migrations and seed data:
```
   ./vendor/bin/sail artisan migrate --seed
```

Start the Laravel Sail development environment:
```
   ./vendor/bin/sail up -d
```


End with an example of getting some data out of the system or using it for a little demo.



## 🎈 Usage <a name="usage"></a>
  Add notes about how to use the system.
  
<p>
  Open VS Code then search and isntall the extension "Rest Client"
  <br>
  All API endpoint has been placed inside rest folder 
<p>




## 🚀 Deployment <a name = "deployment"></a>

Add additional notes about how to deploy this on a live system.

## Acknowledgments <a name = "acknowledgments"></a>

- [Laravel](https://laravel.com/) - Framework
- [Redis](https://redis.io/) - Cache Database
- [PostgreSQL](https://www.postgresql.org/) - Database


## ✍️ Authors <a name = "authors"></a>

- [@icelimon](https://github.com/icelimon) - Idea & Initial work
- Email: icelimon.pro@gmail.com
- GitHub: https://github.com/icelimon

## 🎉 License <a name = "license"></a>

This Laravel eCommerce App is open-sourced software licensed under the MIT license.
