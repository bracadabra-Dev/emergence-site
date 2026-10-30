# Emergence Schools Website

A complete bilingual (English/French) website for Emergence Schools in Douala, Cameroon.

## Features

- **Bilingual Support**: Full English and French translations with language switcher
- **Interactive Fee Calculator**: Real-time fee calculation based on grade level and transport zone
- **News & Events**: Dynamic news feed with announcements and events
- **Photo Gallery**: Categorized gallery with lazy loading
- **Admin Panel**: Complete content management system for all content types
- **Mobile Optimized**: Responsive design optimized for mobile data users
- **Performance**: Lazy loading, optimized images, fast loading times

## Requirements

- XAMPP (or similar local server with PHP and MySQL)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Modern web browser

## Installation

1. **Extract files** to your XAMPP htdocs directory:
   ```
   C:\xampp\htdocs\emergence
   ```

2. **Create the database**:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Import the file: `database/schema.sql`
   - This will create the `emergence` database with all required tables

3. **Configure database** (if needed):
   - Default XAMPP credentials are already set:
     - Host: localhost
     - User: root
     - Password: (empty)
     - Database: emergence
   - If your setup differs, edit `config/database.php`

4. **Set up image directories**:
   - Create the following directories (if they don't exist):
     - `assets/images/news/`
     - `assets/images/staff/`
     - `assets/images/gallery/`
     - `assets/images/testimonials/`
   - Make sure these directories are writable (chmod 755 or 777)

5. **Access the website**:
   - Frontend: http://localhost/emergence/pages/index.php
   - Admin Panel: http://localhost/emergence/admin/index.php
   - Default admin credentials:
     - Username: `admin`
     - Password: `admin123`
     - **IMPORTANT**: Change this password immediately after first login!

## Project Structure

```
emergence/
├── admin/              # Admin panel (login required)
├── api/                # API endpoints
├── assets/             # CSS, JS, images
├── config/             # Configuration files
├── database/           # Database schema
├── includes/           # Reusable components (header, footer, functions)
└── pages/              # Main website pages
```

## Admin Panel

The admin panel allows you to manage:
- News & Events
- Staff Members
- Photo Gallery
- Fee Structure
- Student Testimonials
- Exam Results

## Customization

### Brand Colors
Edit `tailwind.config.js` to change brand colors:
- `emergence-blue`: #283783
- `emergence-yellow`: #FFDE17

### Site Information
Edit `config/constants.php` to update:
- Site name
- Location
- Contact information
- Social media links

## Security Notes

1. **Change default admin password** immediately
2. The default password hash in the database is for `admin123` - change it!
3. For production, update `config/database.php` with secure credentials
4. Ensure `.htaccess` is working for security headers

## Support

For issues or questions, refer to the project documentation or contact the development team.

## License

Proprietary - Emergence Schools

