# TalentConnect

TalentConnect is a Laravel-based job portal that connects job seekers with employers, providing a seamless and interactive experience for both users and employers. The platform allows users to browse, search, and apply for jobs, while employers can post, manage, and track applications for their listings.

---

## Features

### For Job Seekers (Users)
- **Browse & Search Jobs:** Explore all available job listings and filter by keywords or location.  
- **Job Details:** View job requirements, benefits, and company information.  
- **Bookmark Jobs:** Save favorite jobs for later access.  
- **Apply for Jobs:** Submit applications with required information and upload resumes.  
- **Profile Management:** Update personal details and upload a profile avatar.  
- **Saved Jobs Dashboard:** Access and manage all bookmarked jobs.

### For Employers
- **Job Management:** Create, edit, and delete job listings.  
- **Applicant Tracking:** View applicants for each job, download resumes, and manage applications.  
- **Dashboard Overview:** See all job postings and application activity in one place.  
- **Company Profile Management:** Upload logos and maintain company information for job listings.

### Interactive Features
- **Modals & Forms:** Interactive forms for applications, profile updates, and job creation.  
- **Real-Time Alerts:** Notifications for actions like successful applications or profile updates.  
- **Map Integration:** Location-based job listings with visual mapping support.  
- **Role-Based Access:** Users and employers see only the features relevant to their roles.

---

## Usage
1. Visit `http://127.0.0.1:8000` in your browser.  
2. Register as a **Job Seeker** or **Employer**.  
3. Employers can create and manage jobs via the dashboard.  
4. Job seekers can browse, search, bookmark, and apply for jobs.  
5. Role-based access ensures only authorized actions are available for each user type.

---

## Installation
1. **Clone the repository:**
```bash
git clone https://github.com/HtetNaungOo27/TalentConnect.git
cd TalentConnect
---
2.	**Install dependencies:**
```bash
composer install
npm install
npm run dev
---
3. **Configure environment:**
```bash
cp .env.example .env
# Update .env with your database credentials
php artisan key:generate
---
4. **Run migrations and seeders:**
```bash
php artisan migrate
php artisan db:seed
---
5. **Start the development server:**
```bash
php artisan serve
---
## Technologies
	•	PHP 8.x / Laravel 12
	•	Blade Templates
	•	Tailwind CSS
	•	Alpine.js
	•	MySQL / SQLite (or any supported database)

