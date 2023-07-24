<p style="text-align: center"><img src="https://github.com/jfpasixm/expiringlink/blob/main/img/screenshot.png" alt="screenshot"></p>

Initially coded last March 15, 2018 using PHP 7.1.8. Rechecked for compatability with PHP 8.2 on July 24, 2023

# PHP File Upload with Expiring Download Link
Why use expiring download links?

This code is just a simple implementation of encrypting true links to protect it
from direct downloaders. In this way, you can ensure that the users visit your
website first before getting the file they want.

Program Features:
1. Basic Encryption and Decryption using Base64
2. Open link to New Tab using Button
3. Copying text to clipboard on Button Click
4. HTML5 Validation
5. Create SEO friendly URL using .htaccess

Plugin(s)/Framework(s)/Theme(s) used:
1. Bootstrap from https://getbootstrap.com
2. HttpErrorPages from https://github.com/AndiDittrich/HttpErrorPages

### Installation

Copy the files to htdocs folder<br>(Mine is C:\xampp\htdocs\ using xampp, yours might be different)

### How to run
Open your browser, then navigate to http://localhost/expiringlink/ and press "Enter"<br>(Your test URL might be different)

### Changelog

1.0.0    - Initial commit

1.0.1    - function parse_str() is changed in PHP 8.2, it now requires an array variable.
         - edited decrypt.php based from the above change.