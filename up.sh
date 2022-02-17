# Containers
docker-compose up -d
# Frontend
cd www/ && npm i && npm run dev && cd ../
# Backend
docker-compose run -u root php bash -c "./start.sh"