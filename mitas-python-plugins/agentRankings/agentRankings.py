#!/usr/local/bin/python3.3
import csv
import datetime
from email.mime.base import MIMEBase

import pymysql as sql
import smtplib as mail
import time
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

from email import encoders
import os


db = sql.connect("192.168.1.168","mitas","PyfNU0369XosK2B#","project_x")
cursor = db.cursor()

yest = datetime.datetime.today() - datetime.timedelta(days=1)

startYest = yest.strftime("%Y-%m-%d 00:00:00")
endYest = yest.strftime("%Y-%m-%d 23:59:59")

yestString = yest.strftime("%Y-%m-%d")

query = 'SELECT b.name, SUM(CASE WHEN a.transaction_type_id = 1 THEN a.commission ELSE 0 END) cash_in, SUM(CASE WHEN a.transaction_type_id = 2 THEN a.commission ELSE 0 END) cash_out, SUM(CASE WHEN a.transaction_type_id IN (6,7) THEN a.commission ELSE 0 END) bill_payments, SUM(CASE WHEN a.transaction_type_id IN (1,2,5,6,7,26,57,51) THEN a.commission ELSE 0 END) total_earnings FROM transaction a, agent b WHERE a.date BETWEEN "{startYest}" AND "{endYest}" AND (a.description NOT LIKE "REVERSED%") AND (a.description NOT LIKE "%PreAuth%") AND a.description IS NOT NULL AND a.agent_id = b.id GROUP BY a.agent_id ORDER BY total_earnings DESC'.format(startYest=startYest,endYest=endYest)
cursor.execute(query)
earnings = cursor.fetchall()
earningsFilename = 'AgentEarningsRankings'+yestString+'.csv'

with open(earningsFilename, "w", newline='') as csv_file:
    csv_writer = csv.writer(csv_file)
    csv_writer.writerow([i[0] for i in cursor.description])  # write headers
    csv_writer.writerows(earnings)

query2 = 'SELECT b.name AS "Agent Name",b.cellphone as "Cellphone", b.address as Address, SUM(CASE WHEN a.transaction_type_id = 1 THEN a.commission ELSE 0 END) "Cash in Earnings", SUM(CASE WHEN a.transaction_type_id = 1 THEN 1 ELSE 0 END) "Cash in Transactions", SUM(CASE WHEN a.transaction_type_id = 2 THEN a.commission ELSE 0 END) "Cash Out Earnings", SUM(CASE WHEN a.transaction_type_id = 2 THEN 1 ELSE 0 END) "Cash Out Transactions", SUM(CASE WHEN a.product_id = 2 THEN a.commission ELSE 0 END) "Econet Earnings", SUM(CASE WHEN a.product_id = 2 THEN 1 ELSE 0 END) "Econet Transactions", SUM(CASE WHEN a.product_id = 19 THEN a.commission ELSE 0 END) "Netone Earnings", SUM(CASE WHEN a.product_id = 19 THEN 1 ELSE 0 END) "Netone Transactions", SUM(CASE WHEN a.product_id = 24 THEN a.commission ELSE 0 END) "Telecel Earnings", SUM(CASE WHEN a.product_id = 24 THEN 1 ELSE 0 END) "Telecel Transactions", SUM(CASE WHEN a.product_id = 24 THEN a.commission ELSE 0 END) "Telecel Earnings", SUM(CASE WHEN a.product_id = 24 THEN 1 ELSE 0 END) "Telecel Transactions", SUM(CASE WHEN a.product_id = 6 THEN a.commission ELSE 0 END) "Zol Fibroniks Earnings", SUM(CASE WHEN a.product_id = 6 THEN 1 ELSE 0 END) "Zol Fibroniks Transactions", SUM(CASE WHEN a.product_id = 11 THEN a.commission ELSE 0 END) "ZESA Earnings",SUM(CASE WHEN a.product_id = 11 THEN 1 ELSE 0 END) "ZESA Transactions", SUM(CASE WHEN a.transaction_type_id IN (6,7) THEN a.commission ELSE 0 END) "Bill Payments Earnings", SUM(CASE WHEN a.transaction_type_id IN (6,7) THEN 1 ELSE 0 END) "Bill Payments Transactions",SUM(CASE WHEN a.transaction_type_id IN (1,2,5,6,7,26,57,51) THEN a.commission ELSE 0 END) total_earnings FROM transaction a, agent b WHERE a.date BETWEEN "{startYest}" AND "{endYest}"  AND (a.description NOT LIKE "REVERSED%") AND (a.description NOT LIKE "%PreAuth%") AND a.description IS NOT NULL AND a.agent_id = b.id GROUP BY a.agent_id ORDER BY total_earnings DESC LIMIT 10'.format(startYest=startYest,endYest=endYest)
cursor.execute(query2)
earnings = cursor.fetchall()
earningsFilename2 = 'Top10Agents'+yestString+'.csv'

with open(earningsFilename2, "w", newline='') as csv_file:
    csv_writer = csv.writer(csv_file)
    csv_writer.writerow([i[0] for i in cursor.description])  # write headers
    csv_writer.writerows(earnings)

query3 = 'SELECT b.name AS "Agent Name",b.cellphone as "Cellphone", b.address as Address, SUM(CASE WHEN a.transaction_type_id = 1 THEN a.commission ELSE 0 END) "Cash in Earnings", SUM(CASE WHEN a.transaction_type_id = 1 THEN 1 ELSE 0 END) "Cash in Transactions", SUM(CASE WHEN a.transaction_type_id = 2 THEN a.commission ELSE 0 END) "Cash Out Earnings", SUM(CASE WHEN a.transaction_type_id = 2 THEN 1 ELSE 0 END) "Cash Out Transactions", SUM(CASE WHEN a.product_id = 2 THEN a.commission ELSE 0 END) "Econet Earnings", SUM(CASE WHEN a.product_id = 2 THEN 1 ELSE 0 END) "Econet Transactions", SUM(CASE WHEN a.product_id = 19 THEN a.commission ELSE 0 END) "Netone Earnings", SUM(CASE WHEN a.product_id = 19 THEN 1 ELSE 0 END) "Netone Transactions", SUM(CASE WHEN a.product_id = 24 THEN a.commission ELSE 0 END) "Telecel Earnings", SUM(CASE WHEN a.product_id = 24 THEN 1 ELSE 0 END) "Telecel Transactions", SUM(CASE WHEN a.product_id = 24 THEN a.commission ELSE 0 END) "Telecel Earnings", SUM(CASE WHEN a.product_id = 24 THEN 1 ELSE 0 END) "Telecel Transactions", SUM(CASE WHEN a.product_id = 6 THEN a.commission ELSE 0 END) "Zol Fibroniks Earnings", SUM(CASE WHEN a.product_id = 6 THEN 1 ELSE 0 END) "Zol Fibroniks Transactions", SUM(CASE WHEN a.product_id = 11 THEN a.commission ELSE 0 END) "ZESA Earnings",SUM(CASE WHEN a.product_id = 11 THEN 1 ELSE 0 END) "ZESA Transactions", SUM(CASE WHEN a.transaction_type_id IN (6,7) THEN a.commission ELSE 0 END) "Bill Payments Earnings", SUM(CASE WHEN a.transaction_type_id IN (6,7) THEN 1 ELSE 0 END) "Bill Payments Transactions",SUM(CASE WHEN a.transaction_type_id IN (1,2,5,6,7,26,57,51) THEN a.commission ELSE 0 END) total_earnings FROM transaction a, agent b WHERE a.date BETWEEN "{startYest}" AND "{endYest}"  AND (a.description NOT LIKE "REVERSED%") AND (a.description NOT LIKE "%PreAuth%") AND a.description IS NOT NULL AND a.agent_id = b.id GROUP BY a.agent_id ORDER BY total_earnings ASC LIMIT 10'.format(startYest=startYest,endYest=endYest)
cursor.execute(query3)
earnings = cursor.fetchall()
earningsFilename3 = 'Bottom10Agents'+yestString+'.csv'

with open(earningsFilename3, "w", newline='') as csv_file:
    csv_writer = csv.writer(csv_file)
    csv_writer.writerow([i[0] for i in cursor.description])  # write headers
    csv_writer.writerows(earnings)

fromaddr = "donotreply@getcash.co.zw"
#toaddr = "deant@getcash.co.zw"
toaddr = "exco@getcash.co.zw, gerrie@getbucks.com"
cc = "ethnis@getcash.co.zw"
msg = MIMEMultipart()
msg['From'] = fromaddr
msg['To'] = toaddr
msg['Cc'] = cc
msg['Subject'] = "AGENT RANKINGS"

body = """
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<img style="margin: 0 auto" src="https://platform.getcash.co.zw/img/gc/Logo_GetCash.png" alt="GetCash Logo">
<h1>Agent Ranking  - {yestString}</h1>
<p>---------------------------------------------------------------------------------------</p>
<br>
</body>
</html>
""".format(yestString=yestString)

part = MIMEBase('application', "octet-stream")
part.set_payload(open(earningsFilename, "rb").read())    # This is the same file name from above
encoders.encode_base64(part)

part.add_header('Content-Disposition', 'attachment; filename={filename}'.format(filename=earningsFilename))


part2 = MIMEBase('application', "octet-stream")
part2.set_payload(open(earningsFilename2, "rb").read())    # This is the same file name from above
encoders.encode_base64(part2)

part2.add_header('Content-Disposition', 'attachment; filename={filename}'.format(filename=earningsFilename2))

part3 = MIMEBase('application', "octet-stream")
part3.set_payload(open(earningsFilename3, "rb").read())    # This is the same file name from above
encoders.encode_base64(part3)

part3.add_header('Content-Disposition', 'attachment; filename={filename}'.format(filename=earningsFilename3))


msg.attach(MIMEText(body, 'html'))
msg.attach(part)
msg.attach(part2)
msg.attach(part3)


server = mail.SMTP('webmail.getcash.co.zw', 587)
server.starttls()
server.login(fromaddr, "@Coporeti1#")
text = msg.as_string()
recipients = toaddr.split(',') + [cc]
server.sendmail(fromaddr, recipients, text)
server.quit()