# Tree Planting Management System

A complete PHP-based system for managing tree planting activities with modern design and full functionality.

## Features

- User registration and authentication
- Three participation tiers (Volunteer, Sponsor, Organizer)
- Admin management panel
- Responsive design with nature-inspired theme
- Secure password hashing
- Session management

## Installation

1. Upload all files to your web server
2. Ensure PHP and MySQL are installed
3. The system will automatically create the database table
4. Default admin password: `admin123`

## File Structure

- `index.php` - Homepage with participation options
- `signup.php` - User registration
- `login.php` - User login
- `dashboard.php` - User dashboard
- `admin_login.php` - Admin authentication
- `admin_panel.php` - Admin management panel
- `includes/` - Configuration and helper files

## Participation Tiers

1. **Volunteer**
   - Join tree planting events
   - Track personal contributions

2. **Sponsor**
   - Fund tree planting projects
   - View sponsored trees and impact

3. **Organizer**
   - Create and manage events
   - Coordinate volunteers and sponsors

## Security Features

- Password hashing using PHP's `password_hash()`
- Session-based authentication
- SQL injection prevention with prepared statements
- Input validation and sanitization

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server with PHP support