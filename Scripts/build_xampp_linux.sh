#!/bin/bash
# Build XAMPP for Linux
# AUTHOR: Carlos Pac
# DATE: 2024-05-07
# VERSION: 1.0

# Description: This script builds TiempoMaya Project XAMPP for Linux on local environment.

# INSTRUCTIONS:
# 1. Open the terminal.
# 2. Go to the Scripts folder.
# 3. Run the following command:
#    sudo ./build_xampp_linux.sh
# 4. Confirm the password.
# 5. Restart the Apache server in XAMPP.
# 6. Congratulations! You have built the TiempoMaya Project XAMPP for Linux on local environment.

# Second, clean the build directory
rm -rf /opt/lampp/htdocs/TiempoMaya

# First, create the build directory in htdocs folder
mkdir /opt/lampp/htdocs/TiempoMaya

# Third, copy the files from the Web folder to the build directory
cp -r ../Web/* /opt/lampp/htdocs/TiempoMaya
