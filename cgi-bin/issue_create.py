#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import sqlite3
import cgi
import uuid


cgitb.enable()

conn = sqlite3.connect('dejavu.db')
c = conn.cursor()
c.execute('CREATE TABLE IF NOT EXISTS issues(iID VARCHAR(32) PRIMARY KEY NOT NULL, user VARCHAR(30) NOT NULL, name VARCHAR(300) NOT NULL, description TEXT NOT NULL, solution TEXT NOT NULL, attempts TEXT, FOREIGN KEY (user) REFERENCES users(username))')
c.execute('CREATE TABLE IF NOT EXISTS tags(iID INT NOT NULL, tag VARCHAR(50) NOT NULL, FOREIGN KEY (iID) REFERENCES issues(iID), CONSTRAINT pk_tags PRIMARY KEY (iID, tag))')
c.execute('CREATE TABLE IF NOT EXISTS users(username VARCHAR(30) PRIMARY KEY NOT NULL, password CHAR(64) NOT NULL, timeCreated VARCHAR(26) NOT NULL)')

form = cgi.FieldStorage()

uuidObj = uuid
uID = uuidObj.uuid4()
user = "administrator"
name = str(form['name'].value)
description = str(form['description'].value)
solution = str(form['solution'].value)
if 'attempts' in form:
    attempts = str(form['attempts'].value)
else:
    attempts = None
tagsList = str(form['tags'].value)
tagArr = tagsList.split(", ")

# Check if already in database
try:
    c.execute('INSERT INTO issues (uID, user, name, description, solution, attempts) VALUES (?, ?, ?, ?, ?, ?)',
              [uID, user, name, description, solution, attempts])
    try:
        for currTag in tagArr:
            c.execute('INSERT INTO tags(uID, tag) VALUES (?, ?)', [uID, currTag])
            print 'Content-Type: text/html'
            print "Location: ../index.html"
            print

    except sqlite3.IntegrityError:
        print 'Content-Type: text/html'
        print
        print '''<html>
                                <head>
                                    <title>Error</title>
                                    <script type = "text/javascript">
                                    	alert("Error. Failure to create tags entry.");
                                    	window.location.href = "../index.html";
                                    </script>
                                </head>
                                <body>
                                </body>
                            </html>
                            '''
# else:
except sqlite3.IntegrityError:
    print 'Content-Type: text/html'
    print
    print '''<html>
                        <head>
                            <title>Error</title>
                            <script type = "text/javascript">
                            	alert("Error. Failure to create issue entry.");
                            	window.location.href = "../index.html";
                            </script>
                        </head>
                        <body>
                        </body>
                    </html>
                    '''

conn.commit()
conn.close()


