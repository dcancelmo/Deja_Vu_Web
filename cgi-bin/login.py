#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import cgi
import sqlite3
import Cookie
import os
import datetime
from hashlib import sha256

cgitb.enable()

conn = sqlite3.connect('dejavu.db')
c = conn.cursor()
c.execute('CREATE TABLE IF NOT EXISTS users(username varchar(30) primary key, password char(64), timeCreated varchar(26))')
form = cgi.FieldStorage()
userName = form['username'].value
password = form['password'].value
rowsCur = c.execute('SELECT * FROM users WHERE username = ?', [userName])
rows = rowsCur.fetchone()
if rows is not None:
	hashed_pass = rows[1]
	salt = rows[2]
	test_pass = password + salt
	test_pass = sha256(test_pass.encode('ascii')).hexdigest()
	if hashed_pass == test_pass:
		cookie = Cookie.SimpleCookie()
		cookie['LOGIN'] = userName
		expires = datetime.datetime.utcnow() + datetime.timedelta(days=30)
		cookie['LOGIN']['expires'] = expires.strftime('%a, %d %b %Y %H:%M:%S')
		print 'Content-Type: text/html'
		print cookie.output()
		print "Location: ../index.php"
		print
	else:
		print "Content-Type: text/html"
		print "Location: ../login_messages/incorrect.html"
		print
else:
	print 'Content-Type: text/html'
	print "Location: ../login_messages/incorrect.html"
	print

conn.commit()
conn.close()