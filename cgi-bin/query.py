#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import sqlite3
import cgi

cgitb.enable()

conn = sqlite3.connect('dejavu.db')
c = conn.cursor()

tuples = c.execute('SELECT name, description, solution, attempts FROM issues')
if tuples is not None:
	tuples = tuples.fetchall()
	if tuples is not None:
		print "Content-Type: text/html"
		print 
		print '''<html><head><link rel="stylesheet" href="/css/styles.css"></head><body>
				<table width="1"> 
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Solution</th>
						<th>Attempts</th>
					</tr>'''
		for row in tuples:
			print "<tr><td>" + row[0] + "</td><td>" + row[1] + "</td><td>" + row[2] + "</td><td>" + row[3] + "</td></tr>"
		print "</table></body></html>"