
# BugShield
A Laravel-based Bug Bounty Platform with AI-Powered Bug Solution Suggestions.

## Table of Contents
- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Features](#features)
- [Usage](#usage)
  - [User Roles](#user-roles)
  - [Submitting Reports](#submitting-reports)
  - [Viewing Reports](#viewing-reports)
  - [Admin Management](#admin-management)
  - [AI-Powered Bug Solution Suggestions](#ai-powered-bug-solution-suggestions)
- [Customization](#customization)
- [Security](#security)
- [Future Development](#future-development)
- [Conclusion](#conclusion)

## 1. Introduction
The Bug Bounty Platform is a Laravel-based web application designed to facilitate bug reporting, review, and reward management for ethical hackers and administrators. It simplifies vulnerability reporting and incorporates AI to suggest potential solutions for reported bugs, streamlining the patching process.

## 2. Requirements
To run the Bug Bounty Platform, ensure the following:
- PHP 8.0 or higher
- Laravel 9.x or higher
- MySQL or PostgreSQL database
- Composer for dependency management
- Node.js for managing frontend dependencies
- Web server (Apache, Nginx, etc.)
- Git (optional but recommended)

## 3. Installation
### Step 1: Clone the Repository
```bash
git clone https://github.com/Nxhyn85/BugShield.git
cd BugShield
```
### Step 2: Install Dependencies
```bash
composer install
npm install && npm run dev
```
### Step 3: Configure Environment Variables
```bash
cp .env.example .env
```
Update the following values:
- `APP_NAME`: The name of the platform
- `DB_CONNECTION`: mysql or your database choice
- `DB_DATABASE`: Your database name
- `DB_USERNAME`: Your database username
- `DB_PASSWORD`: Your database password

### Step 4: Generate Application Key
```bash
php artisan key:generate
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 7: Start the Application
```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 4. Configuration
### Admin User Setup
A default admin user is created with the following credentials:
- Name: Admin
- Username: admin
- Email: admin@localhost
- Password: password

## 5. Features
- **User Registration & Authentication**: Role-based access for researchers and administrators.
- **Bug Submission**: Form-based submission of bug reports.
- **AI-Powered Bug Solutions**: Automatically suggest potential solutions to reported bugs using AI.
- **Admin Dashboard**: Manage reports, review bugs, assign severity, and distribute rewards.
- **Severity & Reward Management**: Classify vulnerabilities by severity (Low, Medium, High, Critical) and set rewards accordingly.

## 6. Usage

### 6.1 User Roles
- **Researcher**: Users who submit bug reports and track their status.
- **Admin**: Administrators who manage the platform, review reports, and handle communication with researchers.

### 6.2 Submitting Reports
1. Log in as a researcher.
2. Navigate to the Submit Report section.
3. Complete the report form with the following fields:
   - Vulnerability Type (e.g., XSS, SQL Injection, etc.).
   - Severity (Low, Medium, High, Critical).
   - Description: Detailed vulnerability information.
4. Submit the report for review.

### 6.3 Viewing Reports
- Researchers can view the status of submitted reports under the Dashboard tab.
- Admins can access all reports, filter them by status, severity, or submission date, and review each report in detail.

### 6.4 Admin Management
Admins can:
- **Review Reports**: Validate or reject reports based on their severity and impact.
- **Assign Severity and Rewards**: Mark valid reports with severity levels and allocate corresponding rewards.
- **Resolve and Patch**: Track the patching process after validation of a vulnerability.

### 6.5 AI-Powered Bug Solution Suggestions
After a bug is submitted, the AI processes the report and suggests potential solutions based on the bug type and severity.
- **How It Works**:
  - The AI analyzes the vulnerability type (e.g., SQL Injection, Cross-Site Scripting).
  - It suggests common solutions such as parameterized queries, escaping inputs, or updating security libraries.
  - To interact with the AI, navigate to the `gemini` folder. Activate the venv and run the `python3 app.py` command.
- **Example**:
  - For an SQL Injection report, the AI might suggest:
    - Use prepared statements and parameterized queries.
    - Validate and sanitize user inputs before processing.
    - Update the database layer to prevent injection attacks.

### 6.6 Severity & Reward Management
- **Severity**: Classify vulnerabilities by severity (Low, Medium, High, Critical).
- **Rewards**: Set rewards for each severity level (e.g., 100 points for Low, 200 for Medium, etc.).

## 7. Customization

### Tailwind CSS
The frontend uses Tailwind CSS. To modify the look and feel:
- Edit the `resources/css/app.css` file.
- Run `npm run dev` to rebuild the assets.

### Particles.js Integration
Particles.js powers visual effects in specific sections of the platform. Customize the particle effects by modifying the `particles.json` file located in `public/js/particles`.

# Database Design
![database-design](https://i.ibb.co.com/kgxvnYdm/image.png)

## 8. Security
- **Authentication**: Utilizes Laravel's authentication and session management for secure user login.
- **Input Validation**: All inputs are validated to prevent vulnerabilities like SQL Injection and XSS.
- **Role-Based Access Control**: Restricts access based on user roles (researcher vs admin).
- **CSRF Protection**: Enabled by default to protect against cross-site request forgery.

## 9. Future Development
- Implement payment gateway to pay the researchers based on the severity of the report.
- Implement comment functionalities based on report status.
- Implement collaboration functionality for submitting reports.
- Implement two-factor authentication (2FA) to enhance account security.

## 10. Conclusion
The Bug Bounty Platform is a powerful and flexible tool for managing vulnerability reports and rewards. With the integration of AI-powered suggestions, it accelerates the bug-fixing process and enhances security workflows for organizations and ethical hackers alike.
