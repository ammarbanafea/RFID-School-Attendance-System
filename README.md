# RFID-School-Attendance-System
1- Open "NodeMCU_RFIDv2.0" folder then open the file named "NodeMCU_RFIDv2.0" by using Arduino software
2- These values needs to change in order to use RFID function

	const char *ssid = "Your_Wi-Fi_SSID"; //to your Wi-Fi name
	const char *password = "Your_Wi-Fi_Password"; //to your Wi-Fi password
	const char* device_token  = "Device_Token_From_The_Website"; //you can get from the website
	String URL = "http://192.168.100.2/School_RFID_Secuity_System/getdata.php" 
	In order to use the RFID funtion this value "192.168.100.2" needs to change to the computer IP or the server domain
 
3- Save the Arduino and upload it to the NodeMCU device

4- Go to the browser and enter "localhost/phpmyadmin"

5- Create a dabase name "school" and import the file inside "Database" folder

6- After this setup you can use the website with the RFID

7- Enter the URL "http://192.168.100.2/School_RFID_Secuity_System/login.php" and change "192.168.100.2" to your computer IP

8- Now you can be able to access the system.

Admin account information
	- email: star.x1998@gmail.com
	- password: 123123123
	
Parent account information
	- email: Ali@gmail.com
	- password: 123
