# Smart Lost & Found

A web-based lost-and-found management system designed to help users report lost or found items, discover related matches, submit claims, and contact item owners through a structured workflow.

The application includes user authentication, item management, claim handling, administrative tools, and attribute-based related-item discovery.

## Features

- User registration and login
- Google OAuth authentication
- Report lost and found items
- Upload item images and details
- Category, model, color, date, and location information
- Related-item discovery using shared attributes
- Item claim workflow
- User dashboard
- Admin dashboard for users, items, and claims
- WhatsApp-based contact flow

## Tech Stack

- PHP
- MySQL
- HTML / CSS / JavaScript
- Google OAuth
- XAMPP / local PHP development environment

## Main Workflow

1. A user creates an account or signs in.
2. Lost or found items can be submitted with descriptive attributes.
3. The system stores the item and displays potentially related items.
4. Users can submit claims or contact the relevant owner.
5. Administrators can review users, items, and claims through the admin interface.

## Project Structure

```text
smartlostandfound/
├── assets/
├── database/
├── includes/
├── admin_dashboard.php
├── dashboard.php
├── all-items.php
├── claim-item.php
├── login.php
├── register.php
└── .env.example
```

## Local Setup

Clone the repository into your PHP server directory and configure MySQL using the SQL files / schema available in the project.

```bash
git clone https://github.com/Nadula-W/smartlostandfound.git
```

Copy the environment template and add your own local credentials:

```bash
cp .env.example .env
```

Never commit real OAuth credentials or secrets to Git.

## Security Note

Runtime credentials should be stored only in a local `.env` file. The repository includes `.env.example` to document the required configuration without exposing secrets.

## Purpose

This project demonstrates full-stack web development with authentication, relational data, user/admin workflows, file uploads, external authentication, and practical matching logic around a real campus-style problem.
