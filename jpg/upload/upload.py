from siaskynet import Skynet
import json

# upload

skylink = Skynet.upload_file("img-data.txt")

print("Upload successful, skylink: " + skylink.replace("sia://", "https://siasky.net/"))

with open("../../address_book.json") as f:
  data = f.read()
  f.close()

  # write to values inside addressbook
  new_file = open("../../address_book.json", "w")
  new_file.write(data.replace("HAVE NOT FILLED IN NEW ADDRESS FROM UPLOAD.PY", skylink.replace("sia://", "https://siasky.net/")))
  print("Successfully changed last address\n")