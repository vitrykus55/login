
---

# User Registration and Login System

## Overview

This project implements a basic user registration and login system. It includes the following features:

1. **Homepage**: Links to the login and registration pages.
2. **Registration Page**: A form where users can input their details to create an account. Validation occurs both on the frontend and backend.
3. **Login Page**: A form where users enter their credentials to access their profile.
4. **Profile Page**: Displays user-specific information upon successful login.
5. **Logout Functionality**: Logged-in users can log out, returning to the homepage.

## Features

- **Form Validation**:  
  Passwords must:
  - Be at least 6 characters long.
  - Contain both letters and numbers.
  Validation happens on the backend, with an option to include frontend validation.

- **Password Security**:  
  User passwords are hashed before being stored in the database to ensure security.

- **User Session Management**:  
  Logged-in users are directed to their profile page, and session data is maintained. Logout redirects the user to the homepage.

## Pages

- **Homepage (`/`)**: Links to login and registration pages.
- **Registration (`/register`)**: Contains a form with the following fields:
  - Username
  - Password
  - Additional optional fields (email, name, etc.)
  
  Backend validation ensures the password meets the security requirements. If validation is successful, user data is saved in the database.

- **Login (`/login`)**: Contains fields for username and password. If the credentials are valid, the user is redirected to their profile page.

- **Profile (`/profile`)**: Displays user-specific information. Only accessible after successful login.

- **Logout (`/logout`)**: Logs the user out and redirects them to the homepage.

## Styling

The design is kept simple, with a focus on functionality rather than style.

## Getting Started

1. **Clone the repository**.
2. **Set up the database**:
   - Create a database and necessary tables for storing user information.
3. **Run the project locally**:
   - Start the server and navigate to the homepage to access the login/registration system.

---

