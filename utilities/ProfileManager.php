<?php

class ProfileManager
{
    private $dbname = __DIR__ . "/../database/profiles.db";
    private $db_connection;


    // Constructor to initialize the database connection
    public function __construct()
    {
        try {
            $this->db_connection = new PDO("sqlite:" . $this->dbname);
            $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Database connection established.";
        } catch (PDOException $error) {
            die("Database error: " . $error->getMessage());
        }
    }

    // Method to register or add a new profile
    public function addProfile($profile)
    {
        $stmt = $this->db_connection->prepare("INSERT INTO profiles (full_name, email, password, created_at) VALUES (?, ?, ?, ?)");
        $result = $stmt->execute([
            $profile['full_name'],
            $profile['email'],
            password_hash($profile['password'], PASSWORD_BCRYPT),
            date('Y-m-d H:i:s')
        ]);

        return $result ? "Profile created successfully." : "Error creating profile.";
    }

    // Method to retrieve profile by email
    public function findProfileByEmail($email)
    {
        $stmt = $this->db_connection->prepare("SELECT * FROM profiles WHERE email = ?");
        $stmt->execute([$email]);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return $profile ? $profile : null;
    }

    // Method to find a profile by ID
    public function findProfileById($id)
    {
        $stmt = $this->db_connection->prepare("SELECT * FROM profiles WHERE profile_id = ?");
        $stmt->execute([$id]);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($profile);
        return $profile ? $profile : null;
    }

    // Method to update an existing profile
    public function updateProfile($id, $updatedProfile)
    {
        $stmt = $this->db_connection->prepare("UPDATE profiles SET full_name = ?, email = ? WHERE profile_id = ?");
        $result = $stmt->execute([
            $updatedProfile['full_name'],
            $updatedProfile['email'],
            $id
        ]);

        return $result ? "Profile updated successfully." : "Error updating profile.";
    }

    // Method to update profile password
    public function updateProfilePassword($id, $newPassword)
    {
        $stmt = $this->db_connection->prepare("UPDATE profiles SET password = ? WHERE profile_id = ?");
        $result = $stmt->execute([
            password_hash($newPassword, PASSWORD_BCRYPT),
            $id
        ]);

        return $result ? "Password updated successfully." : "Error updating password.";
    }
}

?>