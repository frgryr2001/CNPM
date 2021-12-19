import os

# get all files in the current directory
files = os.listdir(os.getcwd())
# change all name files in the current directory


def change_name_file(files, name_input):
	for i, file in enumerate(files):
		if file.endswith('.py') == False:
			new_name = name_input + str(i) + ".webp"
			old_name = file
			os.rename(old_name, new_name)

name_input = input("Enter the name of the file: ")
change_name_file(files, name_input)
