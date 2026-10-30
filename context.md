📂 Project Context: Emergence Schools (Full Specification)
1. Project Identity & Vision
 * School Name: Emergence Schools (Primary & Secondary sections).
 * Location: Douala, Cameroon.
 * Core Philosophy: Promote trust, transparency, and enrollment through accessibility.
 * Brand Colors: * Blue: #283783 (Primary brand color)
   * Yellow: #FFDE17 (Highlight/Action color)
   * White: #FFFFFF (Background/Cleanliness)
2. Technical Stack (The "Exceed" Strategy)
 * Frontend: Tailwind CSS + Flowbite (Components) + Alpine.js (State management).
 * Backend: PHP (PDO) + MySQL.
 * Optimization: Focus on fast loading for mobile data users in Cameroon (Lazy loading, WebP).
 * UX Goal: No login required; information must be "accessible to everyone".
3. Detailed Sitemap & Content requirements
🏠 Home Page
 * Hero: Visuals of students/classrooms with the text "Primary & Secondary Excellence in Douala."
 * Logic: News ticker for latest announcements and CTA buttons for "Apply Now" and "Visit Us."
 * Social Proof: Success stories and student testimonials.
📚 Academics
 * Primary Section: Curriculum, teaching methods, and sample timetables.
 * Secondary Section: Subjects, exam prep (GCE/BACC context), and clubs.
 * Guidance Counselor: Dedicated section emphasizing their importance and role.
 * Performance: Display of previous years' exam results to build trust.
💰 Admissions & Logistics
 * The "Exceed" Feature: Interactive Fee Calculator (Alpine.js) covering tuition + transport.
 * Transparency: Full fee breakdown and step-by-step application guide.
 * Payments: Prominent display of Mobile Money account info and payment procedures.
 * Transport: Fleet of buses, driver profiles, and neighborhood coverage.
📢 News & Information
 * Dynamic News: School announcements and upcoming events calendar.
 * Resource Library: Downloadable Academic calendar, Exam timetables, and Parent/Student handbooks.
📞 Contact & Location
 * Location: Google Maps embed for the Douala campus.
 * Direct Access: Integration with WhatsApp, Facebook, and Instagram.
4. Database Schema Requirements (MySQL)
 * news_events: Title, content, date, image_path, category.
 * staff: Name, role, bio, photo (for Leadership/Staff section).
 * gallery: Image_path, caption, category (Facilities/Sports/Events).
 * fees: Grade_level, tuition, books, uniforms, transport_zone.
5. Cursor Instructions
 * Class Naming: Use emergence-blue and emergence-yellow as defined in tailwind.config.js.
 * Components: Use Flowbite for Navbars, Carousels (Gallery), and Accordions (FAQ/Fees).
 * Security: Always use PHP Prepared Statements; sanitize all inputs from contact forms.
 * Tone: Professional, welcoming, and academically rigorous.