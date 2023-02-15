# Laravel Log Service

## Introduction

This service helps you to import your logs into the database using commands, and filter them with different queries.

## Problem Description:

Problem 1: We have a very large file that we need to parse and import into the database.

solution :
First, we create a command (log:import), then read it line by line, fetch the required items from each line and enter it into the database.
In order not to face the problem of memory leak, we use lazicollection
which helps us to divide the data into smaller parts and enter the database.

The second problem: we need an endpoint that filters the data with the parameters it receives and displays their sum.

solution :
We create a controller and refer the received parameters to the log service for filtering and get the total.

Notes :

-   Strategy and factory design patterns are used to read and parse the file.
-   Inversion dependence has been observed in the classes.
-   Test writing has been done for endpoint and command.
-   The project is Dockerized and you can launch it with docker-compose.
