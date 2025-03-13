# Personal Expenses Management Tool

A web application built with Laravel to track and manage personal expenses and incomes. The application allows users to filter their expenses and incomes by year, category, or both, and view their total balance. Additional features include a Piggy Bank for automated savings and email notifications for high expenses.

## Features

-   **User Authentication**: User registration, login, and logout functionality.
-   **Income Management**: Track and manage incomes with year-based filtering and total income view.
-   **Expense Management**: Track and manage expenses with filtering by year and category.
-   **Dashboard**: Displays filtered income, expense, and balance information for authenticated users, and a basic version for unauthenticated users.
-   **Expense Limit Based on Income**: Prevent users from adding an expense that would exceed their available income.
-   **Piggy Bank Savings with Expense Deduction and Balance Management**: When creating a new expense, users can opt to save a percentage (1%, 5%, or 10%) of the expense amount.
-   **Email Notification for Expenses Exceeding $1000**: Notify users via email when an expense exceeds $1,000.

## Setup

-   **Clone the repository**: https://github.com/bokhuuu/personal-expenses-management-tool
-   **Install dependencies**: composer install
-   **Run migrations and seed the database**: php artisan migrate:fresh --seed
-   **Start the application**: php artisan serve

**Note:** This application is configured to use [Mailtrap](https://mailtrap.io) for email testing in development.
