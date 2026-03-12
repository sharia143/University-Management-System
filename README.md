# University Management System

PHP/MySQL web project for university content pages, user portal, and admin panel.

## Project Structure

- `View/`: main web application source
- `View/loginsystem/`: user and admin authentication area
- `View/loginsystem/admin/`: admin dashboard and management pages

## Main Features

- Public university information pages
- User registration and login
- User profile and password management
- Admin dashboard, notices, downloads, and user management

## Security Notes

- Passwords are now handled with modern password hashing.
- Authentication flows now use prepared statements for safer SQL handling.
- Password recovery now uses reset links instead of emailing stored passwords.

## Setup

See [SETUP.md](SETUP.md) for local environment and run instructions.
