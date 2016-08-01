#!/usr/bin/python
import sys
import csv

csv_columns = ['Event Category', 'Event Name', 'Location',
               'Event Start Date', 'Event Start Time',
               'Event End Date', 'Event End Time',
               'Event Description']
# ICAL Fields
columns = ['CATEGORIES', 'SUMMARY', 'LOCATION', 'CONTACT']
location = ['LOCATION']
dateinterval = ['DTSTART', 'DTEND']
merge = ['DESCRIPTION;ENCODING=QUOTED-PRINTABLE',
         'CONTACT', 'X-EXTRAINFO']

# Location state
STATE = "Italia"

with open(sys.argv[1], "r") as f1:
    f2 = open("events.csv", "w")

    # Init
    csv_writer = csv.writer(f2)

    csv_data = []
    merged_rows = []

    # Setup csv columns
    csv_writer.writerow(csv_columns)

    # Setup location columns
    f3 = open("locations.csv", "w")
    f3.write("Location,State\n")

    # Read input file
    s = f1.read()
    s = s.split("\n")

    # Start parsing
    for row in s:
        try:
            v = row.split(":")[1]
        except:
            pass

        field = row.split(":")[0]

        if field in columns:
            csv_data.append(v)
            if field in location:
                f3.write("%s,%s\n" % (v, STATE))
        elif field in dateinterval:
            dt = v.split("T")
            csv_data.append(dt[0])
            csv_data.append(dt[1])
        elif field in merge:
            merged_rows.append(v)

        if row == "END:VEVENT":
            csv_data.append(merged_rows)
            csv_writer.writerow(csv_data)
            csv_data = []
            merged_rows = []

    f2.close()
    f3.close()
    print("Import locations.csv, then events.csv")
