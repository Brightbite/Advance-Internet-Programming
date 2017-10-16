# Advance-Internet-Programming Project Spring 2017
- Kunanon Pititheerachot 12634123 - Retail App

# Installation and Configuration

  1. Clone or Download the repository
  2. Create your own database and put database credential in application/config/database.php
  3. Set up your base URL or website domain in application/config/config.php

# Running Retail Web App

  1. Make sure you have properly database and base URL configuration for your own website.
  2. Upload all your files including your configuration files up to the cloud service via FTP or Github.
  3. Check your web service with URL you put in configuration.

# API

Retail web app API you could creating an account and accessing to your user data or delete via a RESTful API.

create account
https://kunanonapi.000webhostapp.com/create

which is I already put an example in this project you can test it by access through route (your web url)/api/create

delete account
which is I already put an example in this project you can test it by access through route (your web url)/api/delete=(user ID that you want to delete)

read userlist
which is I already put an example in this project you can test it by access through route (your web url)/api/read

OR

you can use these RESTful API with your own application.


# Files naming

  1. Controllers files are using 'c' following by name such as cHome.php, cRegister.php, cLogin.php, etc.
  2. Models files are using 'm' following by model name such as mProduct.php, mCart.php, mUser.php, etc.
  3. Views files are using 'v' following by view name such as vHome.php, vMyaccount.php, vUser.php, etc.


# Key Principles

* DRY - Don’t repeat yourself
* Abstraction Principle
* KISS (Keep it simple, stupid!)
* Avoid Creating a YAGNI (You aren’t going to need it)
* Do the simplest thing that could possibly work
* Don’t make me think
* Open/Closed Principle
* Single Responsibility Principle
* Maximize Cohesion
* Avoid Premature Optimization
*	Code Reuse is Good
*	Separation of Concerns
* Law of Demeter
* Write Code for the Maintainer 
* Principle of least astonishment

###
