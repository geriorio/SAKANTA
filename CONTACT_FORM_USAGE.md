# Contact Form Component - Usage Guide

## Database Setup ✅

### Migration Created:
- Table: `contact_forms`
- Fields:
  - `id` - Primary key
  - `user_type` - enum('buyer', 'seller', 'agent')
  - `full_name` - string
  - `email` - string
  - `message` - text (nullable)
  - `page_source` - string (nullable) - tracks which page form was submitted from
  - `created_at`, `updated_at` - timestamps

### Model:
- `App\Models\ContactForm`
- All fields fillable and ready to use

## Component Usage

### Basic Usage (Default text):
```blade
@include('components.contact-form')
```

### Custom Title & Subtitle:
```blade
@include('components.contact-form', [
    'title' => 'Get In Touch',
    'subtitle' => 'We would love to hear from you!',
    'pageSource' => 'home'
])
```

### Example in about.blade.php:
```blade
@include('components.contact-form', [
    'title' => "We're here to help",
    'subtitle' => "Want to learn more about co-ownership or how Sakanta works? Ask us anything.",
    'pageSource' => 'about'
])
```

## Features

✅ **Fully Responsive** - Works on desktop, tablet, and mobile
✅ **Form Validation** - Server-side validation with error messages
✅ **Success Messages** - Flash message after successful submission
✅ **Old Input Values** - Preserves user input on validation errors
✅ **Custom Styling** - Matches Sakanta design system
✅ **Reusable Component** - Can be used on any page

## Customization Options

### Props Available:
- `title` - Main heading (default: "We're here to help")
- `subtitle` - Description text (default: "Want to learn more...")
- `pageSource` - Track which page the form was submitted from

## Viewing Submissions

To view form submissions in admin panel or database:
```php
// Get all submissions
$submissions = ContactForm::latest()->get();

// Get by user type
$buyers = ContactForm::where('user_type', 'buyer')->get();
$sellers = ContactForm::where('user_type', 'seller')->get();
$agents = ContactForm::where('user_type', 'agent')->get();

// Get by page source
$aboutPageForms = ContactForm::where('page_source', 'about')->get();
```

## Styling

The component includes its own scoped styles that match:
- Font: Esther for headings, Work Sans for body
- Colors: #064852 (primary), #F7EFE2 (background)
- Fully responsive with mobile breakpoints

## Future Enhancements (Optional)

- [ ] Email notifications to admin on new submission
- [ ] Admin panel to view/manage submissions
- [ ] Export submissions to CSV
- [ ] Auto-reply email to user
