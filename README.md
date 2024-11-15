## Preface
This is an REST api based application built on top of Slim microframework
that constitutes the entry point to sample core domain which holds all the business 
policies and processes that will be served as a service fleshed out in the API 
application.

## Installation

```bash
cd path/to/application
composer install
php ./vendor/bin/doctrine-migrations migrations:migrate
```

## Run Application on Local Environment

```bash
cd path/to/application
php -S localhost:8000
```

## High Level Policies

## Use Cases

A use case is a Domain scenario that expects a System to fulfill specific business goal a specific actor needs hence its interaction with the system.
It has pre-conditions, post-conditions, business rules and process flow(normal whichalternate).
Basically a Use Case represents a request to system by an actor where the system itself responds to such request based on business policies.
A high level system is built upon Use Cases for the sake of granularity and separation of concerns principle.

#### Example of Use Case

An example of a Use Case could be:

- Get Owner properties.
- Create new Property.

### Low Level Detail Grounds

We're to implement a Use Case based approach.

## Build and Test
TODO: Describe and show how to build your code and run the tests.

