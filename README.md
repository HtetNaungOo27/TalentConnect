# TalentConnect
TalentConnect is a Laravel-based job portal that connects job seekers with employers. Users can browse and apply for jobs, while employers can post and manage job listings.
## Features

### For Job Seekers (Users)
- Browse all available jobs
- Search jobs by keywords and location
- Apply for jobs
- Save/bookmark favorite jobs
- Manage profile and avatar

### For Employers
- Post and manage job listings
- Edit and delete their own jobs
- View applicants and download resumes
- Dashboard showing all their job listings

## Installation

1. Clone the repository:
```bash
git clone https://github.com/HtetNaungOo27/TalentConnect.git
cd TalentConnect

composer install
npm install
npm run dev

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve

### 5. Usage
```markdown
## Usage

- Visit `http://127.0.0.1:8000` in your browser
- Register as a **User** (Job Seeker) or **Employer**
- Employers can create jobs via `Create Job` button
- Users can browse and apply for jobs
- Role-based access controls are implemented

## License
MIT License
