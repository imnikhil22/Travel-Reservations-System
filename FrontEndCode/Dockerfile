# Use an official Nginx image as the base image
FROM nginx:latest

# Copy all HTML files into the container
COPY index.html /usr/share/nginx/html/index.html
COPY login.html /usr/share/nginx/html/login.html
COPY logout.html /usr/share/nginx/html/logout.html
COPY registration.html /usr/share/nginx/html/registration.html
COPY reservation.html /usr/share/nginx/html/reservation.html

# Copy all JavaScript files into the container
COPY Reservation.js /usr/share/nginx/html/Reservation.js
COPY login.js /usr/share/nginx/html/login.js
COPY logout.js /usr/share/nginx/html/logout.js

# Copy all image files into the container
COPY home.jpg /usr/share/nginx/html/home.jpg
COPY home2.jpg /usr/share/nginx/html/home2.jpg
COPY logo.png /usr/share/nginx/html/logo.png
COPY logo2.png /usr/share/nginx/html/logo2.png
COPY second.jpg /usr/share/nginx/html/second.jpg
COPY third.jpg /usr/share/nginx/html/third.jpg

# Copy the CSS file into the container
COPY styles.css /usr/share/nginx/html/styles.css

# Expose port 80 to the outside world
EXPOSE 80

# Start Nginx server when the container starts
CMD ["nginx", "-g", "daemon off;"]
