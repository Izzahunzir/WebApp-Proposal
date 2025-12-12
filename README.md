# WebApp-Proposal
**INFO 3307  Web Application Development (Section 2)**

**Proposal for Project Development**

**Project Title: IIUM FSC Indoor Booking System**

**Prototype Link: https://tinyurl.com/5dhpp3dc**

**Group: Opera**
**Group Members:**
1. Nurul Izzah Binti Mohd Unzir (2117246)
2. Aleya Maisarah Binti Muslimin (2312370)
3. Laila Karmila Binti Shahrunizam (2313814)
4. Farresa Haifa' Binti Mohammed (2319554)

# **1.0 Introduction**

For this class project, our group focuses on developing the IIUM FSC Indoor Booking System. This application aims to give a usable platform that allows students to check court availability in real-time and manage their court reservation efficiently. The application will include user registration using student matric number to log-in into the system to ensure only IIUM students can do the booking. Users will be able to view the real-time court availability, which displays booked court, available slots and time schedules to prevent any double reservation mistake. During the booking process, users can select the type of sport, time slot and court number, and the system will instantly confirm the booking if the slot is free. An admin panel is also provided to monitor bookings, manage check-ins, and view court utilization records. With this system, students can conveniently reserve courts online without needing to physically visit the sports complex to check availability.

## **1.1 Problem Description**
### **1.1.1 Problem Background**

The proposed system will be developed as a web-based application that is accessible through both desktop and mobile browsers. The target users for this system are female students and the staff, where the existing booking process often leads to several issues as it is handled manually or through walk-in registration. Some of the issues include overlap bookings, long waiting times and unclear court availability. Therefore, it is ideal to develop a centralized booking system that simplifies reservation as well as enhancing user experience.


### **1.1.2 Problem Statement**

The existing booking process presents several specific problems that affect both students and administrators. Currently, there is no real-time court availability system , it causes students to make unnecessary trips to the sports complex. Secondly, the booking process is inefficient as students have to physically present at the sports complex to check the available time slots. In addition, the risk of overlap booking will increase as staff use handwritten logs , which will lead to oversight. The staff will also have difficulty to manage and track facility usage as record keeping is inconsistent, resulting in incomplete data.





# **1.2 Project Objectives**

This project aims to enhance the existing booking system by developing an IIUM FSC Indoor Booking System. The objectives are below:

1. Develop a comprehensive booking system where users can easily reserve the sport court without having to walk the sport complex

2. Enhancing both users (students and administrators) experience by creating a user-friendly interface design


# **2.0 Features and Functionality**

The IIUM FSC Indoor Booking System is designed to provide a seamless experience for both users and administrators. The system’s features and functionalities are detailed below : 

1. **Login/Authentication** 

Users are required to log in using matrix numbers to access the booking system. This ensures that only authorized students and staff can make bookings, keeping the system secure and organized. Roles : Students and Staff/Admin

2. **Select Sport & Courts**

The system provides a clear view of all available courts for Badminton, Netball, and Pingpong. Users can check the availability of courts based on sport type, date, and time slot before making a booking.

3. **Real-Time Booking & Auto Confirmation** 

Users can select their preferred sport, court, date, and time slot to make a reservation. Once the booking is confirmed, it is saved in the system and visible to both the user and admin, reducing the chances of double bookings.

4. **Pop-up/ Reminder Message** 

When the booking is confirmed, the system shows a pop-up message of the booking details and reminding the student to bring their Matric Card to check in at the FSC.

5. **Check in at FSC (Admin-Controlled)**

Upon arriving at the sport complex, they must check-in at the FSC with a staff member. Staff can press a “Check-In” button in the system to record attendance. This integrates online and physical check-in.

6. **Auto-Cancel for Late Arrival**

If a user does not check in within 10 minutes of the booked time, the system automatically cancels the booking. This feature prevents courts from being held unnecessarily and allows other users to book available slots.

7. **Booking History** 

Users can view their past and upcoming bookings. This feature allows users to keep track of their activities and manage their bookings efficiently.

8. **Admin/Staff Dashboard** 

Administrators have access to a dedicated panel where they can manage all courts, view all bookings, monitor check-ins and court status. This provides administrators with full control over the scheduling and utilization of the courts.


# **3.0 ERD Diagram**

FSC Indoor Booking System
<img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/87b1e572-e606-4d21-b346-3a7d93940121" />




# **4.0 Sequence Diagram**
![Image](https://github.com/user-attachments/assets/c886bcf8-8661-43b4-81d8-c557a9bea47a)




# **References**

_Log in to the site | iTa’LeEm_. (n.d.). <https://italeemc.iium.edu.my/login/index.php> 

_Login - CAS – Central Authentication Service_. (n.d.). <https://cas.iium.edu.my:8448/cas/login?service=https%3a%2f%2fimaluum.iium.edu.my%2fhome> 



