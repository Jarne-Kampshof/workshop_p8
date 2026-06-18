FROM node:18

# werkmap in container
WORKDIR /app

# package files eerst (voor caching)
COPY package*.json ./

# dependencies installeren
RUN npm install

# rest van de code kopiëren
COPY . .

# app poort (pas aan als nodig)
EXPOSE 8000

# start commando (pas aan als jouw project anders start)
CMD ["npm", "start"]