# Assignment : 02 - Profile Management Project

### Name : Mahamud Hasan

### Email: (rabbithasan@outlook.com)

---

## Functionalities
### PHP, HTML, CSS-Tailwind, and SQLite for database
- Register user
- Login
- View profile in dashboard
- Edit profile (name, email) in dashboard
- Change password from dashboard
- Logout
- Forget password and recover password

---

### Test Users
- mhasan@me.com - hello123
- afazal@testmail.com - fazal2345a
- aljones@example.com - world12345

---

### Assignment Requirements:

1. User Registration -
 - Create a registration form with the following fields:
 - Full Name
 - Email (must be unique)
 - Password
 - Password must be hashed before storing in the database.
 - Validate user input (empty fields, valid email format, password length).
 - Store user data in a MySQL database.

2. User Login -
 - Create a login form using email and password.
 - Verify user credentials from the database.
 - Use sessions to maintain login state.
 - Display appropriate error messages for invalid login attempts.

3. Profile Management -
 - After login, users should be able to:
 - View their profile information
 - Update their profile (name, email, password – optional)
 - Ensure only the logged-in user can access and update their profile.

4. Logout-
 - Implement a logout feature.
 - Destroy session data securely.
 - Redirect users to the login page after logout.

5. Database Design -
 - Create a MySQL database with at least one table:
 - Users-
 - Suggested fields:
 - id (Primary Key)
 - name
 - email
 - password
 - created_at

6. Security Considerations -
 - Use password hashing (password_hash, password_verify)
 - Prevent SQL Injection (Prepared Statements)
 - Restrict access to authenticated pages
 - Validate and sanitize user input
