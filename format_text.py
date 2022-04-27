import sys

# Open the file as read
f = open("C:/Users/oaa/Documents/populating_db/username.txt", "r+")
# Create an array to hold write data
new_file = []
# Loop the file line by line
for line in f:
  # Split A,B on , and use first position [0], aka A, then add to the new array
  sys.stdout = open("C:/Users/oaa/Documents/populating_db/array_username.txt", "a")
  print ('"' + line.strip() + '",')
  # Add
#   new_file.append(only_a[0])
# # Open the file as Write, loop the new array and write with a newline
# with open("C:/Users/oaa/Documents/AV-DATA/Carte/textfile.txt", "w+") as f:
#   for i in new_file:
#     f.write(i+"\n")
