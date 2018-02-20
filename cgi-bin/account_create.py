#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import sqlite3
import cgi
import datetime
import Cookie
from hashlib import sha256

cgitb.enable()

print 'Content-Type: text/html'

database_name = 'dejavu.db'
table_name = 'users'

form = cgi.FieldStorage()

username = str(form['username'].value)
password = str(form['password'].value)
passwordConfirm = str(form['passwordConfirm'].value)
timestamp = str(datetime.datetime.now())
password = password + timestamp
hashPass = sha256(password.encode('ascii')).hexdigest()

conn = sqlite3.connect(database_name)
c = conn.cursor()

c.execute(
	'CREATE TABLE IF NOT EXISTS users(username VARCHAR(30) PRIMARY KEY, password char(64), timeCreated DATETIME)')

# Check if already in database
try:
	c.execute('INSERT INTO users (username, password, timeCreated) VALUES (?, ?, ?)',
			  [username, hashPass, timestamp])
	cookie = Cookie.SimpleCookie()
	cookie['LOGIN'] = username
	expires = datetime.datetime.now() + datetime.timedelta(days=30)
	cookie['LOGIN']['expires'] = expires.strftime('%a, %d %b %Y %H:%M:%S')
	print cookie.output()
	print "Location: ../index.php"
	print
# else:
except sqlite3.IntegrityError:
	print "Location: ../login_messages/user_unavailable.html"
	print
conn.commit()
conn.close()