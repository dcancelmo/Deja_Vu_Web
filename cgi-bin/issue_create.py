#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import sqlite3
import cgi
import uuid


cgitb.enable()

conn = sqlite3.connect('dejavu.db')

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


