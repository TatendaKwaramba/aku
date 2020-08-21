#!/usr/local/bin/python3.3
import pymysql as sql
import smtplib as mail
import time
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

db = sql.connect("192.168.1.168","mitas","PyfNU0369XosK2B#","project_x")
cursor = db.cursor()

db_store = sql.connect("192.168.1.80","deant","haraka?1986","midnight_balances")
cursor_store = db_store.cursor()

# FETCHES AND STORES ECONET BALANCE
cursor.execute('SELECT balance FROM product WHERE product.name LIKE "%Econet%"')
econetBalance = cursor.fetchone()

# FETCHES ZESA BALANCE
cursor.execute('SELECT balance FROM product WHERE product.name LIKE "%Token Purchase%"')
zesaBalance = cursor.fetchone()

# FETCHES TELECEL BALANCE
cursor.execute('SELECT balance FROM product WHERE product.name LIKE "%Telecel%"')
telecelBalance = cursor.fetchone()

# FETCHES NETONE BALANCE
cursor.execute('SELECT balance FROM product WHERE product.name LIKE "%Netone%"')
netoneBalance = cursor.fetchone()

# FETCHES E-Value BALANCE
cursor.execute('SELECT deposit FROM agent WHERE agent.name LIKE "%E-value%"')
evalueBalance = cursor.fetchone()

# FETCHES NettCash Norton BALANCE
cursor.execute('SELECT deposit FROM agent WHERE agent.name LIKE "%NettCash Norton%"')
nortonBalance = cursor.fetchone()

# FETCHES GetCash CopaCabbana BALANCE
cursor.execute('SELECT deposit FROM agent WHERE agent.name LIKE "%GETCASH COPACABANA%"')
copacabanaBalance = cursor.fetchone()

# FETCHES E-Value BALANCE
cursor.execute('SELECT deposit FROM agent WHERE agent.name LIKE "%GETCASH EASTGATE%"')
eastgateBalance = cursor.fetchone()

localtime = time.asctime(time.localtime(time.time()))

cursor_store.execute('INSERT INTO balances (econet, netone, telecel, coppacabana, eastgate, zetdc,evalue,norton, time )'
               ' VALUES ({econetBalance},{netoneBalance},{telecelBalance},{copacabanaBalance},{eastgateBalance},{zesaBalance},{evalueBalance},{nortonBalance},CURRENT_TIMESTAMP())'.format(zesaBalance=zesaBalance[0],econetBalance=econetBalance[0],telecelBalance=telecelBalance[0],netoneBalance=netoneBalance[0],evalueBalance=evalueBalance[0],nortonBalance=nortonBalance[0],copacabanaBalance=copacabanaBalance[0],
                                                                                                                                                       eastgateBalance=eastgateBalance[0],
                                                                                                                                                       localtime=localtime))




fromaddr = "donotreply@getcash.co.zw"
toaddr = "yeukaic@getcash.co.zw, dianac@getcash.co.zw"
cc = "deant@getcash.co.zw"
msg = MIMEMultipart()
msg['From'] = fromaddr
msg['To'] = toaddr
msg['Cc'] = cc
msg['Subject'] = "GETCASH BALANCES"

body = """
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<img style="margin: 0 auto" src="https://platform.getcash.co.zw/img/gc/Logo_GetCash.png" alt="GetCash Logo">
<h1>Balances as at {localtime}</h1>
<p>-----------------------------------------------------------------</p>
<br>
<h4>ZETDC   : ${zesaBalance}</h4>
<h4>ECONET  : ${econetBalance}</h4>
<h4>TELECEL : ${telecelBalance}</h4>
<h4>NETONE  : ${netoneBalance}</h4>
<h4>NettCash E-Value  : ${evalueBalance}</h4>
<h4>NettCash Norton   : ${nortonBalance}</h4>
<h4>GetCash CopaCabana : ${copacabanaBalance}</h4>
<h4>GetCash EastGate   : ${eastgateBalance}</h4>

</body>
</html>
""".format(localtime=localtime,
           zesaBalance=zesaBalance[0],
           econetBalance=econetBalance[0],
           telecelBalance=telecelBalance[0],
           netoneBalance=netoneBalance[0],
           evalueBalance=evalueBalance[0],
           nortonBalance=nortonBalance[0],
           copacabanaBalance=copacabanaBalance[0],
           eastgateBalance=eastgateBalance[0])
msg.attach(MIMEText(body, 'html'))

server = mail.SMTP('webmail.getcash.co.zw', 587)
server.starttls()
server.login(fromaddr, "@Coporeti1#")
text = msg.as_string()
recipients = toaddr.split(',')
server.sendmail(fromaddr, recipients, text)
server.quit()