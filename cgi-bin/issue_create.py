#!/usr/bin/env python
#!C:/Python27/python.exe

import cgitb
import sqlite3


cgitb.enable()

conn = sqlite3.connect('dejavu.db')
c = conn.cursor()
c.execute('CREATE TABLE IF NOT EXISTS issues(iID INT PRIMARY KEY NOT NULL, user VARCHAR(30) NOT NULL, name VARCHAR(300) NOT NULL, description TEXT, solution TEXT NOT NULL, attempts TEXT, FOREIGN KEY (user) REFERENCES users(username))')
c.execute('CREATE TABLE IF NOT EXISTS tags(iID INT NOT NULL, tag VARCHAR(50) NOT NULL, FOREIGN KEY (iID) REFERENCES issues(iID), CONSTRAINT pk_tags PRIMARY KEY (iID, tag))')
c.execute('CREATE TABLE IF NOT EXISTS users(username VARCHAR(30) PRIMARY KEY NOT NULL, password CHAR(64) NOT NULL, timeCreated VARCHAR(26) NOT NULL)')
