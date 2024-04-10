# OpenSSL-VM-okeanos-ssh-keys-
The result of the process is to have created a VM with OS CentOS 7. The connection to the server is done only with SSH using any client (eg PuTTY). SSH connection requires using AUEB VPN, instructions here. Set the authentication to be done only with SSH keys.

Project requirements:
A. Create a "teacher" user. The teacher user should connect with ssh key.
Public key of the teacher user in eclass:
  Documents/LABS 2023/Teacher's public key
(Note: to check connectivity you can add to the file with public
keys (authorized_keys) past the teacher's public key on a new line and yours.)
B. Give the "teacher" user read permissions everywhere on /home and /root (on
folders, subfolders and files)
and not have any write rights to /home (the folder, subfolders and
archives)
C. Installation and configuration of all necessary services for the server to function
as a web-server with Apache.
D. Adding the necessary inbound rules to the FirewallD service of CentOS, so that http and
https to be accessible from everywhere. Restrict ssh access via AUEB only
VPN (if your public ip in the vpn is other than 195.251.255.77 add both).
(screenshot with all the rules in the report)
(Note: if you get "locked" out of your VM, you can log in via console from
admin of the ~okeanos service and log in with your credentials)
E. Using OpenSSL create a Certificate Authority (CA), CSR and an SSL
certificate.
In Organizational Unit Name (OU) define your AM (eg: 3180000 and not p3180000).
F. Configure Apache to serve your certificate over https and to
redirects http to https.
Make sure the entire SSL certificate chain is displayed correctly.
G. Create a simple website with only one text field with name=”username” and a
submit button.
If your AM is submitted (eg: 3180000) it should display a success message, while
in any other case a failure message (containing the words "success" and
"fail" respectively)
You can use any technology.
Use as DocumentRoot: /var/www/html
H. Create a txt file named your AM eg: 3180000.txt
Copy your bash history into txt (ideally clean it of unnecessary commands).
Save the txt in your home directory eg: /root/3190000.txt
