# 🎓 Student Record Management System

A web-based application developed as a personal project to manage student academic data, including semester marks, subjects, and study material links. This project was built using PHP, HTML, CSS, JavaScript, and MySQL, and is based on my own semester records.

It provides a centralized and secure system for both students and teachers to access relevant data efficiently, eliminating the need for manual file systems.


## 📖 Project Description

This system stores complete details of students along with their previous semester marks, current semester subjects, and links to study materials. It allows role-based login for both students and teachers.

Students can log in to:

  View previous semester marks

  Check current subjects with material links

  See latest news and updates

Teachers can log in to:

  Search and view any student's data using roll number

  Access college announcements

All user credentials and data are securely stored in a MySQL database, and access is controlled based on the user’s role. Students can only access their own data, while teachers can access any student’s records.


## ✨ Features

  Role-based login (Student / Teacher)

  Registration and password recovery

  View marks, subjects, and materials

  College news and announcements

  Teacher search by student roll number

  Secure storage of user credentials

  Clean and responsive UI


## 🛠️ Tech Stack

Frontend: HTML, CSS, JavaScript

Backend: PHP

Database: MySQL

Web Server: XAMPP / Apache


## ▶️ How to Run

Clone or download the repository:

git clone https://github.com/Chamanthi17/student-record-management-system.git

Import student_record.sql into your MySQL server (e.g., via phpMyAdmin).

Move the project folder to your XAMPP htdocs directory.

Start Apache and MySQL in XAMPP.

Open your browser and go to:

http://localhost/student-record-management-system/home.php


## 📁 File Overview

home.php – Login page

reg.php, pass.php, forgot.php – Registration and password recovery

stu.php, stmarks.php, subj.php, stnews.php – Student module

teach.php, tenews.php – Teacher module

student_record.sql – MySQL database schema

college.jpeg, logo.jpeg – Visual assets

exit.php – Logout function


## 🚀 Future Improvements

Export marksheets as PDFs

Add performance graphs

Implement profile settings

Use AJAX for smoother interactivity

Enhanced UI styling with CSS frameworks


## 🙋‍♀️ Author

Chamanthi Pyneni

This was my first self-built full-stack web project, helping me gain practical experience in web development and database management.
