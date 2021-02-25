# hospital-management-esystem
A system used for day to day hospital management 
The ‘Home’ page consists of 3 modules:
1. Patient Module
2. Doctor Module
3. Admin Module

 Patient Module:
This module allows patients to login into their account, book an appointment to see a doctor and see their appointment history.Once logged in he or she will be directed to the dashboard
The Dashboard page allows patients to perform two operations:

-Book his/her appointment
-View replied appointments
-View he or her data
-change password and loging out

 Doctor Module:
 The doctors can login into their account  and once the doctor clicks the ‘Login’ button, they will be directed to their own dashboard.
The Dashboard page allows doctors to perform two operations:
-Add and remove patients from the system
-Write prescriptions to the patients
-View appointments from patients
-Reply appointments
-View he or her data
-change password and loging out

Admin Module:
   
This module is the heart of our project where an admin can see the list of all patients, doctors and appointments and the feedback/queries received . 
Also admin can add and remove doctors from the system 
Login into admin account can be done by use of the admin email address and password and he or she will be redirected to the dashboard where he will perform the above mentioned tasks.
  `email`: admin@gmail.com, `password`: admin123
  
 Steps to run the project in your machine
1. Download and install XAMPP in your machine
2. Clone or download the repository
3. Extract all the files and move it to the 'htdocs' folder of your XAMPP directory.
4. Start the Apache and Mysql in your XAMPP control panel.
5. Open your web browser and type 'localhost/phpmyadmin'
6. In phpmyadmin page, create a new database from the left panel and name it as 'hospital'
7. Import the file 'hospital.sql' inside your newly created database and click ok.
8. Open a new tab and type 'localhost/hospital-management-esystem/login.php' in the url of your browser
9. Hurray! That's it!



